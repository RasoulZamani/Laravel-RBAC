<?php

namespace App\Repository\User;

use App\Model\User;
use Illuminate\Support\Collection;
use App\Repository\Base\BaseRepositoryInterface;

interface UserRepositoryInterface extends BaseRepositoryInterface  {
    
   // extra methods for users
   public function extraMethod();
   

}