<?php

namespace App\Traits;

use Illuminate\Validation\ValidationException;
use Ramsey\Uuid\Rfc4122\Validator;

trait ResponseValidation
{
    /**
     * @throws ValidationException
     */
    public function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = apiResponse(success: false , message: "* " . implode(" \n* " , $validator->errors()->all()) , data: $validator->errors() , statusCode: 422);
        throw (new ValidationException($validator, $response))->errorBag($this->errorBag)->redirectTo($this->getRedirectUrl());
    }
}
