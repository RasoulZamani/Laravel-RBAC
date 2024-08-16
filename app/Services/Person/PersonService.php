<?php

namespace App\Services\Person;

use App\Services\Base\BaseService;
use App\Repositories\Person\PersonRepositoryInterface;


class PersonService extends BaseService implements PersonServiceInterface
{
    public function __construct(PersonRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
    
}
