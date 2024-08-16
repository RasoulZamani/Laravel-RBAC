<?php

namespace App\Services\Authentication;

use App\Services\Base\BaseServiceInterface;

interface AuthenticationServiceInterface {
    public function login(array $credentials);
    public function register(array $attributes); // get needed information of person and user
    public function registerByPersonId(string $personId, array $userAttributes); // get needed information of user and person_id

}

