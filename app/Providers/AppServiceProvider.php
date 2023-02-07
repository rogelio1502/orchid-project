<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Orchid\Platform\Dashboard;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dashboard $ds)
    {
        $ds->registerResource('scripts','/js/app.js');
        $ds->registerResource('stylesheets','/css/tom-select.default.css');

    }
}
