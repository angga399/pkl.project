<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\DaftarhdrController;
use App\Http\Controllers\DftrshalatController;
use App\Http\Controllers\PembimbingController;
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


Route::get('/pembimbing/journals', [PembimbingController::class, 'journals'])->name('pembimbing.journals');
Route::post('/pembimbing/journals/{id}/approve', [PembimbingController::class, 'approveJournal'])->name('pembimbing.setuju');
Route::post('/pembimbing/journals/{id}/reject', [PembimbingController::class, 'rejectJournal'])->name('pembimbing.tolak');

Route::get('/pembimbing/approvals', [PembimbingController::class, 'approvals'])->name('pembimbing.approvals');
Route::post('/pembimbing/approvals/{id}/approve', [PembimbingController::class, 'approvePhoto'])->name('pembimbing.approve');
Route::post('/pembimbing/approvals/{id}/reject', [PembimbingController::class, 'rejectPhoto'])->name('pembimbing.reject');






Route::get('/', [DftrshalatController::class, 'index'])->name('dftrshalats.index');
Route::get('/create', [DftrshalatController::class, 'create'])->name('dftrshalats.create');
Route::post('/store', [DftrshalatController::class, 'store'])->name('dftrshalats.store');

