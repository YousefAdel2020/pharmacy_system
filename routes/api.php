<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\API\EmailVerificationController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;

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

Route::post("register",[AuthController::class, 'register']);
Route::post('/clients/register',[AuthController::class, 'register']);
Route::post('/sanctum/token', [AuthController::class, 'getToken']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/email/verify', [EmailVerificationController::class, 'sendVerificationEmail'])->name('verification.send');
Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify');
Route::get('email/verifyLink/{id}', [EmailVerificationController::class, 'verifyLink'])->name('verificationapi.verifyLink');

Route::group([
    "middleware"=>"auth:sanctum"
    ],function (){
    Route::put('/users/{user}',[UserController::class, 'update']);

    Route::get('/addresses', [AddressController::class, 'index']);
    Route::get('/addresses/{address}',[AddressController::class, 'show']);
    Route::put('/addresses/{address}',[AddressController::class, 'update']);
    Route::post('/addresses',[AddressController::class , 'store']);
    Route::delete('/addresses/{address}',[AddressController::class, 'destroy']);

    Route::get('/orders' , [OrderController::class , 'index']);
    Route::get('/orders/{order}' , [OrderController::class , 'show']);
    Route::post('/orders' , [OrderController::class , 'store']);
    Route::put('/orders/{order}' , [OrderController::class , 'update']);

});
