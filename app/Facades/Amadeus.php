<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Amadeus extends Facade
{

    protected static function getFacadeAccessor() {

        return 'Amadeus';

    }

}