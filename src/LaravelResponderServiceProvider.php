<?php

namespace GauravD\LaravelJsonResponder;

use GauravD\LaravelJsonResponder\Http\Controllers\JsonResponder;
use Illuminate\Support\ServiceProvider;

class LaravelResponderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('responder', function ($app) {
            return new JsonResponder();
        });
    }
}
