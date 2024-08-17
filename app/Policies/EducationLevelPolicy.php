<?php

namespace App\Policies;

use App\Models\User;
use App\Models\EducationLevel;

class EducationLevelPolicy
{
    /**
     * Determine if the user can view any education_levels.
     */
    public function viewAny(User $user)
    {
        return $user->hasPermission('education_levels:viewAny');
    }

    /**
     * Determine if the user can view a specific education_level.
     */
    public function view(User $user, EducationLevel $education_level)
    {
        return $user->hasPermission('education_levels:view') ;
    }

    /**
     * Determine if the user can create a education_level.
     */
    public function create(User $user)
    {
        return  $user->hasPermission('education_levels:create');
    }

    /**
     * Determine if the user can update a specific education_level.
     */
    public function update(User $user, EducationLevel $education_level)
    {
        return $user->hasPermission('education_levels:update') ;
        
    }

    /**
     * Determine if the user can delete a specific education_level.
     */
    public function delete(User $user, EducationLevel $education_level)
    {
        return $user->hasPermission('education_levels:delete'); 
        }

    /**
     * Determine if the user owns the education_level.
     */
    // protected function isOwner(User $user, EducationLevel $education_level)
    // {   
    //     return ($user->education_level_id === $education_level->id); 
    // }
}
