<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Repositories\Interfaces\StatImportRepositoryInterface;
use App\Repositories\Interfaces\StatRepositoryInterface;
use App\Repositories\StatImportRepository;
use App\Repositories\StatRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(StatImportRepositoryInterface::class, StatImportRepository::class);
        $this->app->bind(StatRepositoryInterface::class, StatRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Paginator::useBootstrapFive();
    }
}
