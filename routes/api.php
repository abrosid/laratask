<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;
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

// Route::get('/companies',function(){
//     return CompanyResource::collection(Company::all());
// });
// Route::prefix('company')->group(function(){
//     Route::get('/{id}', CompanyController::class, 'index');
//     Route::post('/store', CompanyController::class, 'store');
//     Route::put('/{id}', CompanyController::class, 'update');
//     Route::delete('/{id}', CompanyController::class, 'destroy');

// });

// Route::get('/users',[UserController::class, 'index']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


