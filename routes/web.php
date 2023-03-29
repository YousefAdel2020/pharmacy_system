<?php

use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\UseraddressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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
    return view('index');
})->name('home');



// ================= User Route
Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/users/create', [UserController::class, 'create'])->name('user.create');


// ================= Pharamacy Route
Route::get('/pharmacies', [PharmacyController::class, 'index'])->name('pharmacies.index');


// ================= Doctor Route
Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');
Route::get('/doctors/create', [DoctorController::class, 'create'])->name('doctors.create');
Route::post('/doctors', [DoctorController::class, 'store'])->name('doctors.store');
Route::get('/doctors/{id}', [DoctorController::class, 'show'])->name('doctors.show');
Route::get('/doctors/{id}/edit', [DoctorController::class, 'edit'])->name('doctors.edit');
Route::put('/doctors/{id}', [DoctorController::class, 'update'])->name('doctors.update');
Route::delete('/doctors/{id}', [DoctorController::class, 'destroy'])->name('doctors.destroy');

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

//* ================= medcine Route
Route::get('/medicine', function () {
    return view('medicine.index');
})->name('medicines.index');


Route::get('/medicine/create', function () {
    return view('medicine.create');
})->name('medicines.create');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
