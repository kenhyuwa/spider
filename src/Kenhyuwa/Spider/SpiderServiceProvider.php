<?php

namespace Kenhyuwa\Spider;

use Illuminate\Support\ServiceProvider;
use Kenhyuwa\Spider\Html\Spider;

class SpiderServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('spider', function($app) {
            return $this->app->make('Kenhyuwa\Spider\Html\Spider');
        });
    }
}