<?php

use Illuminate\Http\JsonResponse;

function responseFailed(string $message = null, int $code = 400): JsonResponse
{
    return response()->json([
        'message' => __($message) ?? 'Bad request',
    ], $code);
}
