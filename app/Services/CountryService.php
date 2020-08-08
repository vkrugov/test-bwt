<?php

namespace App\Services;

use App\Company;
use App\Country;

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
     * @param $country
     * @return array
     */
    public function getCompanies($country):array
    {
        $this->setCountry($country);

        $result = [];

        foreach ($this->country->companies as $key => $company) {
            $result[$key] = [
                'Company' => $company->name,
                'Users' => $this->getFormatCompanyUsers($company)
            ];
        }

        return $result;
    }

    /**
     * @param Company $company
     * @return array
     */
    private function getFormatCompanyUsers(Company $company): array
    {
        $result = [];

        foreach ($company->users as $key => $user) {
            $result[$key] = [
                'User Name' => $user->name,
                'User Email' => $user->email,
                'Connected to company' => $user->pivot->connected_at,
            ];
        }

        return $result;
    }

    /**
     * @param $country
     */
    private function setCountry($country): void
    {
        $this->country = $country;
    }
}
