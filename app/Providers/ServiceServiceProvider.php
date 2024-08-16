<?php

namespace App\Providers;


use App\Services\User\UserService;
use Illuminate\Support\ServiceProvider;
use App\Services\User\UserServiceInterface;




class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
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
