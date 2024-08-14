<?php

namespace App\Http\Requests\Users;

use App\Http\Requests\BaseRequest\BaseRequest;

class AddOrRemovePermissionToRoleRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'role_id' => ['required', 'exists:roles,id'],
            'permission_ids' => ['required', 'array'],
            'permission_ids.*' => ['integer', 'exists:permissions,id'] 
        ];
    }
}
