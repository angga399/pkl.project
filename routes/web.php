<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\DaftarhdrController;
use App\Http\Controllers\DftrshalatController;
use App\Http\Controllers\PembimbingController;
use App\Http\Controllers\PembimbingdController;
use App\Http\Controllers\ShalatController;
// Rute utama untuk daftarhdr
Route::resource('daftarhdr', DaftarhdrController::class); // Ini sudah mencakup semua rute untuk daftarhdr

// Rute lainnya
Route::resource('dftrshalats', DftrshalatController::class);





Route::get('/pembimbingpkl', function () {
    return view('pembimbingpkl'); // pastikan ada file 'pembimbingpkl.blade.php' di resources/views
})->name('pembimbingpkl');


Route::post('/create', [DaftarhdrController::class, 'store'])->name('create.store');

Route::resource('journals', JournalController::class);

// Halaman utama
Route::get('/welcome', function () {
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



Route::get('/', [DftrshalatController::class, 'index'])->name('dftrshalats.index');
Route::get('/create', [DftrshalatController::class, 'create'])->name('dftrshalats.create');
Route::post('/store', [DftrshalatController::class, 'store'])->name('dftrshalats.store');

