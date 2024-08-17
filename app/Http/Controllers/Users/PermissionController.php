<?php

namespace App\Http\Controllers\Users;

use App\Models\Permission;
use App\Http\Resources\PermissionResource;
use App\Services\Permission\PermissionService;
use App\Http\Controllers\BaseCRUD\BaseCRUDController;
use App\Http\Requests\Permissions\PermissionCreateRequest;
use App\Http\Requests\Permissions\PermissionUpdateRequest;

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
  // permission_user is controlled in UserController
  // permission_role is controlled in RoleController
 
}

