<?php

namespace App\Providers;

use App\Repository\Eloquent\HolidayPlanRepository;
use App\Repository\HolidayPlanRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(HolidayPlanRepositoryInterface::class, HolidayPlanRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
