<?php

namespace App\Repositories\UserType;

use App\Models\UserType;
use App\Repositories\Base\BaseRepository;
use App\Repositories\UserType\UserTypeRepositoryInterface;

class UserTypeRepository extends BaseRepository implements UserTypeRepositoryInterface {
    public function __construct(UserType $model) {
        parent::__construct($model);
    }
}