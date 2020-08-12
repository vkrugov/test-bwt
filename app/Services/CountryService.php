<?php

namespace App\Services;

use App\Country;
use App\User;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class CountryService
 * @package App\Services
 */
class CountryService
{
    /**
     * @var Country
     */
    public $country;

    /**
     * @var array
     */
    protected $companies = [];

    /**
     * @param Country $country
     * @return array
     */
    public function getCompaniesByCountry(Country $country): array
    {
        return $this->setCountry($country)->setCompanies()->getCompanies();
    }

    /**
     * @param string $country
     * @return Collection
     */
    public function getUsersByCountryName(string $country): Collection
    {
        return User::whereHas('companies.country', function ($query) use ($country) {
            $query->where(['name' => $country]);
        })->with(['companies' => function ($query) use ($country) {
            $query->whereHas('country', function ($query) use ($country) {
                $query->where(['name' => $country]);
            });
        }])->get();
    }

    /**
     * @return array
     */
    public function getCompanies(): array
    {
        return $this->companies;
    }

    /**
     * @param Country $country
     * @return $this
     */
    public function setCountry(Country $country): CountryService
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return $this
     */
    public function setCompanies(): CountryService
    {
        if(!empty($this->country)) {
            foreach ($this->country->companies as $key => $company) {
                $this->companies[$key] = [
                    'Company' => $company->name,
                    'Users' => $this->getFormatCompanyUsers($company->users)
                ];
            }
        }

        return $this;
    }

    /**
     * @param User[] $users
     * @return array
     */
    public function getFormatCompanyUsers(Collection $users): array
    {
        $result = [];

        foreach ($users as $key => $user) {
            $result[$key] = [
                'User Name' => $user->name,
                'User Email' => $user->email,
                'Connected to company' => $user->pivot->connected_at,
            ];
        }

        return $result;
    }
}
