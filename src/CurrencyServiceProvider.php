<?php

namespace CER\Currency;

use Illuminate\Support\ServiceProvider;

class CurrencyServiceProvider extends ServiceProvider
{
    
    public function register()
    {
        $this->app->make("CER\Currency\Controllers\CurrencyController");
        
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'cer/currency');
    }

    
}
