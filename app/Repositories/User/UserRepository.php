<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Collection;
use App\Repositories\Base\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface {
    
    
    public function __construct(User $model) {
        parent::__construct($model);
        // $this->model = $model;
    }

    public function extraMethod(){
        return null;
    }


    

}