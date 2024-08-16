<?php

namespace App\Services\User;

use App\Services\Base\BaseServiceInterface;

interface UserServiceInterface extends BaseServiceInterface
{
    public function login();
    public function getPermissions(string $role_id);
    public function addPermission(string $role_id, array $permissionIds);
    public function removePermission(string $role_id, array $permissionIds); 
}

