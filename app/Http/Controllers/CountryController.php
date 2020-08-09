<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use CountryService;

/**
 * Class CountryController
 * @package App\Http\Controllers
 */
class CountryController extends Controller
{
    /**
     * CountryController constructor.
     */
    public function __construct()
    {
        $this->middleware('checkCountry', [
            'only' => [
                'getByCountryShort', 'getByCountry', 'getUsers'
            ]
        ]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUsers(Request $request)
    {
        return $this->asJson(Country::firstWhere(['name' => $request->country])->users);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCompanies(Request $request)
    {
        return $this->asJson(Country::firstWhere(['name' => $request->country])->companies);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCompaniesShort(Request $request)
    {
        $country = Country::firstWhere(['name' => $request->country]);

        return $this->asJson(CountryService::getCompaniesByCountry($country));
    }
}
