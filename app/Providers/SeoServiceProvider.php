<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SeoService;

class SeoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(SeoService::class, function ($app) {
            return new SeoService();
        });
    }

    public function boot()
    {

    }
}
