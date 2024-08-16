<?php

namespace App\Services\Person;

use App\Services\Base\BaseServiceInterface;

interface PersonServiceInterface extends BaseServiceInterface
{
    public function findByMobile(string $mobile);

}

