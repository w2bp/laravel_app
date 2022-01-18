<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\MyClasses\PowerMyService;

class MyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        app()->singleton(PowerMyService::class, function ($app){
            return new PowerMyService();
        });
        echo "MyServiceProvider/register<br/>";
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        echo "MyServiceProvider/boot<br/>";
    }
}
