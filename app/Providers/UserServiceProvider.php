<?php

namespace App\Providers;

use App\Repository\UserRepository;
use App\Repository\Eloquent\UserRepository as UserRepositoryEloquent;
use Illuminate\Support\ServiceProvider;
use App\Models\User;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            UserRepository::class,
            UserRepositoryEloquent::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
