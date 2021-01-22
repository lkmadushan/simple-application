<?php

use App\Http\Controllers\CountriesController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\HomeController;
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
});
