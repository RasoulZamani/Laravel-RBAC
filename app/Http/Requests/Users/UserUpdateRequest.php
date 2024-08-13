<?php

namespace App\Http\Requests\Users;

use App\Http\Requests\BaseRequest\BaseRequest;

class UserUpdateRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['nullable', 'string', 'max:255'],
            'password' => [
                'nullable',
                'string',
                'min:8',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                //'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            'is_active' => ['nullable','boolean'],

            'user_type_id' => ['nullable', 'exists:user_types,id'],
            'person_id' => ['nullable', 'exists:persons,id'],
            'role_id' => ['nullable', 'exists:roles,id'],

        ];
    }
}
