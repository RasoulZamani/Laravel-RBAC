<?php

namespace App\Models;

use App\Models\User;
use App\Models\Permission;
use App\Models\BaseModel\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends BaseModel
{
    use HasFactory;

    protected array $searchFields = [
        "id", "title", "description"
    ]; 
    
    /**
     * Relations
     */
    // role -< user
    public function users() {
        return $this->hasMany(User::class. 'role_id','id');
    }

    // role >-pivot (permission_role) -< permission
    public function permissions() {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }
}

