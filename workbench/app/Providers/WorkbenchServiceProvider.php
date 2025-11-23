<?php

namespace Workbench\App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Permission\PermissionRegistrar;

class WorkbenchServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Prevent Spatie Permission from auto-loading its migrations
        // since we have our own migration in workbench/database/migrations
        $this->app->resolving(PermissionRegistrar::class, function () {
            \Spatie\Permission\PermissionServiceProvider::$runsMigrations = false;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
