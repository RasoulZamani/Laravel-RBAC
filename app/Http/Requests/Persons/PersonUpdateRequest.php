<?php

namespace App\Http\Requests\Persons;

use App\Rules\NationalCodeRule;
use App\Http\Requests\BaseRequest\BaseRequest;

class PersonUpdateRequest extends BaseRequest
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
            'national_code' => ['nullable', 'numeric', 'unique:persons,national_code,'],//.$this->person.',id,deleted_at,NULL', new NationalCodeRule($this->is_legal)],
            'mobile_number' => ['nullable', 'numeric', 'digits:11', 'regex:/^09\d{9}$/', 'unique:persons,mobile_number'], 
            'email' => ['nullable', 'string', 'email', 'max:255'],
            'birth_date' => ['nullable', 'date'],
            'education_level_id' => ['nullable', 'exists:education_levels,id'],
            'image_id' => ['nullable', 'exists:images,id'],
        ];
    }
}
