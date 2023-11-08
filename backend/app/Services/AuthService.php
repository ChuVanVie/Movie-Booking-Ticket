<?php

namespace App\Services;

use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use App\Repositories\User\UserRepository;
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\RefreshTokenRepository;
use Laravel\Passport\TokenRepository;
use Lcobucci\JWT\Encoding\JoseEncoder;
use Lcobucci\JWT\Token\Parser;
use Symfony\Component\HttpFoundation\Response;

class AuthService
{
    use ApiResponse;

    private const URL_OAUTH = 'oauth/token';
    private const GRANT_TYPE = 'password';
    protected UserRepository $userRepository;
    private array $clientCredentials = [];

    public function __construct(UserRepository $userRepository)
    {
        $this->clientCredentials = [
            'client_id' => config('passport.password_grant_client.id'),
            'client_secret' => config('passport.password_grant_client.secret'),
//            'scope' => '*' // unused
        ];

        $this->userRepository = $userRepository;
    }

    /** Handle user login
     * @param LoginRequest $req
     * @return Response
     * @throws Exception
     */
    public function login(LoginRequest $req): Response
    {
        $credentials = $req->only(['email', 'password']);

        if (!auth()->attempt($credentials)) {
            throw new HttpResponseException($this->responseAuthenticationError());
        }

        // get user from Guard
        $user = auth()->user();
        $dataToken = json_decode($this->generatorToken($credentials['email'], $credentials['password'])->getContent(), true);

        return $this->responseAuthentication(
            $dataToken['access_token'],
            $dataToken['refresh_token'],
            $dataToken['token_type'],
            $dataToken['expires_in'],
            $user
        );
    }

    /** Handle user register
     * @param RegisterRequest $req
     * @return Response
     * @throws Exception
     */
    public function register(RegisterRequest $req): Response
    {
        $credentials = $req->only(['email', 'password', 'name', 'phone']);

        // Check email exists
        $user = $this->userRepository->findByEmail($credentials['email']);
        if ($user) {
            throw new HttpResponseException($this->apiResponseError('Email already exists', Response::HTTP_BAD_REQUEST));
        }

        // Check phone exists
        $user = $this->userRepository->findByPhoneNumber($credentials['phone']);
        if ($user) {
            throw new HttpResponseException($this->apiResponseError('Phone already exists', Response::HTTP_BAD_REQUEST));
        }

        try {
            $user = $this->userRepository->create([
                'email' => $credentials['email'],
                'password' => bcrypt($credentials['password']),
                'name' => $credentials['name'],
                'role' => config('constants.ROLE.USER'),
                'dob' => $credentials['dob'],
                'phone' => $credentials['phone'],
                'address' => $credentials['address']
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
            throw new HttpResponseException($this->apiResponseError('Register failed', Response::HTTP_BAD_REQUEST));
        }

        return $this->apiResponse(
            $user,
            Response::HTTP_CREATED
        );
    }

    /** Generator both access_token and refresh_token
     * @param string $email
     * @param string $password
     * @return Response
     * @throws Exception
     */
    private function generatorToken(string $email, string $password): Response
    {
        $data['username'] = $email;
        $data['password'] = $password;
        $data['grant_type'] = self::GRANT_TYPE;
        $data = array_merge($this->clientCredentials, $data);

        $request = Request::create(self::URL_OAUTH, 'POST', $data);
        
        $response = app()->handle($request);
        if (!$response->isOk()) {
            throw new HttpResponseException($this->responseAuthenticationError());
        }
        return $response;
    }

    /** Handle revoke access token & refresh token
     * @param Request $request
     * @return Response
     */
    public function logout(Request $request): Response
    {
        $bearerToken = $request->bearerToken();
        $parse = new Parser(new JoseEncoder());
        $tokenRepository = app(TokenRepository::class);
        $refreshTokenRepository = app(RefreshTokenRepository::class);
        try {
            $tokenId = $parse->parse($bearerToken)->claims()->get('jti'); // get client from id token
            $tokenRepository->revokeAccessToken($tokenId);
            $refreshTokenRepository->revokeRefreshTokensByAccessTokenId($tokenId);
            return \response()->json();
        } catch (Exception $e) {
            return $this->apiResponseError(config('constants.AUTH_MESSAGE.TOKEN_INVALID'), Response::HTTP_UNAUTHORIZED);
        }
    }

    /** Response containing access_token, refresh_token and expires_in
     * @param Request $request
     * @return Response
     * @throws Exception
     */
    public function refreshAccessToken(Request $request): Response
    {
        $data['refresh_token'] = $request->get('refresh_token');
        $data['grant_type'] = 'refresh_token';
        $data = array_merge($this->clientCredentials, $data);
        $request = Request::create(self::URL_OAUTH, 'POST', $data);
        $response = app()->handle($request);

        if (!$response->isOk()) {
            throw new HttpResponseException(
                $this->apiResponseError(config('constants.AUTH_MESSAGE.TOKEN_INVALID'),
                    Response::HTTP_UNAUTHORIZED)
            );
        }
        return $response;
    }

    /** Handle forgot password
     * @param ForgotPasswordRequest $request
     * @return Response
     * @throws Exception
     */
    public function forgotPassword(ForgotPasswordRequest $request): Response
    {
        $email = $request->get('email');
        $user = $this->userRepository->findByEmail($email);
        if (!$user) {
            return $this->apiResponseError('User not found', Response::HTTP_NOT_FOUND);
        }

        $token = Password::createToken($user);
        $resetLink =  env('APP_FRONTEND_URL') . '/reset-password?token=' . $token;

        try {
            Mail::send('mail', ['resetLink' => $resetLink], function ($message) use ($email) {
                $message->to($email, 'Reset password')->subject('Reset password');
            });
        } catch (Exception $e) {
            return $this->apiResponseError('Send email failed', Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $this->apiResponse(
            'Send email forgot password successfully',
            Response::HTTP_OK
        );
    }

    /** Handle reset password
     * @param ResetPasswordRequest $request
     * @return Response
     * @throws Exception
     */
    public function resetPassword(ResetPasswordRequest $request): Response
    {
        $user = $this->userRepository->findByEmail($request->get('email'));
        if (!$user) {
            return ApiResponse::apiResponseError('User not found', Response::HTTP_NOT_FOUND);
        }

        $token = $request->get('token');
        $newPassword = $request->get('new_password');

        $isTokenValid = Password::tokenExists($user, $token);
        if (!$isTokenValid) {
            return $this->apiResponseError('Token invalid or token expired', Response::HTTP_UNAUTHORIZED);
        }

        try {
            $user->password = bcrypt($newPassword);
            $user->save();
        } catch (Exception $e) {
            return $this->apiResponseError('Reset password failed', Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $this->apiResponse(
            'Reset password successfully',
            Response::HTTP_OK
        );
    }
}
