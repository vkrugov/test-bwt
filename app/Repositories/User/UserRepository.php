<?php

namespace App\Repositories\User;

use Illuminate\Database\Eloquent\Collection;

/**
 * Interface UserRepository
 * @package App\Repositories\User
 */
interface UserRepository
{
    /**
     * @param string $country
     * @return Collection
     */
    public function getByCountryName(string $country): Collection;
}
