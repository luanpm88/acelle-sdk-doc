<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Read and checked once per request, whatever the number of places that use it.
        $this->app->singleton(\App\ApiReference\Reference::class, function () {
            return \App\ApiReference\Reference::load();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
