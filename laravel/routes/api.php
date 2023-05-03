<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ListasReproduccionController;
use App\Http\Controllers\Api\TokenController;
use App\Http\Controllers\Api\ContenidosController;

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

Route::apiResource('ListasReproduccion', ListasReproduccionController::class);
Route::get('/user', [TokenController::class, 'user'])->middleware('auth:sanctum');;
Route::post('/register', [TokenController::class, 'register']);
Route::post('/login', [TokenController::class, 'login']);
Route::post('/logout', [TokenController::class, 'logout'])->middleware('auth:sanctum');
Route::apiResource('contenidos', ContenidosController::class);
Route::post('/contenidos/{contenido}/guardar', [ContenidosController::class, 'guardar']);
Route::delete('/contenidos/{contenido}/guardar', [ContenidosController::class, 'quitarGuardados']);