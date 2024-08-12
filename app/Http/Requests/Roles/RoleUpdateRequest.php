<?php

namespace App\Http\Requests\Roles;

use App\Http\Requests\BaseRequest\BaseRequest;

class RoleUpdateRequest extends BaseRequest
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
