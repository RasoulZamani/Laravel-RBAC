<?php

namespace App\Repositories\Role;

use App\Repositories\Base\BaseRepositoryInterface;

interface RoleRepositoryInterface extends BaseRepositoryInterface  {
    
   public function findRoleByTitle(string $title);
   
}