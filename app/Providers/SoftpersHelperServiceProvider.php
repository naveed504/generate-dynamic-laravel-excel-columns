<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\SoftpersHelpers\SoftpersHelperClass;

class SoftpersHelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('softpersHelper',function(){
            return new SoftpersHelperClass();
        });
    }
}
