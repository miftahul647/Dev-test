<?php

use App\Http\Controllers\KaryawanRouteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
Route::middleware(['isGuest'])->group(function() {
    Route::get('/', [UserController::class, 'loginPage'])->name('guest.login');
    Route::get('/sign-up', [UserController::class, 'registerPage'])->name('guest.register');
    Route::post('/',[UserController::class, 'login'])->name('guest.login.method');
    Route::post('/sign-up',[UserController::class, 'register'])->name('guest.register.method');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [KaryawanRouteController::class, 'index'])->name('user.dashboard');
    Route::get('/insert-karyawan', [KaryawanRouteController::class, 'create'])->name('user.insert');
    Route::post('/insert-karyawan', [KaryawanRouteController::class, 'store'])->name('user.store');
    Route::get('/delete-karyawan/{id}',[KaryawanRouteController::class, 'destroy'])->name('user.destroy');
    Route::get('/karyawan-detail/{id}', [KaryawanRouteController::class, 'show'])->name('user.detail');
    Route::post('/karyawan-detail/{id}', [KaryawanRouteController::class, 'update'])->name('user.update');
    Route::post('/search', [KaryawanRouteController::class, 'searchQuery'])->name('user.search');
    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::get('/recover/{id}', [KaryawanRouteController::class, 'recover'])->name('user.recover');
});
