<?php

namespace App\SoftpersFacades;
use Illuminate\Support\Facades\Facade;

class SoftpersHelperFacade extends Facade {
    
    protected static function getFacadeAccessor()
    {
        return 'softpersHelper';
    }
}