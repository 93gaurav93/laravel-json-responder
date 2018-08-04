<?php

namespace GauravD\LaravelJsonResponder\Facades;

use Illuminate\Support\Facades\Facade;

class Responder extends Facade
{
   
    protected static function getFacadeAccessor()
    {
        return 'responder';
    }
}
