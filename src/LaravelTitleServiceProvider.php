<?php

namespace Garf\LaravelTitle;

use Illuminate\Support\ServiceProvider;

class LaravelTitleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/laravel-title.php' => config_path('laravel-title.php')
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/laravel-title.php', 'laravel-title'
        );

        $this->registerLaravelTitle();
        $this->app->alias('Title', \Garf\LaravelTitle\Title::class);
    }

    private function registerLaravelTitle()
    {
        $this->app->singleton('Title', function () {
            return new Title();
        });
    }
}
