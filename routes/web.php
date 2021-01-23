<?php

use App\Http\Controllers\ChangeUserPasswordController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StatesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::put('users/{user}/change-password', ChangeUserPasswordController::class)->name('change_password');

    Route::get('departments', [DepartmentsController::class, 'index'])->name('departments.index');
    Route::post('departments', [DepartmentsController::class, 'store'])->name('departments.store');
    Route::get('departments/create', [DepartmentsController::class, 'create'])->name('departments.create');
    Route::get('departments/{department}', [DepartmentsController::class, 'show'])->name('departments.show');
    Route::put('departments/{department}', [DepartmentsController::class, 'update'])->name('departments.update');
    Route::delete('departments/{department}', [DepartmentsController::class, 'destroy'])->name('departments.destroy');

    Route::get('countries', [CountriesController::class, 'index'])->name('countries.index');
    Route::post('countries', [CountriesController::class, 'store'])->name('countries.store');
    Route::get('countries/create', [CountriesController::class, 'create'])->name('countries.create');
    Route::get('countries/{country}', [CountriesController::class, 'show'])->name('countries.show');
    Route::put('countries/{country}', [CountriesController::class, 'update'])->name('countries.update');
    Route::delete('countries/{country}', [CountriesController::class, 'destroy'])->name('countries.destroy');

    Route::get('states', [StatesController::class, 'index'])->name('states.index');
    Route::post('states', [StatesController::class, 'store'])->name('states.store');
    Route::get('states/create', [StatesController::class, 'create'])->name('states.create');
    Route::get('states/{state}', [StatesController::class, 'show'])->name('states.show');
    Route::put('states/{state}', [StatesController::class, 'update'])->name('states.update');
    Route::delete('states/{state}', [StatesController::class, 'destroy'])->name('states.destroy');

    Route::get('cities', [CitiesController::class, 'index'])->name('cities.index');
    Route::post('cities', [CitiesController::class, 'store'])->name('cities.store');
    Route::get('cities/create', [CitiesController::class, 'create'])->name('cities.create');
    Route::get('cities/{city}', [CitiesController::class, 'show'])->name('cities.show');
    Route::put('cities/{city}', [CitiesController::class, 'update'])->name('cities.update');
    Route::delete('cities/{city}', [CitiesController::class, 'destroy'])->name('cities.destroy');

    Route::get('employees', [EmployeesController::class, 'index'])->name('employees.index');
    Route::post('employees', [EmployeesController::class, 'store'])->name('employees.store');
    Route::get('employees/create', [EmployeesController::class, 'create'])->name('employees.create');
    Route::get('employees/{employee}', [EmployeesController::class, 'show'])->name('employees.show');
    Route::put('employees/{employee}', [EmployeesController::class, 'update'])->name('employees.update');
    Route::delete('employees/{employee}', [EmployeesController::class, 'destroy'])->name('employees.destroy');

    Route::get('users', [UsersController::class, 'index'])->name('users.index');
    Route::post('users', [UsersController::class, 'store'])->name('users.store');
    Route::get('users/create', [UsersController::class, 'create'])->name('users.create');
    Route::get('users/{user}', [UsersController::class, 'show'])->name('users.show');
    Route::put('users/{user}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');
});
