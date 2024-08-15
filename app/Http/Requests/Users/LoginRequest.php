<?php

namespace App\Http\Requests\Users;

use App\Http\Requests\BaseRequest\BaseRequest;

class LoginRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // related to person table
            'mobile_number' => ['required', 'numeric', 'digits:11', 'regex:/^09\d{9}$/'], 
            
            // related to user table
            'password' => [
                'required',
                'string',
                'min:8',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                //'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                //'regex:/[@$!%*#?&]/', // must contain a special character
            ],
           
        ];
    }
}
