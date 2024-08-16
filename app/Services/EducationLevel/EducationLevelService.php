<?php

namespace App\Services\EducationLevel;

use App\Services\Base\BaseService;
use App\Repositories\EducationLevel\EducationLevelRepositoryInterface;


class EducationLevelService extends BaseService implements EducationLevelServiceInterface
{
    public function __construct(EducationLevelRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
    
}
