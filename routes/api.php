<?php

use App\Http\Controllers\API\CitiesController;
use App\Http\Controllers\API\CountriesController;
use App\Http\Controllers\API\DepartmentsController;
use App\Http\Controllers\API\EmployeesController;
use App\Http\Controllers\API\RegisterUsersController;
use App\Http\Controllers\API\StatesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', RegisterUsersController::class);

Route::middleware('auth:api')->group(function () {
    Route::get('employees', [EmployeesController::class, 'index']);
    Route::post('employees', [EmployeesController::class, 'store']);
    Route::put('employees/{employee}', [EmployeesController::class, 'update']);
    Route::delete('employees/{employee}', [EmployeesController::class, 'destroy']);

    Route::get('countries', [CountriesController::class, 'index']);

    Route::get('states', [StatesController::class, 'index']);

    Route::get('cities', [CitiesController::class, 'index']);

    Route::get('departments', [DepartmentsController::class, 'index']);
});
