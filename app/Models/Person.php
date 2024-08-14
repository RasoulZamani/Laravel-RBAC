<?php

namespace App\Models;

use App\Models\User;
use App\Models\BaseModel\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Person extends BaseModel
{
    use HasFactory;
    protected $table="persons";

    /**
     * Relations
     */
    //person -< user
    public function users() {
        return $this->hasMany(User::class,'person_id','id');
    }
}
