<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use App\Models\Person;
use App\Models\Permission;
use App\Traits\SearchRecords;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SearchRecords;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
    protected $guarded=["created_at", "updated_at", "deleted_at"];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relations of User
     */
    // user >- person
    public function person() {
        return $this->belongsTo(Person::class,'person_id', 'id');
    }
    // user >- role
    public function role() {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    // user >-pivot (permission_user) -< permission
    public function permissions() {
        return $this->belongsToMany(Permission::class, 'permission_user');
    }

    // check user has specified permission
    public function hasPermission ($permission) {
        return $this->permissions()->where('title', $permission)->exists();
    }

}
