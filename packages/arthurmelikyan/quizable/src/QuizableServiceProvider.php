<?php

namespace Arthurmelikyan\Quizable;

use Illuminate\Support\ServiceProvider;

class QuizableServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'arthurmelikyan');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'arthurmelikyan');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

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
        $this->mergeConfigFrom(__DIR__.'/../config/quizable.php', 'quizable');

        // Register the service the package provides.
        $this->app->singleton('quizable', function ($app) {
            return new Quizable;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['quizable'];
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
            __DIR__.'/../config/quizable.php' => config_path('quizable.php'),
        ], 'quizable.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/arthurmelikyan'),
        ], 'quizable.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/arthurmelikyan'),
        ], 'quizable.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/arthurmelikyan'),
        ], 'quizable.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
