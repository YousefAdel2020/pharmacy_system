<?php

use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\UseraddressController;
use App\Http\Controllers\RoleController;

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
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, "store"])->name("users.store");
Route::get('/users/{user}/edit', [userController::class, "edit"])->name("users.edit");
Route::put('/users/{user}', [userController::class, "update"])->name("users.update");


// ================= Pharamacy Route
Route::get('/pharmacies', [PharmacyController::class, 'index'])->name('pharmacies.index');
Route::get('/pharmacies/create', [PharmacyController::class, 'create'])->name('pharmacies.create');
Route::get('/pharmacies/edit', [PharmacyController::class, 'edit'])->name('pharmacies.edit');
Route::put('/pharmacies/{pharmacy}', [PharmacyController::class, 'update'])->name('pharmacies.update');
Route::delete('/pharmacies/{pharmacy}', [PharmacyController::class, 'destroy'])->name('pharmacies.destroy');
Route::get('/pharmacies/restore/{pharmacies}', [PharmacyController::class, 'restore'])->name('pharmacies.restore');



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

// =================  for roles
Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    // Route::resource('users', 'UserController');
});



Auth::routes();
