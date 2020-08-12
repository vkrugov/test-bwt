<?php

namespace App\Providers;

use App\Repositories\User\UserEloquent;
use App\Repositories\User\UserRepository;
use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryProvider
 * @package App\Providers
 */
class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepository::class, UserEloquent::class);
    }
}
