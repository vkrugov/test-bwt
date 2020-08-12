<?php

namespace App\Http\Controllers;

use CountryService;
use App\Country;
use Illuminate\Http\Request;

/**
 * Class CompanyController
 * @package App\Http\Controllers
 */
class CompanyController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByCountry(Request $request)
    {
        return $this->asJson(Country::firstWhere(['name' => $request->country])->companies);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByCountryShort(Request $request)
    {
        $country = Country::firstWhere(['name' => $request->country]);

        return $this->asJson(CountryService::getCompaniesByCountry($country));
    }
}
