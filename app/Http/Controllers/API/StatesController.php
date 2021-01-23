<?php

namespace App\Http\Controllers\API;

use App\Domain\State\State;
use App\Domain\State\StateFilters;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class StatesController extends Controller
{
    /**
     * List states.
     *
     * @param StateFilters $filters
     *
     * @return JsonResponse
     */
    public function index(StateFilters $filters)
    {
        return response()->json(
            State::filter($filters)->get(),
        );
    }
}
