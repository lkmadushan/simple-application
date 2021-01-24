<?php

namespace App\Http\Controllers\API;

use App\Domain\City\City;
use App\Domain\City\CityFilters;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class CitiesController extends Controller
{
    /**
     * List cities.
     *
     * @param CityFilters $filters
     *
     * @return JsonResponse
     */
    public function index(CityFilters $filters)
    {
        return response()->json(
            City::filter($filters)->get(),
        );
    }
}
