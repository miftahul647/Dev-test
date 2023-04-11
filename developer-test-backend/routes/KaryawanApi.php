<?php

use App\Http\Controllers\KaryawanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [KaryawanController::class, 'index']);
Route::get('/{id}', [KaryawanController::class, 'show']);
Route::put('/',[KaryawanController::class, 'store']);
Route::delete('/{id}', [KaryawanController::class, 'destroy']);
Route::put('/{id}', [KaryawanController::class, 'update']);
Route::get('/search-query/{query}', [KaryawanController::class, 'searchQuery']);
Route::get('/recover-karyawan/{id}', [KaryawanController::class, 'recover']);
