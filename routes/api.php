<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/login', [AuthController::class,'login'])->name('login');

Route::prefix('auth')->middleware('api')->controller(AuthController::class)->group(function () {
   Route::post('/register', 'register');
    Route::get('/user', 'user');
    Route::post('/logout', 'logout');
});
Route::get('subscribers' , [\App\Http\Controllers\SubscribersController::class , 'index']);
Route::get('subscriber-add' , [\App\Http\Controllers\SubscribersController::class , 'store']);
Route::post('newsletter' , [\App\Http\Controllers\NewsLetterController::class , 'store']);
