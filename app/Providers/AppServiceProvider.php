<?php

namespace App\Providers;

use App\Services\JobService;
use App\Services\UserService;
use App\Services\CasketService;
use App\Services\HearseService;
use App\Services\ProfileService;
use App\Services\ServiceService;
use App\Services\DeceasedService;
use App\Services\ReligionService;
use App\Services\DeathCauseService;
use App\Services\Impl\JobServiceImpl;
use App\Services\Impl\UserServiceImpl;
use Illuminate\Support\ServiceProvider;
use App\Services\Impl\CasketServiceImpl;
use App\Services\Impl\HearseServiceImpl;
use App\Services\Impl\ProfileServiceImpl;
use App\Services\Impl\ServiceServiceImpl;
use App\Services\Impl\DeceasedServiceImpl;
use App\Services\Impl\ReligionServiceImpl;
use App\Services\Impl\DeathCauseServiceImpl;

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
        $this->app->bind(JobService::class, JobServiceImpl::class);
        $this->app->bind(ReligionService::class, ReligionServiceImpl::class);
        $this->app->bind(DeathCauseService::class, DeathCauseServiceImpl::class);
        $this->app->bind(DeceasedService::class, DeceasedServiceImpl::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
