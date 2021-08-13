<?php

namespace App\Providers;

use App\Repository\Builder\GameRepository as BuilderGameRepository;
use App\Repository\GameRepository as GameRepository;
use App\Repository\Eloquent\GameRepository as EloquentGameRepository;
use Illuminate\Support\ServiceProvider;

class GameServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            GameRepository::class,
            BuilderGameRepository::class,
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
