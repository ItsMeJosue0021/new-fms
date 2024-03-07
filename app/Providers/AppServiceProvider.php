<?php

namespace App\Providers;

use App\Services\UserService;
use App\Services\CasketService;
use App\Services\HearseService;
use App\Services\ProfileService;
use App\Services\ServiceService;
use App\Services\Impl\UserServiceImpl;
use Illuminate\Support\ServiceProvider;
use App\Services\Impl\CasketServiceImpl;
use App\Services\Impl\HearseServiceImpl;
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
        $this->app->bind(CasketService::class, CasketServiceImpl::class);
        $this->app->bind(HearseService::class, HearseServiceImpl::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
