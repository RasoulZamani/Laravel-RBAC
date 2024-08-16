<?php

namespace App\Services\User;

use App\Services\Base\BaseService;
use App\Repositories\User\UserRepositoryInterface;


class UserService extends BaseService implements UserServiceInterface
{
    public function __construct(UserRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
    
     /******************************************************************
    * Get all permissions assigned to a user
    */
    public function getPermissions(string $user_id) {
        // fetch user by user_id
        $user = $this->repository->find($user_id);
        $permissions = $user->permissions;
        return $permissions;
    }

    /*****************************************************************
     * Assign permissions to a user
     */
    public function addPermission(string $user_id, array $permissionIds) {

        // fetch user with this user_id
        $user = $this->repository->find($user_id);

        // fetch available permission for user's role
        $availablePermissions = $user->role->permissions;

        // fetch existing permissions for this user
        $existingPermissions = $user->permissions;

        // check if permissions are exists in user role and already not exist
        foreach($permissionIds as $permissionId) {
            if (!$availablePermissions->contains($permissionId)) {
                return apiResponse(
                    success: false,
                    message: __("messages.permission_not_available_for_this_role"),
                    data: ["not_allowed_permission_id" => $permissionId],
                    statusCode:400,
                );
            }
            // check that these permission is already assigned
            if ($existingPermissions->contains($permissionId)) {
                return apiResponse(
                    success: false,
                    message: __("messages.permission_is_already_exists_for_this_user"),
                    data: ["permission_already_exists_id" => $permissionId],
                    statusCode:400,
                );
            }
        }
        // add permissions to user
        $user->permissions()->attach($permissionId);
        return apiResponse(
            message: __("messages.attach_permissions_to_user"),
        );
   }


    /*****************************************************************
     * Remove Permissions of a user
     */
    public function removePermission(string $user_id, array $permissionIds) {

        // fetch user with this user_id
        $user = $this->repository->find($user_id);

        //fetch permissions of user 
        $userPermissions = $user->permissions;

        // check if permissions is assigned to this user(if not assigned before, we can not delete it)
        foreach($permissionIds as $permissionId) {
            if (!$userPermissions->contains($permissionId)) {
                return apiResponse(
                    success:false,
                    message: __("messages.permission_is_not_exists_for_this_user"),
                    data: ["permission_not_exists_id" => $permissionId],
                    statusCode:400,
                );
            }
        }
        // remove permissions of user
        $user->permissions()->detach($permissionIds);
        return apiResponse(
            message: __("messages.detach_permissions_to_user"),
            data: ["removed permission_ids" => $permissionIds ] 
        );   
    }

}