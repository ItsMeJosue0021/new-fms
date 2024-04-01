<?php

namespace App\Providers;

use App\Models\ServiceRequest;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Using class based composers...
        View::composer('components.admin', function ($view) {
            $count = ServiceRequest::where('created_at', '>=', now()->subDay())
            ->where('status', 'pending')
            ->count();
            $view->with('serviceRequestCount', $count);
        });

    }
}
