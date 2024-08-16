<?php

namespace App\Repositories\User;

use App\Model\User;
use Illuminate\Support\Collection;
use App\Repositories\Base\BaseRepositoryInterface;

interface UserRepositoryInterface extends BaseRepositoryInterface  {
    
   // extra methods for users
   public function extraMethod();
   

}