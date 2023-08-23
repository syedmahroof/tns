<?php

use App\Http\Controllers\Api\HomeController;
use Illuminate\Http\Request;

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


Route::any('card_info', [HomeController::class, 'cardInfo']);


Route::controller(AuthController::class)->group(function () {
    Route::post('/login-with-otp/send', 'sendOTP');
    Route::post('/login-with-otp/verify', 'verifyOTP');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('update-profile',[ AuthController::class,'updateProfile']);
    Route::any('profile',[ AuthController::class,'profile']);
    Route::post('logout',[ AuthController::class,'logout']);

});


