<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Person;

class PersonPolicy
{
    /**
     * Determine if the user can view any persons.
     */
    public function viewAny(User $user)
    {
        return $user->hasPermission('persons:viewAny');
    }

    /**
     * Determine if the user can view a specific person.
     */
    public function view(User $user, Person $person)
    {
        return $user->hasPermission('persons:view') || 
            ($user->hasPermission('persons:own:view') && $this->isOwner($user, $person));
    }

    /**
     * Determine if the user can create a person.
     */
    public function create(User $user)
    {
        return  $user->hasPermission('persons:create');
    }

    /**
     * Determine if the user can update a specific person.
     */
    public function update(User $user, Person $person)
    {
        return $user->hasPermission('persons:update') || 
            ($user->hasPermission('persons:own:update') && $this->isOwner($user, $person));
        
    }

    /**
     * Determine if the user can delete a specific person.
     */
    public function delete(User $user, Person $person)
    {
        return $user->hasPermission('persons:delete') || 
        ($user->hasPermission('persons:own:delete') && $this->isOwner($user, $person));
        }

    /**
     * Determine if the user owns the person.
     */
    protected function isOwner(User $user, Person $person)
    {   
        return ($user->person_id === $person->id); 
    }
}
