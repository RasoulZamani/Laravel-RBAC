<?php

namespace App\Http\Controllers\Users;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Services\Role\RoleService;
use App\Http\Resources\RoleResource;
use App\Http\Resources\PermissionResource;
use App\Http\Requests\Roles\RoleCreateRequest;
use App\Http\Requests\Roles\RoleUpdateRequest;
use App\Services\Permission\PermissionService;
use App\Http\Controllers\BaseCRUD\BaseCRUDController;
use App\Http\Requests\Permissions\PermissionCreateRequest;
use App\Http\Requests\Permissions\PermissionUpdateRequest;
use App\Http\Requests\Users\AddOrRemovePermissionToRoleRequest;

class PermissionController extends BaseCRUDController
{

    //pass argument needed to inherit from BaseCRUDController
    public function __construct(
        Permission $permission,
        $service=PermissionService::class,
        $persianNameSingle=" اجازه دسترسی",
        $persianNamePlural="اجازه دسترسی ها",
        $updateRequest=PermissionUpdateRequest::class,
        $createRequest=PermissionCreateRequest::class,
        $apiResource=PermissionResource::class)
    {
        parent::__construct(
            model: $permission,
            service: $service,
            persianNameSingle:$persianNameSingle,
            persianNamePlural: $persianNamePlural,
            updateRequest: $updateRequest,
            createRequest: $createRequest,
            apiResource: $apiResource);
    }

}

