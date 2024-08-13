<?php

namespace App\Http\Requests\Persons;

use App\Http\Requests\BaseRequest\BaseRequest;
use App\Rules\NationalCodeRule;

class PersonCreateRequest extends BaseRequest
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
            'national_code' => ['required', 'numeric', 'unique:persons,national_code'],//,NULL,id,deleted_at,NULL', new NationalCodeRule($this->is_legal)],
            'mobile_number' => ['required', 'numeric', 'digits:11', 'regex:/^09\d{9}$/', 'unique:persons,mobile_number'], 
            'email' => ['nullable', 'string', 'email', 'max:255'],
            'birth_date' => ['required', 'date'],
            'education_level_id' => ['nullable', 'exists:education_levels,id'],
            'image_id' => ['nullable', 'exists:images,id'],
        ];
    }
    // public function messages()
    // {
    //     return [
    //         'national_code.required' => ' کد ملی/شناسه حقوقی باید یکتا باشد',
    //         'national_code.numeric' => ' کد ملی/شناسه حقوقی باید شامل ارقام باشد',
    //         'national_code.unique' => 'کد ملی/شناسه حقوقی باید یکتا باشد',

    //     ];
    // }
}
