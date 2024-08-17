<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Role;
use App\Models\User;
use App\Models\Person;
use App\Models\UserType;
use App\Models\Permission;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\Models\EducationLevel;
use App\Models\PermissionRole;
use App\Models\PermissionUser;
use App\Policies\PersonPolicy;
use App\Policies\UserTypePolicy;
use App\Policies\PermissionPolicy;
use App\Policies\EducationLevelPolicy;
use App\Policies\PermissionRolePolicy;
use App\Policies\PermissionUserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        EducationLevel::class => EducationLevelPolicy::class,
        Permission::class => PermissionPolicy::class,
        PermissionRole::class => PermissionRolePolicy::class,
        PermissionUser::class => PermissionUserPolicy::class,
        Person::class => PersonPolicy::class,
        Role::class => RolePolicy::class,
        User::class => UserPolicy::class,
        UserType::class => UserTypePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
