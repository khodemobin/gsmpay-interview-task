<?php

namespace App\Providers;

use App\Services\AuthService;
use App\Services\PostService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(AuthService::class, function () {
            return new AuthService;
        });

        $this->app->singleton(UserService::class, function () {
            return new UserService;
        });

        $this->app->singleton(PostService::class, function () {
            return new PostService;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
