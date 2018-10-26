<?php

namespace rafaelmorenojs\CurrencyConver\Laravel\Providers;

use Illuminate\Support\ServiceProvider;
use rafaelmorenojs\CurrencyConver\Currency;

class CurrencyConverServiceProvider extends ServiceProvider
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
        $this->app->singleton('currency.conver', function () {
            return new Currency();
        });
    }
}