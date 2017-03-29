<?php

namespace Jaspaul\LaravelRollout;

use Opensoft\Rollout\Rollout;
use Jaspaul\LaravelRollout\Drivers\Cache;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Rollout::class, function ($app) {
            return new Rollout(new Cache($app->make('cache.store')));
        });
    }
}