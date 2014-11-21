<?php namespace Smalldogs\Ip2Country;

use Illuminate\Support\Facades\Facade;

class Ip2CountryFacade extends Facade {

    protected static function getFacadeAccessor() { return 'ip2country'; }
}