<?php

namespace App\Providers;

use App\Tools\Amadeus;
use Illuminate\Support\ServiceProvider;

class ToolsServiceProvider extends ServiceProvider
{

    public function register() {

        $this->app->bind('Amadeus', function () {
            return new Amadeus;
        });
        
    }

}