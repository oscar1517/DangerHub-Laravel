<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ListasReproduccionController;
use App\Http\Controllers\Api\TokenController;
use App\Http\Controllers\Api\ContenidosController;
use App\Http\Controllers\Api\PerfilesController;

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

Route::get('/user', [TokenController::class, 'user'])->middleware('auth:sanctum');;
Route::post('/register', [TokenController::class, 'register']);
Route::post('/login', [TokenController::class, 'login']);
Route::post('/logout', [TokenController::class, 'logout'])->middleware('auth:sanctum');
Route::apiResource('contenidos', ContenidosController::class);
Route::post('/contenidos/{contenido}/guardar/{id_lista}', [ContenidosController::class, 'guardar'])->middleware('auth:sanctum');
Route::delete('/contenidos/{contenido}/guardar/{id_lista}', [ContenidosController::class, 'quitarGuardados'])->middleware('auth:sanctum');
Route::get('/peliculas', [ContenidosController::class, 'peliculas'])->middleware('auth:sanctum');;
Route::get('/series', [ContenidosController::class, 'series'])->middleware('auth:sanctum');;
Route::get('/documentales', [ContenidosController::class, 'documentales'])->middleware('auth:sanctum');;
Route::apiResource('ContenidosController', ListasReproduccionController::class);
Route::apiResource('perfiles', PerfilesController::class);