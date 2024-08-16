<?php

namespace App\Services\UserType;

use App\Services\Base\BaseService;
use App\Repositories\UserType\UserTypeRepositoryInterface;


class UserTypeService extends BaseService implements UserTypeServiceInterface
{
    public function __construct(UserTypeRepositoryInterface $repository){
        parent::__construct($repository);
    }
    /**
     * Find a UserType by its title
     */
    public function findByTitle(string $title) {
        return $this->repository->findUserTypeByTitle($title);
    }
}
