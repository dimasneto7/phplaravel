<?php

namespace App\Providers;

use App\Classes\Tools;
use Illuminate\Support\ServiceProvider;

class ToolsServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind('tools', function(){
            return new Tools;
        });
    }

    public function boot()
    {
        //
    }
}
