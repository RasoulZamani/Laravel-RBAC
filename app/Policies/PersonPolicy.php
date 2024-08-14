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
        return in_array('persons:viewAny', $user->permissions);
    }

    /**
     * Determine if the user can view a specific person.
     */
    public function view(User $user, Person $person)
    {
        return in_array('persons:view', $user->permissions) ||
               (in_array('persons:own:view', $user->permissions) && $this->isOwner($user, $person));
    }

    /**
     * Determine if the user can create a person.
     */
    public function create(User $user)
    {
        return in_array('persons:create', $user->permissions);
    }

    /**
     * Determine if the user can update a specific person.
     */
    public function update(User $user, Person $person)
    {
        return in_array('persons:update', $user->permissions) ||
               (in_array('persons:own:update', $user->permissions) && $this->isOwner($user, $person));
    }

    /**
     * Determine if the user can delete a specific person.
     */
    public function delete(User $user, Person $person)
    {
        return in_array('persons:delete', $user->permissions) ||
               (in_array('persons:own:delete', $user->permissions) && $this->isOwner($user, $person));
    }

    /**
     * Determine if the user owns the person.
     */
    protected function isOwner(User $user, Person $person)
    {   
        return (in_array($user->id, $person->users->id ));
    }
}
