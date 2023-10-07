<?php

namespace App\Providers;

use App\Services\PunkApi\BeerService;
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
        $this->app->bind(BeerService::class, function () {
            return new BeerService();
        });
    }
}
