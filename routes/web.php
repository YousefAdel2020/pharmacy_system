<?php

use App\DataTables\MedicinesDataTable;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\UseraddressController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\BanController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RevnueController;
use App\Http\Controllers\RevenuePharmController;
use App\Http\Controllers\StripePaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Area;
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
})->name('index');



// ================= User Route
Route::group(
    [
        'prefix' => 'users',
        'middleware' => ['role:admin', 'auth'],
    ],
    function () {
        Route::get(
            '/',
            [UserController::class, 'index']
        )->name('users.index');
        Route::get(
            '/create',
            [userController::class, 'create']
        )->name('users.create');
        Route::post(
            '/',
            [userController::class, 'store']
        )->name('users.store');
        Route::get(
            '/{user}/edit',
            [userController::class, "edit"]
        )->name("users.edit");
        Route::put(
            '/{user}',
            [userController::class, "update"]
        )
            ->name("users.update");
        Route::delete('/{id}', [userController::class, 'destroy'])->name('user.destroy');
    }
);

// =================  for Pharmacy ================

Route::group(['middleware' => ['role:admin|pharmacy', 'auth'],], function () {
    Route::get('/pharmacies', [PharmacyController::class, 'index'])->name('pharmacies.index');
    Route::get('/pharmacies/create', [PharmacyController::class, 'create'])->name('pharmacies.create');
    Route::post('/pharmacies', [PharmacyController::class, 'store'])->name('pharmacies.store');
    Route::get('/pharmacies/{id}', [PharmacyController::class, 'show'])->name('pharmacies.show');
    Route::get('/pharmacies/{id}/edit', [PharmacyController::class, 'edit'])->name('pharmacies.edit');
    Route::put('/pharmacies/{id}', [PharmacyController::class, 'update'])->name('pharmacies.update');
    Route::delete('/pharmacies/{id}', [PharmacyController::class, 'destroy'])->name('pharmacies.destroy')->withTrashed();
    Route::post('/pharmacies/{id}/restore', [PharmacyController::class, 'restore'])->name('pharmacies.restore')->withTrashed();
    Route::get('pharmacies/data', [PharmacyController::class, 'query'])->name('pharmacies.data');
});


// ================= Doctor Route
Route::middleware(['auth', 'role:admin|pharmacy'])->group(function () {
    Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');
    Route::get('/doctors/create', [DoctorController::class, 'create'])->name('doctors.create');
    Route::post('/doctors', [DoctorController::class, 'store'])->name('doctors.store');
    Route::get('/doctors/{id}', [DoctorController::class, 'show'])->name('doctors.show');
    Route::get('/doctors/{id}/edit', [DoctorController::class, 'edit'])->name('doctors.edit');
    Route::put('/doctors/{id}', [DoctorController::class, 'update'])->name('doctors.update');
    Route::delete('/doctors/{id}', [DoctorController::class, 'destroy'])->name('doctors.destroy');
});
Route::middleware(['auth', 'role:admin|pharmacy'])->group(function () {
    Route::post('/bans', [BanController::class, 'ban'])->name('doctors.ban');
    Route::post('/unbans', [BanController::class, 'unban'])->name('doctors.unban');
});
//=============== UserAddress Routes
Route::prefix('/user-address')->group(
    function () {
        Route::get(
            '/',
            [UseraddressController::class, 'index']
        )->name('user-address.index');
        Route::get(
            '/create',
            [UseraddressController::class, 'create']
        )->name('user-address.create');
        Route::get(
            '/{id}',
            [UseraddressController::class, 'show']
        )->name('user-address.show');
        Route::post(
            '/store',
            [UseraddressController::class, 'store']
        )->name('user-address.store');
        Route::get('/{id}/edit', [UseraddressController::class, 'edit'])->name('user-address.edit');
        Route::put('/{id}', [UseraddressController::class, 'update'])->name('user-address.update');
        Route::delete('/{id}', [UseraddressController::class, 'destroy'])->name('user-address.destroy');
    }
);

//* ================= medicine Route
Route::get('/medicines', [MedicineController::class, 'index'])->name('medicines.index');
Route::post('/medicines', [MedicineController::class, 'store'])->name('medicines.store');
Route::get('/medicines/create', [MedicineController::class, 'create'])->name('medicines.create');
Route::get('/medicines/{id}', [MedicineController::class, 'show'])->name('medicines.show');
Route::get('/medicines/{id}/edit', [MedicineController::class, 'edit'])->name('medicines.edit');

Route::put('/medicines/{id}', [MedicineController::class, 'update'])->name('medicines.update');
Route::delete('/medicines/{id}', [MedicineController::class, 'destroy'])->name('medicines.destroy');

Route::get('medicines/data', [MedicinesDataTable::class, 'query'])->name('medicines.data');


// =================  for roles
Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    // Route::resource('users', 'UserController');
});

// =================  for Areas ================
Route::group(
    ['middleware' => ['auth',  'permission:area-all']],
    function () {
        Route::resource('areas', AreaController::class);
    }
);
// ajax
Route::get('countries/{id}/fetch-areas', [AreaController::class, 'fetchArea']);

// =================  for Order ================
Route::group(
    [
        'prefix' => 'orders',
        'middleware' => ['role:admin|pharmacy|doctor', 'auth'],
    ],
    function () {
        Route::get('/', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/create', [OrderController::class, 'create'])->name('orders.create');
        Route::post('/', [OrderController::class, 'store'])->name('orders.store');
        Route::get('/{order}', [OrderController::class, 'show'])->name('orders.show');
        Route::get('/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
        Route::put('/{order}', [OrderController::class, 'update'])->name('orders.update');
        Route::delete('/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
        Route::put('/{id}/assign', [OrderController::class, 'assignOrderToPharmacy']);

        Route::get('/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
        Route::get('/{order}/confirm', [OrderController::class, 'confirm'])->name('orders.confirm');
    }
);

//=================== for revenue ==============
Route::group(['middleware' => ['auth']], function () {
    Route::get('/revenue', [RevnueController::class, 'index'])->name('revenues.index');
    Route::delete('/revenue', [RevnueController::class, 'destroy'])->name('revenues.destroy');
    Route::get('/revenuePer', [RevenuePharmController::class, 'index'])->name('revenuePerPharmacy.index');
});


//=================== for stripe payment ==============
Route::controller(StripePaymentController::class)->group(function () {
    Route::get('stripe/{order}', 'stripe')->name("stripe.confirm");
    Route::post('stripe/{order}', 'stripePost')->name('stripe.post');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
