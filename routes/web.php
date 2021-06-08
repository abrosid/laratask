<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::any('/', function () {
    return Redirect::route('login');
});


Route::resource('users', UserController::class)->middleware(['auth', 'verified']);
Route::resource('companies', CompanyController::class)->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';

