<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Untuk API development
        // if ($this->app->environment('local')) {
        //     $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
        //     $this->app->register(TelescopeServiceProvider::class);
        // }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Fix untuk masalah string length di MySQL versi lama
        Schema::defaultStringLength(191);

        // Gunakan Bootstrap untuk pagination
        Paginator::useBootstrap();

        // Force HTTPS di production
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        // Observers untuk model yang berhubungan dengan notifikasi
        // User::observe(UserObserver::class);
    }
}