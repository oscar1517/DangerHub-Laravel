<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\Api\TokenController;
=======
use App\Http\Controllers\Api\ListasReproduccionController;
use App\Http\Controllers\Api\TokenController;

>>>>>>> 88ec64faf00e4afbacf6ca786a57b1615b9439eb
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

<<<<<<< HEAD
Route::get('/user', [TokenController::class, 'user'])->middleware('auth:sanctum');
Route::post('/register', [TokenController::class, 'register']);
Route::post('/login', [TokenController::class, 'login']);
Route::post('/logout', [TokenController::class, 'logout'])->middleware('auth:sanctum');
=======
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('ListasReproduccion', ListasReproduccionController::class);
Route::get('/user', [TokenController::class, 'user']);
Route::post('/register', [TokenController::class, 'register']);
Route::post('/login', [TokenController::class, 'login']);
Route::post('/logout', [TokenController::class, 'logout']);
>>>>>>> 88ec64faf00e4afbacf6ca786a57b1615b9439eb
