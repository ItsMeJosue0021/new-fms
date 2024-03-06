<?php

namespace App\Providers;

use App\Services\UserService;
use App\Services\ProfileService;
use App\Services\ServiceService;
use App\Services\Impl\UserServiceImpl;
use Illuminate\Support\ServiceProvider;
use App\Services\Impl\ProfileServiceImpl;
use App\Services\Impl\ServiceServiceImpl;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProfileService::class, ProfileServiceImpl::class);
        $this->app->bind(UserService::class, UserServiceImpl::class);
        $this->app->bind(ServiceService::class, ServiceServiceImpl::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
