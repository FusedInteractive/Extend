<?php

namespace Fused\Extend;

use Illuminate\Support\ServiceProvider;

class ExtendServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/extend.php' => config_path('extend.php'),
        ]);
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/extend.php', 'extend');

        $this->app->bind(Extend::class, function () {
            return new Extend(
                config('extend.api_key'),
                config('extend.store_id'),
                config('extend.sandbox'),
                config('extend.api_version')
            );
        });

        $this->app->alias(Extend::class, 'extend');
    }
}
