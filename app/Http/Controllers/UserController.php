<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * CountryController constructor.
     */
    public function __construct()
    {
        $this->middleware('checkCountry', [
            'only' => [
                'getByCountry'
            ]
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByCountry(Request $request)
    {
        return $this->asJson(User::getByCountryName($request->country));
    }
}
