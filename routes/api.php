<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Specialty\SpecialtyController;
use App\Http\Controllers\Diseas\DiseasController;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Patient\PatientController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [RegisterController::class, 'register'])
    ->middleware('restrictothers');
Route::post('login', [UserController::class, 'login']);


//Specialty routers
Route::post('/specialties', [SpecialtyController::class, 'store']);
Route::get('/specialties', [SpecialtyController::class, 'index']);
Route::put('/specialties/{id}', [SpecialtyController::class, 'update']);
Route::delete('/specialties/{id}', [SpecialtyController::class, 'destroy']);
Route::get('/specialties/{id}', [SpecialtyController::class, 'show']);
Route::get('/specialties/search/{name}', [SpecialtyController::class, 'search']);

//Diseas routers
Route::post('/diseas', [DiseasController::class, 'store']);
Route::get('/diseas', [DiseasController::class, 'index']);
Route::put('/diseas/{id}', [DiseasController::class, 'update']);
Route::delete('/diseas/{id}', [DiseasController::class, 'destroy']);
Route::get('/diseas/{id}', [DiseasController::class, 'show']);
Route::get('/diseas/search/{desc}', [DiseasController::class, 'search']);

//Doctor routers
Route::post('/doctors', [DoctorController::class, 'store']);
Route::get('/doctors', [DoctorController::class, 'index']);
Route::put('/doctors/{doctor}', [DoctorController::class, 'update']);
Route::delete('/doctors/{doctor}', [DoctorController::class, 'destroy']);
Route::get('/doctors/{doctor}', [DoctorController::class, 'show']);
Route::get('/doctors/search/{desc}', [DoctorController::class, 'search']);

//Doctor routes
//Route::apiResource('/doctors', DoctorController::class);

//Patient routes
Route::apiResource('patients', PatientController::class);



Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::post('user/create', [UserController::class, 'create']);
    Route::get('user/logout', [UserController::class, 'logout']);
});
