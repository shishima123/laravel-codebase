<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Facades\StorageHelper;
use App\Helpers\StorageHelper as StorageHelperInstance;

class StorageHelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(StorageHelper::class, function () {
            return new StorageHelperInstance();
        });
    }

    public function provides(): array
    {
        return [StorageHelper::class];
    }
}
