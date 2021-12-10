<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ImmovableController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
* login
*/
Route::post('/login', [UserController::class, 'login']);


/*
* user
*/
Route::get('/user', [UserController::class, 'list']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::post('/user', [UserController::class, 'create']);
Route::put('/user', [UserController::class, 'update']);
Route::delete('/user/{id}', [UserController::class, 'delete']);

/*
* immovable
*/
Route::get('/immovable', [ImmovableController::class, 'list']);
Route::get('/immovable/{id}', [ImmovableController::class, 'show']);
Route::post('/immovable', [ImmovableController::class, 'create']);
Route::put('/immovable', [ImmovableController::class, 'update']);
Route::delete('/immovable/{id}', [ImmovableController::class, 'delete']);

/*
* type
*/
Route::get('/type', [TypeController::class, 'list']);
Route::post('/type', [TypeController::class, 'create']);
Route::delete('/type/{id}', [TypeController::class, 'delete']);

/*
* city
*/
Route::get('/city', [CityController::class, 'list']);
Route::post('/city', [CityController::class, 'create']);
Route::delete('/city/{id}', [CityController::class, 'delete']);

/*
* district
*/
Route::get('/district', [DistrictController::class, 'list']);
Route::post('/district', [DistrictController::class, 'create']);
Route::delete('/district/{id}', [DistrictController::class, 'delete']);
