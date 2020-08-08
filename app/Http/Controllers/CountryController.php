<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use CountryService;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkCountry', [
            'only' => [
                'getByCountryShort', 'getByCountry'
            ]
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCompanies(Request $request)
    {
        return $this->asJson(Country::firstWhere(['name' => $request->name])->companies);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCompaniesShort(Request $request)
    {
        $country = Country::firstWhere(['name' => $request->name]);

        return $this->asJson(CountryService::getCompanies($country));
    }
}
