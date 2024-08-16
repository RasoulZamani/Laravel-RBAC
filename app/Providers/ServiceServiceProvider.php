<?php

namespace App\Providers;


use App\Services\User\UserService;
use App\Services\Person\PersonService;
use Illuminate\Support\ServiceProvider;
use App\Services\User\UserServiceInterface;
use App\Services\Person\PersonServiceInterface;
use App\Services\EducationLevel\EducationLevelService;
use App\Services\EducationLevel\EducationLevelServiceInterface;




class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(EducationLevelServiceInterface::class, EducationLevelService::class);
        $this->app->bind(PersonServiceInterface::class, PersonService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
