<?php

namespace rafaelmorenojs\CurrencyConver\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

class CurrencyConver extends Facade
{    
    protected static function getFacadeAccessor()
    {
        return 'currency.conver';
    }
    
}