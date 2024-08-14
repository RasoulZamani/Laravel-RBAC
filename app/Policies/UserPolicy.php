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
        return in_array('users:viewAny', $user->permissions->pluck('title')->toArray());

        // return $user->permissions->pluck('title')->contains('users:viewAny');/// in_array('users:viewAny', $user->permissions->toArray());
    }

    /**
     * Determine if the user can view a specific user.
     */
    public function view(User $user, User $userNoticed)
    {   
        return in_array('users:view', $user->permissions->pluck('title')->toArray()) ||
               (in_array('users:own:view', $user->permissions->pluck('title')->toArray()) && $this->isOwner($user, $userNoticed));
    }   

    /**
     * Determine if the user can create a user.
     */
    public function create(User $user)
    {
        return in_array('users:create', $user->permissions->toArray());
    }

    /**
     * Determine if the user can update a specific user.
     */
    public function update(User $user, User $userNoticed)
    {
        return in_array('users:update', $user->permissions->toArray()) ||
               (in_array('users:own:update', $user->permissions->toArray()) && $this->isOwner($user, $userNoticed));
    }

    /**
     * Determine if the user can delete a specific user.
     */
    public function delete(User $user, User $userNoticed)
    {
        return in_array('users:delete', $user->permissions->toArray()) ||
               (in_array('users:own:delete', $user->permissions->toArray()) && $this->isOwner($user, $userNoticed));
    }

    /**
     * Determine if the user owns the user.
     */
    protected function isOwner(User $user, User $userNoticed)
    {   
        return $user->id === $userNoticed->id;
    }
}
