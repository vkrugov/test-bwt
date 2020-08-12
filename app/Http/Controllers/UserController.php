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
     * @var User
     */
    private $user;

    /**
     * CountryController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->middleware('checkCountry', [
            'only' => [
                'getByCountry'
            ]
        ]);

        $this->user = $user;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByCountry(Request $request)
    {
        return $this->asJson($this->user->getByCountryName($request->country));
    }
}
