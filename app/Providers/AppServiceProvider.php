<?php

namespace App\Providers;

use App\Services\Impl\UserServiceImpl;
use App\Services\ProfileService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;
use App\Services\Impl\ProfileServiceImpl;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProfileService::class, ProfileServiceImpl::class);
        $this->app->bind(UserService::class, UserServiceImpl::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
