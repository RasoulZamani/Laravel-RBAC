<?php

namespace App\Providers;

use App\Models\User;
use App\Repository\Base\BaseRepository;
use App\Repository\User\UserRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\Base\BaseRepositoryInterface;
use App\Repository\User\UserRepositoryInterface;



class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        // $this->app->bind(UserRepository::class, function ($app) {
        //     return new UserRepository($app->make(User::class));
        // });
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
