<?php

namespace App\Models;

use App\Models\BaseModel\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends BaseModel
{
    use HasFactory;
    protected $table="persons";

    //relation
    public function users() {
        return $this->hasMany(User::class,'person_id','id');
    }
}
