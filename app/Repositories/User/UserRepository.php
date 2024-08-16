<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\Base\BaseRepository;
use App\Repositories\User\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface {
    
    
    public function __construct(User $model) {
        parent::__construct($model);

    }
    public function extraMethod(){
            
    }

}