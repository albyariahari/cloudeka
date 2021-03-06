<?php

namespace App\Vendor\Kryptonit3\Counter;

use \Illuminate\Support\ServiceProvider;

class CounterServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    public function register()
    {
        $this->app->singleton('counter', function() {
            return $this->app->make('App\Vendor\Kryptonit3\Counter\Counter');
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/migrations/' => base_path('/database/migrations')
        ], 'migrations');
        
        if (!$this->app->routesAreCached()) {
            require __DIR__.'/routes.php';
        }
    }

    public function provides()
    {
        return ['counter'];
    }
}
