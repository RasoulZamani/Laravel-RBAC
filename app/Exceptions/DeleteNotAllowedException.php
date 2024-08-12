<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class DeleteNotAllowedException extends Exception
{
    public function __construct($message = "Delete operation not allowed.", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function render(): JsonResponse
    {
        return apiResponse(success: false , message: $this->getMessage() , statusCode: 400);
    }
}
