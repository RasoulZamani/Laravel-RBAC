<?php

namespace App\Providers;


use App\Services\Role\RoleService;
use App\Services\User\UserService;
use App\Services\Person\PersonService;
use Illuminate\Support\ServiceProvider;
use App\Services\UserType\UserTypeService;
use App\Services\Role\RoleServiceInterface;
use App\Services\User\UserServiceInterface;
use App\Services\Permission\PermissionService;
use App\Services\Person\PersonServiceInterface;
use App\Services\UserType\UserTypeServiceInterface;
use App\Services\Authentication\AuthenticationService;
use App\Services\EducationLevel\EducationLevelService;
use App\Services\Permission\PermissionServiceInterface;
use App\Services\Authentication\AuthenticationServiceInterface;
use App\Services\EducationLevel\EducationLevelServiceInterface;




class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthenticationServiceInterface::class, AuthenticationService::class);
        $this->app->bind(EducationLevelServiceInterface::class, EducationLevelService::class);
        $this->app->bind(PersonServiceInterface::class, PersonService::class);
        $this->app->bind(PermissionServiceInterface::class, PermissionService::class);
        $this->app->bind(RoleServiceInterface::class, RoleService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(UserTypeServiceInterface::class, UserTypeService::class);

        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
