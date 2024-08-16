<?php

namespace App\Repositories\UserType;

use App\Repositories\Base\BaseRepositoryInterface;

interface UserTypeRepositoryInterface extends BaseRepositoryInterface  {
    public function findUserTypeByTitle(string $title);
}