<?php

namespace App\Providers;

use App\Repository\Base\BaseRepository;
use App\Repository\User\UserRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\Base\BaseRepositoryInterface;
use App\Repository\User\UserRepositoryInterface;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        // $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
