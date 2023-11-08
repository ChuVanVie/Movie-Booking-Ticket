<?php

namespace App\Traits;

use Illuminate\Support\MessageBag;
use Symfony\Component\HttpFoundation\Response;

trait ApiResponse {

    /** Return response have data
     * @param array $data
     * @param int $statusCode
     * @param array $others
     * @return Response
    */
    public static function apiResponse(mixed $data = [], int $statusCode = 200, array $others = []): Response
    {
        $dataResponse = [
            'success' => true,
            'code' => $statusCode,
            'data' => $data
        ];
        $dataResponse = array_merge($dataResponse, $others);
        return response()->json($dataResponse, $statusCode);
    }

    /** Return response error
     * @param string $message
     * @param int $statusCode
     * @return Response
     */
    public static function apiResponseError(string $message = "", int $statusCode = 400): Response
    {
        return response()->json([
            'success' => false,
            'code' => $statusCode,
            'message' => $message,
        ],$statusCode);
    }

    /** Return response
     * @param string $accessToken
     * @param string $refreshToken
     * @param string $tokenType
     * @param int $expiresIn
     * @param mixed $data
     * @return Response
     */
    public static function responseAuthentication(string $accessToken, string $refreshToken, string $tokenType, int $expiresIn, mixed $data): Response
    {
        return response()->json([
            'success' => true,
            'code' => Response::HTTP_OK,
            'message' => config('constants.AUTH_MESSAGE.LOGIN_SUCCESSFUL'),
            'token_type' => $tokenType,
            'expires_in' => $expiresIn,
            'access_token' => $accessToken,
            'refresh_token' => $refreshToken,
            'data' => $data,
        ], Response::HTTP_OK);
    }

    /** Return response error
     * @return Response
     */
    public static function responseAuthenticationError(): Response
    {
        return response()->json([
            'success' => false,
            'code' => Response::HTTP_UNAUTHORIZED,
            'message' => config('constants.AUTH_MESSAGE.EMAIL_OR_PASSWORD_IS_INVALID'),
        ], Response::HTTP_UNAUTHORIZED);
    }

    /** Return response error
     * @param MessageBag $error
     * @return Response
     */
    public static function respondValidationErrors(MessageBag $error): Response
    {
        return response()->json([
            'success' => false,
            'code' => Response::HTTP_UNPROCESSABLE_ENTITY,
            'error' => $error,
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

}
