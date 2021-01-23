<?php

namespace App\Http\Controllers\API;

use App\Domain\Department\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class DepartmentsController extends Controller
{
    /**
     * List cities.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(
            Department::all(),
        );
    }
}
