<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\DaftarhdrController;
use App\Http\Controllers\DftrshalatController;
use App\Http\Controllers\PembimbingController;
use App\Http\Controllers\PembimbingdController;
use App\Http\Controllers\ShalatController;

// Rute utama untuk daftarhdr
Route::resource('daftarhdr', DaftarhdrController::class);

// Rute untuk dftrshalats
Route::resource('dftrshalats', DftrshalatController::class);

// Halaman utama
Route::get('/', function () {
    return view('welcome', ['title' => 'home page']);
})->name('welcome');

// Rute untuk pembimbing
Route::get('/pembimbing', [PembimbingController::class, 'index'])->name('pembimbing.index');
Route::post('/journals/{id}/setuju', [PembimbingController::class, 'setuju'])->name('pembimbing.setuju');
Route::post('/journals/{id}/tolak', [PembimbingController::class, 'tolak'])->name('pembimbing.tolak');

// Rute untuk pembimbingd (halaman persetujuan)
Route::get('/pembimbingd/index', [PembimbingdController::class, 'index'])->name('pembimbingd.index');
Route::post('/pembimbingd/{id}/setuju', [PembimbingdController::class, 'approve'])->name('pembimbingd.approve');
Route::post('/pembimbingd/{id}/tolak', [PembimbingdController::class, 'not approve'])->name('pembimbingd.not approve');

// Rute untuk halaman pembimbingpkl
Route::get('/pembimbingpkl', function () {
    return view('pembimbingpkl'); // pastikan ada file 'pembimbingpkl.blade.php' di resources/views
})->name('pembimbingpkl');

// Rute untuk journals
Route::resource('journals', JournalController::class);

// Rute default untuk aplikasi
Route::get('/dftrshalats', [DftrshalatController::class, 'index'])->name('dftrshalats.index');
