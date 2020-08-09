<?php

namespace App\Http\Middleware;

use Closure;
use App\Country;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class CheckCountry
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $country = Country::firstWhere(['name' => $request->country]);

        if (!$country) {
            throw new UnprocessableEntityHttpException('Country not found');
        }

        return $next($request);
    }
}
