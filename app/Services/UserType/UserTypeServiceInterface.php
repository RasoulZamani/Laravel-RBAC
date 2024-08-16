<?php

namespace App\Services\UserType;

use App\Services\Base\BaseServiceInterface;

interface UserTypeServiceInterface extends BaseServiceInterface {
    public function findByTitle(string $title);
}

