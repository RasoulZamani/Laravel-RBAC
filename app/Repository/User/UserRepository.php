<?php

namespace App\Repository\User;

use App\Models\User;
use Illuminate\Support\Collection;
use App\Repository\Base\BaseRepository;
// use App\Repository\User\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface {
    
    
    public function __construct(User $model) {
        parent::__construct($model);
        // $this->model = $model;
    }

    public function extraMethod(){
        return null;
    }


    

}