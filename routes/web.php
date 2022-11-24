<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PeminjamanController;
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

Route::get("login", [LoginController::class, "index"])->name("login");
Route::resource('login', LoginController::class)->only(['show', 'store', 'update']);
Route::post("logout", [LoginController::class, "logout"])->name("logout");

Route::middleware(['auth'])->group(function () {    
    Route::get('/', fn () => (redirect()->route('peminjaman.index')))->name('home');
    Route::resource('/peminjaman', PeminjamanController::class);
    Route::resource('/buku', BukuController::class);
    Route::resource('/mahasiswa', MahasiswaController::class);
});
