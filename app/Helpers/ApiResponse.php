<?php

namespace App\Helpers;

class ApiResponse
{
    public static function success($status, $message, $data = null, $code = 200)
    {
        return response()->json([
            'success' => $status,
            'message' => $message,
            'result' => $data
        ], $code);
    }

    public static function error($message = 'Error', $code = 500)
    {
        return response()->json([
            'error' => $message
        ], $code);
    }
}