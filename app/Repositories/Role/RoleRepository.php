<?php

namespace App\Repositories\Role;

use App\Models\Role;
use App\Repositories\Base\BaseRepository;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface {
    
    public function __construct(Role $model) {
        parent::__construct($model);
    }

    /**
     * Find a Role by its title
     */
    public function findRoleByTitle(string $title) {
        return $this->model->where('title', $title)->first();
    }
}