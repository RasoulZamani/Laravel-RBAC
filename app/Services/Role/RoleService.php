<?php

namespace App\Services\Role;

use App\Services\Base\BaseService;
use App\Repositories\Role\RoleRepositoryInterface;


class RoleService extends BaseService implements RoleServiceInterface
{
    public function __construct(RoleRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }

    /******************************************************************
    * Get all permissions assigned to a role
    */
    public function getPermissions(string $role_id) {
        // fetch role by role_if
        $role = $this->repository->find($role_id);
        $permissions = $role->permissions;
        return $permissions;
    }

    /*****************************************************************
     * Assign permissions to a role
     */
    public function addPermission(string $role_id, array $permissionIds) {

        // fetch role with this role_id
        $role = $this->repository->find($role_id);

        //fetch permissions of role 
        $rolePermissions = $role->permissions;

        // check if permissions are already not assigned
        foreach($permissionIds as $permissionId) {
            if ($rolePermissions->contains($permissionId)) {
                return apiResponse(
                    success:false,
                    message: __("messages.permission_is_already_exists_for_this_role"),
                    data: ["permission_already_exists_id" => $permissionId],
                    statusCode:400,
                );
            }
        }
        // add new permissions to role
        $role->permissions()->attach($permissionIds);
        return apiResponse(
            message: __("messages.attach_permissions_to_role"),
            data: ["added permission_ids" => $permissionIds ]
        );
    }

    /*****************************************************************
     * Remove Permissions of a role
     */
    public function removePermission(string $role_id, array $permissionIds) {

        // fetch role with this role_id
        $role = $this->repository->find($role_id);

        //fetch permissions of role 
        $rolePermissions = $role->permissions;

        // check if permissions is assigned to this role(if not assigned before, we can not delete it)
        foreach($permissionIds as $permissionId) {
            if (!$rolePermissions->contains($permissionId)) {
                return apiResponse(
                    message: __("messages.permission_is_not_exists_for_this_role"),
                    data: ["permission_not_exists_id" => $permissionId],
                    statusCode:400,
                );
            }
        }
        // remove permissions of role
        $role->permissions()->detach($permissionIds);
        return apiResponse(
            message: __("messages.detach_permissions_to_role"),
            data: ["removed permission_ids" => $permissionIds ] 
        );    
    }

}
