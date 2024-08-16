<?php

namespace App\Repositories\Role;

use App\Models\Role;
use App\Repositories\Base\BaseRepository;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface {
    
    public function __construct(Role $model) {
        parent::__construct($model);
    }

}