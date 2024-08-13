<?php

namespace App\Http\Requests\UserTypes;

use App\Http\Requests\BaseRequest\BaseRequest;

class UserTypeUpdateRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:511'],
        ];
    }
}
