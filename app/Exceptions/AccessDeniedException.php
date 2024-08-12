<?php

namespace App\Exceptions;

use Exception;

class AccessDeniedException extends Exception
{
    public function render(): \Illuminate\Http\JsonResponse
    {
        return apiResponse(success: false , message: __("messages.access_denied") , statusCode: 403);
    }
}
