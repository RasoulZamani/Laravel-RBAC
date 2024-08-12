<?php

namespace App\Http\Controllers\Users;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\Roles\RoleCreateRequest;
use App\Http\Requests\Roles\RoleUpdateRequest;
use App\Http\Controllers\BaseCRUD\BaseCRUDController;

class RoleController extends BaseCRUDController
{

    //pass argument needed to inherit from BaseCRUDController
    public function __construct(
        Role $role,
        $persianNameSingle="نقش",
        $persianNamePlural="نقش ها",
        $updateRequest=RoleUpdateRequest::class,
        $createRequest=RoleCreateRequest::class)
    {
        parent::__construct(
            model: $role,
            persianNameSingle:$persianNameSingle,
            persianNamePlural: $persianNamePlural,
            updateRequest: $updateRequest,
            createRequest: $createRequest);
    }

}

