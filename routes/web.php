<?php

use App\Http\Controllers\UseraddressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pharmacy.index');
});
// ================= User Route
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');


//=============== UserAddress Routes
Route::prefix('useraddress')->group(
    function () {
        Route::get(
            '/',
            [UseraddressController::class, 'index']
        )->name('useraddress.index');
    }
);
