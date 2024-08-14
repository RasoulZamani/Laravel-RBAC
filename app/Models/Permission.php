<?php

namespace App\Models;

use App\Models\Role;
use App\Models\User;
use App\Models\BaseModel\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends BaseModel
{
    use HasFactory;

    /**
     * Relations
     */
    
    // permission >-pivot (permission_role) -< role
    protected function roles() {
        return $this->belongsToMany(Role::class, 'permission_role');
    }

    // permission >-pivot (permission_user) -< user
    protected function users() {
        return $this->belongsToMany(User::class, 'permission_user');
    }
}
