<?php

namespace App\Exceptions;

use Exception;

class NotFoundHttpException extends Exception
{
    public function render(): \Illuminate\Http\JsonResponse
    {
        return apiResponse(success: false , message: __("messages.not_FoundHttp_exception") , statusCode: 404);
    }
}
