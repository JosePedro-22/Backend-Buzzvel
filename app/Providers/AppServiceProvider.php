<?php

namespace App\Providers;

use App\Domain\HolidayPlan\Repository\PlanRepository;
use App\Domain\HolidayPlan\Repository\HolidayPlanRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(HolidayPlanRepositoryInterface::class, PlanRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
