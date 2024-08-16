<?php

namespace App\Http\Requests\Permissions;

use App\Http\Requests\BaseRequest\BaseRequest;

class PermissionCreateRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255', 'unique:permissions,title'],
        ];
    }
}
