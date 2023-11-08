<?php

namespace App\Http\Middleware;

use App\Traits\ApiResponse;
use Closure;
use Exception;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Laravel\Passport\Token;
use Lcobucci\JWT\Encoding\JoseEncoder;
use Lcobucci\JWT\Token\Parser;
use Symfony\Component\HttpFoundation\Response;

class Authenticate extends Middleware
{
    use ApiResponse;

    public function handle($request, Closure $next, ...$guards)
    {
        $bearerToken = $request->bearerToken(); // get access token in header
        if (!$bearerToken) {
            return $this->apiResponseError(config('constants.AUTH_MESSAGE.TOKEN_INVALID'), Response::HTTP_UNAUTHORIZED);
        }
        $parse = new Parser(new JoseEncoder()); // create parse token
        try {
            $tokenId = $parse->parse($bearerToken)->claims()->get('jti'); // get client from id token
            // check token have expired
            $expiresAt = Token::find($tokenId)->expires_at;
            if (now()->gt($expiresAt)) {
                return $this->apiResponseError(config('constants.AUTH_MESSAGE.TOKEN_EXPIRED'), Response::HTTP_UNAUTHORIZED);
            }
            parent::authenticate($request, $guards);

            return $next($request);
        } catch (Exception $e) {
            return $this->apiResponseError(config('constants.AUTH_MESSAGE.TOKEN_INVALID'), Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param Request $request
     * @return string|null
     */
    protected function redirectTo($request): ?string
    {
        if ($request->is('api/*') || $request->is('oauth/*')) {
            return $this->apiResponseError(config('constants.AUTH_MESSAGE.TOKEN_EXPIRED', Response::HTTP_FORBIDDEN));
        }
        if (!$request->expectsJson()) {
            return route('login');
        }
        return route('unauthorized');
    }
}
