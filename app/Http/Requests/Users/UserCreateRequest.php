<?php

namespace App\Http\Requests\Users;

use App\Http\Requests\BaseRequest\BaseRequest;

class UserCreateRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:255'],
            'password' => [
                'required',
                'string',
                'min:8',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                //'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            'is_active' => ['boolean'],

            'user_type_id' => ['required', 'exists:user_types,id'],
            'person_id' => ['required', 'exists:persons,id'],
            'role_id' => ['required', 'exists:roles,id'],

        ];
    }
}
