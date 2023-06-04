<?php

namespace App\Traits;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

trait ApiResponse
{
    public function sendOk($status = 'OK', $code = 200): JsonResponse
    {
        return response()->json([
            'code' => $code,
            'status' => $status,
            'data' => 'Success'
        ], $code);
    }

    public function sendData($data, $status = 'OK', $code = 200): JsonResponse
    {
        return response()->json([
            'code' => $code,
            'status' => $status,
            'data' => $data
        ], $code);
    }

    public function sendUpdated($status = 'Updated', $code = 201): JsonResponse
    {
        return response()->json([
            'code' => $code,
            'status' => $status,
            'data' => "Updated"
        ], $code);
    }

    public function sendError($message, $status = 'Error', $code = 400): JsonResponse
    {
        return response()->json([
            'code' => $code,
            'status' => $status,
            'data' => $message
        ], $code);
    }

    public function sendUnauth($status = 'Unauthorized', $code = Response::HTTP_UNAUTHORIZED): JsonResponse
    {
        return response()->json([
            'code' => $code, 
            'status' => $status, 
            'data' => 'Please Login'
        ], $code);
    }

    public function sendNotFound($message, $status = 'Not Found', $code = 404): JsonResponse
    {
        return response()->json([
            'code' => $code, 
            'status' => $status, 
            'data' => $message
        ], $code);
    }

    public function sendForbidden($message, $status = 'Forbidden', $code = 403): JsonResponse
    {
        return response()->json([
            'code' => $code, 
            'status' => $status, 
            'data' => $message
        ], $code);
    }
}