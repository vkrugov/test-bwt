<?php

namespace App\Http\Controllers;

use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    private $user;

    /**
     * CountryController constructor.
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
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
