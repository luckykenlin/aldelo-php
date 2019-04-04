<?php

namespace Luckykenlin\Aldelo\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

/**
 * Class ServiceProvider
 * @package Luckykenlin\Aldelo\Providers
 */
class ServiceProvider extends RouteServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish config files
        $this->publishes([
            __DIR__ . '/../config.php' => config_path('aldelo.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }
}