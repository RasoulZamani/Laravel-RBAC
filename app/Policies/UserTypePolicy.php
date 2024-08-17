<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserType;

class UserTypePolicy
{
    /**
     * Determine if the user can view any user_types.
     */
    public function viewAny(User $user)
    {
        return $user->hasPermission('user_types:viewAny');
    }

    /**
     * Determine if the user can view a specific user_type.
     */
    public function view(User $user, UserType $user_type)
    {
        return $user->hasPermission('user_types:view') ;
    }

    /**
     * Determine if the user can create a user_type.
     */
    public function create(User $user)
    {
        return  $user->hasPermission('user_types:create');
    }

    /**
     * Determine if the user can update a specific user_type.
     */
    public function update(User $user, UserType $user_type)
    {
        return $user->hasPermission('user_types:update') ;
        
    }

    /**
     * Determine if the user can delete a specific user_type.
     */
    public function delete(User $user, UserType $user_type)
    {
        return $user->hasPermission('user_types:delete'); 
        }

    /**
     * Determine if the user owns the user_type.
     */
    // protected function isOwner(User $user, UserType $user_type)
    // {   
    //     return ($user->user_type_id === $user_type->id); 
    // }
}
