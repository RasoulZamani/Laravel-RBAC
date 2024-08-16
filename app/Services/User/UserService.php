<?php

namespace App\Services\User;

use App\Services\Base\BaseService;
use App\Repositories\User\UserRepositoryInterface;


class UserService extends BaseService implements UserServiceInterface
{
    public function __construct(UserRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
    
    public function login() {
        
    }
}
