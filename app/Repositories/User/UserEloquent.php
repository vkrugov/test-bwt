<?php

namespace App\Repositories\User;

use Illuminate\Database\Eloquent\Collection;
use App\User;

/**
 * Class UserEloquent
 * @package App\Repositories\User
 */
class UserEloquent implements UserRepository
{
    /**
     * @var User
     */
    protected $user;

    /**
     * UserEloquent constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param string $country
     * @return Collection
     */
    public function getByCountryName(string $country): Collection
    {
        return $this->user->whereHas('companies.country', function ($query) use ($country) {
            $query->where(['name' => $country]);
        })->with(['companies' => function ($query) use ($country) {
            $query->whereHas('country', function ($query) use ($country) {
                $query->where(['name' => $country]);
            });
        }])->get();
    }
}
