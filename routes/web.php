<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/webconfig', [App\Http\Controllers\WebConfigController::class, 'index'])->name('webconfig');
Route::post('/simpanwebconfig', [App\Http\Controllers\WebConfigController::class, 'simpanwebconfig'])->name('simpanwebconfig');

Route::get('/dataproduk', [App\Http\Controllers\ProdukController::class, 'index'])->name('dataproduk');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
