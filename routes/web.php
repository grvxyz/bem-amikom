<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Public\BeritaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BeritaAcaraController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\AdminDashboardController;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/
Route::get('/', [PublicController::class, 'index'])->name('home');

Route::post('/aspirasi', [PublicController::class, 'storeAspirasi'])
    ->name('aspirasi.public.store');

/*
|--------------------------------------------------------------------------
| BERITA (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/search', [BeritaController::class, 'search'])->name('berita.search');
Route::get('/berita/{slug}', [BeritaController::class, 'detail'])->name('berita.detail');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::resource('events', EventController::class);

    Route::resource('berita_acara', BeritaAcaraController::class)
        ->except(['create', 'edit', 'show']);

    Route::get('/aspirasi', [AspirasiController::class, 'index'])->name('aspirasi.index');
    Route::post('/aspirasi', [AspirasiController::class, 'store'])->name('aspirasi.store');
    Route::put('/aspirasi/{aspirasi}', [AspirasiController::class, 'update'])->name('aspirasi.update');
    Route::delete('/aspirasi/{aspirasi}', [AspirasiController::class, 'destroy'])->name('aspirasi.destroy');
});
