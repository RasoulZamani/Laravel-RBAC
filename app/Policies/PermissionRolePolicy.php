<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PermissionRole;

class PermissionRolePolicy
{
    /**
     * Determine if the user can view any permission_role.
     */
    public function viewAny(User $user)
    {
        return $user->hasPermission('permission_role:viewAny');
    }

    /**
     * Determine if the user can view a specific permission_role.
     */
    public function view(User $user)//, PermissionRole $permission_role)
    {
        return $user->hasPermission('permission_role:view') ;// || 
           // ($user->hasPermission('permission_role:own:view') && $this->isOwner($user, $permission_role));
    }

    /**
     * Determine if the user can create a permission_role.
     */
    public function create(User $user)
    {
        return  $user->hasPermission('permission_role:create');
    }

    /**
     * Determine if the user can update a specific permission_role.
     */
    public function update(User $user)//, PermissionRole $permission_role)
    {
        return $user->hasPermission('permission_role:update'); // || 
           // ($user->hasPermission('permission_role:own:update') && $this->isOwner($user, $permission_role));
    }

    /**
     * Determine if the user can delete a specific permission_role.
     */
    public function delete(User $user)//, PermissionRole $permission_role)
    {
        return $user->hasPermission('permission_role:delete') ; //|| 
        //($user->hasPermission('permission_role:own:delete') && $this->isOwner($user, $permission_role));
        }

    /**
     * Determine if the user owns the permission_role.
     */
    // protected function isOwner(User $user, PermissionRole $permission_role)
    // {   
    //     return ($user->id=== $permission_role->user_id); 
    // }
}
