<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class CountryService
 * @package App\Facades
 */
class CountryService extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'countryService';
    }
}
