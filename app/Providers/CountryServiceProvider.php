<?php

namespace App\Providers;

use App\Services\CountryService;
use Illuminate\Support\ServiceProvider;

/**
 * Class CountryServiceProvider
 * @package App\Providers
 */
class CountryServiceProvider extends ServiceProvider
{
    /**
     * Register CountryService.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('countryService', CountryService::class);
    }
}
