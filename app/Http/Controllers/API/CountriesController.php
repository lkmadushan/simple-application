<?php

namespace App\Http\Controllers\API;

use App\Domain\Country\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class CountriesController extends Controller
{
    /**
     * List countries.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(
            Country::all(),
        );
    }
}
