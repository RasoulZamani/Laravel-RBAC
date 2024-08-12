<?php

namespace App\Http\Requests\User;

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
            'name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'alias_name' => ['nullable', 'string', 'max:255'],
            'father_name' => ['nullable', 'string', 'max:255'],
            'gender' => ['nullable', 'string', 'in:male,female'],
            'is_legal' => ['boolean'],
            'national_code' => ['nullable', 'string', 'max:32', 'unique:person,national_code'],
            'mobile_phone' => ['nullable', 'string', 'max:32', 'unique:person,mobile_phone'], 
            'email' => ['nullable', 'string', 'email', 'max:255'],
            'birth_date' => ['nullable', 'date'],
            'is_active' => ['boolean'],
            'education_level_id' => ['nullable', 'exists:education_levels,id'],
            'image_id' => ['nullable', 'exists:images,id'],
        ];
    }
}
