<?php

namespace OnyxTech\PayebizGateway;

use Illuminate\Support\ServiceProvider;

class PayebizGatewayServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'onyxtech');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'onyxtech');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
         $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/payebizgateway.php', 'payebizgateway');

        // Register the service the package provides.
        $this->app->singleton('payebizgateway', function ($app) {
            return new PayebizGateway;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['payebizgateway'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/payebizgateway.php' => config_path('payebizgateway.php'),
        ], 'payebizgateway.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/onyxtech'),
        ], 'payebizgateway.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/onyxtech'),
        ], 'payebizgateway.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/onyxtech'),
        ], 'payebizgateway.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
