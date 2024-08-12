<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class ErrorException extends Exception
{
    public function __construct($message = "Error", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function render(): JsonResponse
    {
        return apiResponse(success: false , message: $this->getMessage() , statusCode: 400);
    }
}
