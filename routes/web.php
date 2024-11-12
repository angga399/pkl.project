<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\DaftarhdrController;
use App\Http\Controllers\DftrshalatController;
use App\Http\Controllers\PembimbingController;
use App\Http\Controllers\PembimbingdController;

// Rute utama untuk daftarhdr
Route::resource('daftarhdr', DaftarhdrController::class); // Ini sudah mencakup semua rute untuk daftarhdr

// Rute lainnya
Route::resource('dftrshalats', DftrshalatController::class);
Route::resource('journals', JournalController::class);

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
Route::post('pembimbingd/approve/{id}', [PembimbingdController::class, 'approve'])->name('pembimbingd.approve');
Route::post('pembimbingd/reject/{id}', [PembimbingdController::class, 'reject'])->name('pembimbingd.reject');
