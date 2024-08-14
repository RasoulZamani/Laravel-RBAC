<?php

namespace App\Http\Controllers\Users;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\Roles\RoleCreateRequest;
use App\Http\Requests\Roles\RoleUpdateRequest;
use App\Http\Controllers\BaseCRUD\BaseCRUDController;
use App\Http\Requests\Users\AddOrRemovePermissionToRoleRequest;

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

   
   /**
    * Get permissions assigned to role
    */
    public function permissionsOfRole(string $role_id) {
        // fetch user by user_id
        $role = Role::findOrFail($role_id);
        return apiResponse(
            message: __("messages.index", ["attribute"=> "دسترسی های نقش"]),
            data:[ $role->permissions],
        );
    }

    /**
     * Assign permissions to a role
     */
    public function addPermissionToRole(AddOrRemovePermissionToRoleRequest $addPermissionToRoleRequest) {
        // validation
        $validatedData = $addPermissionToRoleRequest->validated();

        //fetch role with this role_id and load its role
        $role = Role::with('permissions')->findOrFail($validatedData['role_id']);

        // fetch existing permissions for this user
        $existingPermissions = $role->permissions;
        // dd($existingPermissions); 
        // check if permissions are already not assigned
        foreach($validatedData['permission_ids'] as $permissionId) {
            if ($existingPermissions->contains($permissionId)) {
                return apiResponse(
                    message: __("messages.permission_is_already_exists_for_this_role"),
                    data: ["permission_already_exists_id" => $permissionId],
                    statusCode:400,
                );
            }
        }
        // add permissions to role
        $role->permissions()->attach($validatedData['permission_ids']);
        return apiResponse(
            message: __("messages.attach_permissions_to_role"),
            //data: ["role_id" => $role->id, "assigned_permissions"=>[$role->permissions]],
        );

    }

    /**
     * Remove Permissions of a role
     */
    public function removePermissionOfRole(AddOrRemovePermissionToRoleRequest $removePermissionsOfRole) {
        // validation
        $validatedData = $removePermissionsOfRole->validated();

        //fetch role with this role_id and load its role
        $role = Role::with('permissions')->findOrFail($validatedData['role_id']);

        // fetch existing permissions for this user
        $existingPermissions = $role->permissions;
        // dd($existingPermissions); 
        // check if permissions is exist  (if not exist we can not delete it)
        foreach($validatedData['permission_ids'] as $permissionId) {
            if (!$existingPermissions->contains($permissionId)) {
                return apiResponse(
                    message: __("messages.permission_is_not_exists_for_this_role"),
                    data: ["permission_not_exists_id" => $permissionId],
                    statusCode:400,
                );
            }
        }
        // remove permissions of role
        $role->permissions()->detach($validatedData['permission_ids']);
        return apiResponse(
            message: __("messages.detach_permissions_to_role"),
            //data: ["role_id" => $role->id, "assigned_permissions"=>[$role->permissions]],
        );    
    }
}

