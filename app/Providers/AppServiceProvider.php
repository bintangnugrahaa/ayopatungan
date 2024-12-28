<?php

namespace App\Providers;

use App\Models\ProductSubscription;
use App\Observers\ProductSubscriptionObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ProductSubscription::observe(ProductSubscriptionObserver::class);
    }
}
