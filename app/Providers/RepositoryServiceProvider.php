<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\User\UserRepository;
use App\Repositories\Person\PersonRepository;
use App\Repositories\UserType\UserTypeRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Person\PersonRepositoryInterface;
use App\Repositories\UserType\UserTypeRepositoryInterface;
use App\Repositories\EducationLevel\EducationLevelRepository;
use App\Repositories\EducationLevel\EducationLevelRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(EducationLevelRepositoryInterface::class, EducationLevelRepository::class);
        $this->app->bind(PersonRepositoryInterface::class, PersonRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserTypeRepositoryInterface::class, UserTypeRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
