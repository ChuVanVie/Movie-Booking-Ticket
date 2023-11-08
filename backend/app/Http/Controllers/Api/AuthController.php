<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Services\AuthService;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /** Authorize a client to access the user's account.
     * @param LoginRequest $req
     * @return Response
     * @throws Exception
     * @api /api/auth/login
     */
    public function login(LoginRequest $request): Response
    {
        return $this->authService->login($request);
    }

    /** Register new user
     * @param RegisterRequest $req
     * @return Response
     * @throws Exception
     * @api /api/auth/register
     */
    public function register(RegisterRequest $request): Response
    {
        return $this->authService->register($request);
    }

    /** Revoke access the user account
     * @param Request $request
     * @return Response
     * @api /api/auth/logout
     */
    public function logout(Request $request): Response
    {
        return $this->authService->logout($request);
    }

    /** Refresh access token for the user account
     * @param Request $request
     * @return Response
     * @throws Exception
     * @api /api/auth/refresh
     */
    public function refreshToken(Request $request): Response
    {
        return $this->authService->refreshAccessToken($request);
    }

    /** Send reset password link to user email
     * @param ForgotPasswordRequest $request
     * @return Response
     * @throws Exception
     * @api /api/auth/forgot-password
     */
    public function forgotPassword(ForgotPasswordRequest $request): Response
    {
        return $this->authService->forgotPassword($request);
    }

    /** Reset password
     * @param ResetPasswordRequest $request
     * @return Response
     * @throws Exception
     * @api /api/auth/reset-password
     */
    public function resetPassword(ResetPasswordRequest $request): Response
    {
        return $this->authService->resetPassword($request);
    }
}
