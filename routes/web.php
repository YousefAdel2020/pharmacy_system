<?php

use App\Http\Controllers\DoctorController;
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
})->name('home');



// ================= User Route
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

// ================= Doctor Route
Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');

//=============== UserAddress Routes
Route::prefix('/useraddress')->group(
    function () {
        Route::get(
            '/',
            [UseraddressController::class, 'index']
        )->name('useraddress.index');
        Route::get(
            '/create',
            [UseraddressController::class, 'create']
        )->name('useraddress.create');
        Route::post(
            '/store',
            [UseraddressController::class, 'store']
        )->name('useraddress.store');
    }

);


Route::get('/medicine', function () {
    return view('medicine.index');
})->name('medicines.index');


Route::get('/medicine/create', function () {
    return view('medicine.create');
})->name('medicines.create');



