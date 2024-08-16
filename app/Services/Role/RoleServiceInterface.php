<?php

namespace App\Services\Role;

use App\Services\Base\BaseServiceInterface;

interface RoleServiceInterface extends BaseServiceInterface
{
    public function getPermissions(string $role_id);
    public function addPermission(string $role_id, array $permissionIds);
    public function removePermission(string $role_id, array $permissionIds); 
}

