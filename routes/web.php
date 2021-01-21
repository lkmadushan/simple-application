<?php

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
    Route::get('departments/{department}', [DepartmentsController::class, 'show'])->name('departments.show');
    Route::post('departments', [DepartmentsController::class, 'store']);
    Route::put('departments/{department}', [DepartmentsController::class, 'update']);
    Route::delete('departments/{department}', [DepartmentsController::class, 'destroy']);
});
