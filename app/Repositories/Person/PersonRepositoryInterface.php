<?php

namespace App\Repositories\Person;

use App\Repositories\Base\BaseRepositoryInterface;

interface PersonRepositoryInterface extends BaseRepositoryInterface  {
    
   public function findByMobile(string $mobile);
   
}