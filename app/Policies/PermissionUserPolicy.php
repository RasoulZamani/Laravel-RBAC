<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PermissionUser;

class PermissionUserPolicy
{
    /**
     * Determine if the user can view any permission_user.
     */
    public function viewAny(User $user)
    {
        return $user->hasPermission('permission_user:viewAny');
    }

    /**
     * Determine if the user can view a specific permission_user.
     */
    public function view(User $user)//, PermissionUser $permission_user)
    {
        return $user->hasPermission('permission_user:view') ;// || 
           // ($user->hasPermission('permission_user:own:view') && $this->isOwner($user, $permission_user));
    }

    /**
     * Determine if the user can create a permission_user.
     */
    public function create(User $user)
    {
        return  $user->hasPermission('permission_user:create');
    }

    /**
     * Determine if the user can update a specific permission_user.
     */
    public function update(User $user)//, PermissionUser $permission_user)
    {
        return $user->hasPermission('permission_user:update'); // || 
           // ($user->hasPermission('permission_user:own:update') && $this->isOwner($user, $permission_user));
    }

    /**
     * Determine if the user can delete a specific permission_user.
     */
    public function delete(User $user)//, PermissionUser $permission_user)
    {
        return $user->hasPermission('permission_user:delete') ; //|| 
        //($user->hasPermission('permission_user:own:delete') && $this->isOwner($user, $permission_user));
        }

    /**
     * Determine if the user owns the permission_user.
     */
    // protected function isOwner(User $user, PermissionUser $permission_user)
    // {   
    //     return ($user->id=== $permission_user->user_id); 
    // }
}
