<?php

namespace App\Http\Requests\User;

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
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'alias_name' => ['nullable', 'string', 'max:255'],
            'father_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'in:male,female'],
            'is_legal' => ['boolean'],
            'national_code' => ['required', 'string', 'max:32', 'unique:persons,national_code'],
            'mobile_phone' => ['required', 'string', 'max:32', 'unique:persons,mobile_phone'], 
            'email' => ['nullable', 'string', 'email', 'max:255'],
            'birth_date' => ['required', 'date'],
            'is_active' => ['boolean'],
            'education_level_id' => ['nullable', 'exists:education_levels,id'],
            'image_id' => ['nullable', 'exists:images,id'],
        ];
    }
}
