<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryRequest;
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
    protected $user;

    /**
     * CountryController constructor.
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByCountry(CountryRequest $request)
    {
        return $this->asJson($this->user->getByCountryName($request->country));
    }
}
