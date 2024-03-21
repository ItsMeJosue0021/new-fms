<?php

namespace App\Providers;

use App\Services\JobService;
use App\Services\FileService;
use App\Services\UserService;
use App\Services\CasketService;
use App\Services\HearseService;
use App\Services\ProfileService;
use App\Services\ServiceService;
use App\Services\DeceasedService;
use App\Services\ReligionService;
use App\Services\InformantService;
use App\Services\DeathCauseService;
use App\Services\Impl\JobServiceImpl;
use App\Services\RelationshipService;
use App\Services\Impl\FileServiceImpl;
use App\Services\Impl\UserServiceImpl;
use App\Services\ServiceRequestService;
use Illuminate\Support\ServiceProvider;
use App\Services\Impl\CasketServiceImpl;
use App\Services\Impl\HearseServiceImpl;
use App\Services\Impl\ProfileServiceImpl;
use App\Services\Impl\ServiceServiceImpl;
use App\Services\Impl\DeceasedServiceImpl;
use App\Services\Impl\ReligionServiceImpl;
use App\Services\Impl\InformantServiceImpl;
use App\Services\Impl\DeathCauseServiceImpl;
use App\Services\Impl\RelationshipServiceImpl;
use App\Services\Impl\ServiceRequestServiceImpl;

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
        $this->app->bind(RelationshipService::class, RelationshipServiceImpl::class);
        $this->app->bind(InformantService::class, InformantServiceImpl::class);
        $this->app->bind(ServiceRequestService::class, ServiceRequestServiceImpl::class);
        $this->app->bind(FileService::class, FileServiceImpl::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
