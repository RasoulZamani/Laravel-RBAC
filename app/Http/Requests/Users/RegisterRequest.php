<?php

namespace App\Http\Requests\Users;

use App\Http\Requests\BaseRequest\BaseRequest;

class registerRequest extends BaseRequest
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
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'alias_name' => ['nullable', 'string', 'max:255'],
            'father_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'in:male,female'],
            'is_legal' => ['boolean'],
            'national_code' => ['required', 'numeric', 'unique:persons,national_code'],//,NULL,id,deleted_at,NULL', new NationalCodeRule($this->is_legal)],
            'mobile_phone' => ['required', 'numeric', 'digits:11', 'regex:/^09\d{9}$/', 'unique:persons,mobile_phone'], 
            'email' => ['nullable', 'string', 'email', 'max:255'],
            'birth_date' => ['required', 'date'],
            'education_level_id' => ['nullable', 'exists:education_levels,id'],
            'image_id' => ['nullable', 'exists:images,id'],

            // related to user table
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
            // 'person_id' => ['required', 'exists:persons,id'],
            // 'role_id' => ['required', 'exists:roles,id'], 

        ];
    }
}
