<?php

use Illuminate\Support\Facades\Response;

function apiResponse(bool $success = true , string $message = null ,  $data = [] , int $statusCode = 200 , $meta = []): \Illuminate\Http\JsonResponse
{
    if(empty($meta)) {
        return Response::json(
            [
                'success' => (bool)$success,
                'message' => $message ?? __("messages.success"),
                'data' => $data,
            ], $statusCode);
    }else{
        return Response::json(
            [
                'success' => (bool)$success,
                'message' => $message ?? __("messages.success"),
                'data' => $data,
                'meta' => $meta
            ], $statusCode);
    }
}

