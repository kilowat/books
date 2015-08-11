<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class IncServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    	include(app_path('Lib'.DIRECTORY_SEPARATOR.'htmlMacro.php'));
    	
    	//include(app_path('Lib'.DIRECTORY_SEPARATOR.'Menu.php'));
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
