<?php

namespace App\Services\Permission;

use App\Services\Base\BaseService;
use App\Repositories\Permission\PermissionRepositoryInterface;


class PermissionService extends BaseService implements PermissionServiceInterface
{
    public function __construct(PermissionRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }

}