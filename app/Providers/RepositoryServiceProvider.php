<?php

namespace App\Providers;

use App\Models\User;
use App\Repository\Base\BaseRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\Base\BaseRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;



class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

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
