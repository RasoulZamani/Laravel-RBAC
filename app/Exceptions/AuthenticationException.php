<?php

namespace App\Exceptions;

use Exception;

class AuthenticationException extends Exception
{
    public function render(): \Illuminate\Http\JsonResponse
    {
        return apiResponse(success: false , message: __("messages.authentication_exception") , statusCode: 401);
    }
}
