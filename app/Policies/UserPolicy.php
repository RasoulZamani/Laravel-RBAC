<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Cache;

class UserPolicy
{
    /**
     * Determine if the user can view any users.
     */
    public function viewAny(User $user)
    {
        return $user->hasPermission('users:viewAny');

        //return in_array('users:viewAny', $user->permissions->pluck('title')->toArray());

    }

    /**
     * Determine if the user can view a specific user.
     */
    public function view(User $user, User $userNoticed)
    {   
        return $user->hasPermission('users:view') || 
            ($user->hasPermission('users:own:view') && $this->isOwner($user, $userNoticed));
        
        // return in_array('users:view', $user->permissions->pluck('title')->toArray()) ||
        //        (in_array('users:own:view', $user->permissions->pluck('title')->toArray()) && $this->isOwner($user, $userNoticed));
    }   

    /**
     * Determine if the user can create a user.
     */
    public function create(User $user)
    {
        return  $user->hasPermission('users:create');

        //return in_array('users:create', $user->permissions->pluck('title')->toArray());
    }

    /**
     * Determine if the user can update a specific user.
     */
    public function update(User $user, User $userNoticed)
    {
        return $user->hasPermission('users:update') || 
            ($user->hasPermission('users:own:update') && $this->isOwner($user, $userNoticed));
    }

    /**
     * Determine if the user can delete a specific user.
     */
    public function delete(User $user, User $userNoticed)
    {
        return $user->hasPermission('users:delete') || 
        ($user->hasPermission('users:own:delete') && $this->isOwner($user, $userNoticed));
    
    }

    /**
     * Determine if the user owns the user.
     */
    protected function isOwner(User $user, User $userNoticed)
    {   
        // ownership for user is equivalency
        return $user->id === $userNoticed->id;
    }

    /**
     * Determine if the user can see permissions of user
     */
    protected function viewPermission(User $user){
        return $user->hasPermission('permission_user:create');
    }

    /**
     * Determine if the user can add permissions to user
     */
    protected function addPermissionToUser(User $user){
        return $user->hasPermission('permission_user:create');
    }

    /**
     * Determine if the user can remove permissions of user
     */
    protected function removePermissionToRole(User $user){
        return $user->hasPermission('permission_user:delete');
    }
}
