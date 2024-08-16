<?php

namespace App\Http\Controllers\Users;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\Roles\RoleCreateRequest;
use App\Http\Requests\Roles\RoleUpdateRequest;
use App\Http\Controllers\BaseCRUD\BaseCRUDController;
use App\Http\Requests\Users\AddOrRemovePermissionToRoleRequest;
use App\Http\Resources\PermissionResource;
use App\Http\Resources\RoleResource;
use App\Services\Role\RoleService;

class RoleController extends BaseCRUDController
{

    //pass argument needed to inherit from BaseCRUDController
    public function __construct(
        Role $role,
        $service=RoleService::class,
        $persianNameSingle="نقش",
        $persianNamePlural="نقش ها",
        $updateRequest=RoleUpdateRequest::class,
        $createRequest=RoleCreateRequest::class,
        $apiResource=RoleResource::class)
    {
        parent::__construct(
            model: $role,
            service: $service,
            persianNameSingle:$persianNameSingle,
            persianNamePlural: $persianNamePlural,
            updateRequest: $updateRequest,
            createRequest: $createRequest,
            apiResource: $apiResource);
    }

   
   /******************************************************************
    * Get all permissions assigned to a role
    */
    public function permissionsOfRole(string $role_id) {
        $rolePermissions = $this->service->getPermissions($role_id);
        $rolePermissionsCollection = PermissionResource::collection($rolePermissions);
        return apiResponse(
            message: __("messages.index", ["attribute"=> "دسترسی های نقش"]),
            data: $rolePermissionsCollection,
        );
    }

    /*****************************************************************
     * Assign permissions to a role
     */
    public function addPermissionToRole(AddOrRemovePermissionToRoleRequest $addPermissionToRoleRequest) {
        // validation and extract data from request
        $validatedData = $addPermissionToRoleRequest->validated();

        return $this->service->addPermission(
            $validatedData["role_id"],
            $validatedData["permission_ids"]
        );     
    }

    /*****************************************************************
     * Remove Permissions of a role
     */
    public function removePermissionOfRole(AddOrRemovePermissionToRoleRequest $removePermissionsOfRoleRequest) {
        // validation
        $validatedData = $removePermissionsOfRoleRequest->validated();

        return $this->service->removePermission(
            $validatedData["role_id"],
            $validatedData["permission_ids"]
        );     
    }

}

