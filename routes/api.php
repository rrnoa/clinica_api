<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Especiality\EspecialtyController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Especialty;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/especialties', [EspecialtyController::class, 'index']);

Route::post('register', [RegisterController::class, 'register'])
    ->middleware('restrictothers');
Route::post('login', [UserController::class, 'login']);

//Route::resource('especialties',EspecialtyController::class);
Route::get('/especialties/search/{name}', [EspecialtyController::class, 'search']);

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::post('/especialties', [EspecialtyController::class, 'store']);
    Route::post('user/create', [UserController::class, 'create']);
    Route::get('user/logout', [UserController::class, 'logout']);
});
