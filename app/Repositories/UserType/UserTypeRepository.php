<?php

namespace App\Repositories\UserType;

use App\Models\UserType;
use App\Repositories\Base\BaseRepository;
use App\Repositories\UserType\UserTypeRepositoryInterface;

class UserTypeRepository extends BaseRepository implements UserTypeRepositoryInterface {
    public function __construct(UserType $model) {
        parent::__construct($model);
    }
    /**
     * Find a UserType by its title
     */
    public function findUserTypeByTitle(string $title) {
        return $this->model->where('title', $title)->first();
    }
}