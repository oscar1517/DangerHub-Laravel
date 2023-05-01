<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\MailController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\ContenidosController;

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







Route::get('/', function (Request $request) {
   $message = 'Loading welcome page';
   Log::info($message);
   $request->session()->flash('info', $message);
   return view('welcome');
});

Auth::routes();
require __DIR__.'/email-verify.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('mail/test', [MailController::class, 'test']);


Route::resource('contenidos', ContenidosController::class);