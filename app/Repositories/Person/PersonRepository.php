<?php

namespace App\Repositories\Person;

use App\Models\Person;
use App\Repositories\Base\BaseRepository;

class PersonRepository extends BaseRepository implements PersonRepositoryInterface {
    
    public function __construct(Person $model) {
        parent::__construct($model);
    }
    public function findByMobile(string $mobile){
       return $this->model->where('mobile_number', $mobile)->first();
    }
}