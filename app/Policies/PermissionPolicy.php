<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Permission;

class PermissionPolicy
{
    /**
     * Determine if the user can view any permissions.
     */
    public function viewAny(User $user)
    {
        return $user->hasPermission('permissions:viewAny');
    }

    /**
     * Determine if the user can view a specific permission.
     */
    public function view(User $user, Permission $permission)
    {
        return $user->hasPermission('permissions:view') ;//|| $user->hasPermission('permissions:own:view');
    }

    /**
     * Determine if the user can create a permission.
     */
    public function create(User $user)
    {
        return  false; //permissions only are manged statically by seeder or db 
    }
    
    /**
     * Determine if the user can update a specific permission.
     */
    public function update(User $user, Permission $permission)
    {
        return false;  //permissions only are manged statically by seeder or db 
    }

    /**
     * Determine if the user can delete a specific permission.
     */
    public function delete(User $user, Permission $permission)
    {
        return false; //permissions only are manged statically by seeder or db 
    }
    /**
     * Determine if the user owns the permission. -> not sense for permissions
     */
    // protected function isOwner(User $user, Permission $permission)
    // {   
    //     return ($user->permission_id === $permission->id); 
    // }
}
