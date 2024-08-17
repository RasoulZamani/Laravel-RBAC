<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Role;

class RolePolicy
{
    /**
     * Determine if the user can view any roles.
     */
    public function viewAny(User $user)
    {
        return $user->hasPermission('roles:viewAny');
    }

    /**
     * Determine if the user can view a specific role.
     */
    public function view(User $user, Role $role)
    {
        return $user->hasPermission('roles:view') ;
    }

    /**
     * Determine if the user can create a role.
     */
    public function create(User $user)
    {
        return  $user->hasPermission('roles:create');
    }

    /**
     * Determine if the user can update a specific role.
     */
    public function update(User $user, Role $role)
    {
        return $user->hasPermission('roles:update') ;
        
    }

    /**
     * Determine if the user can delete a specific role.
     */
    public function delete(User $user, Role $role)
    {
        return $user->hasPermission('roles:delete'); 
        }

    /**
     * Determine if the user owns the role.
     */
    // protected function isOwner(User $user, Role $role)
    // {   
    //     return ($user->role_id === $role->id); 
    // }
}
