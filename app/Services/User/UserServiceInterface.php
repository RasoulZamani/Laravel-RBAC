<?php

namespace App\Services\User;

use App\Services\Base\BaseServiceInterface;

interface UserServiceInterface extends BaseServiceInterface
{
    public function login();
}

