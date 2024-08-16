<?php

namespace App\Repositories\EducationLevel;

use App\Models\EducationLevel;
use App\Repositories\Base\BaseRepository;

class EducationLevelRepository extends BaseRepository implements EducationLevelRepositoryInterface {
    
    public function __construct(EducationLevel $model) {
        parent::__construct($model);
    }

}