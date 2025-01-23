<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\DaftarhdrController;
use App\Http\Controllers\DftrshalatController;
use App\Http\Controllers\PembimbingController;

// Rute utama untuk daftarhdr
Route::resource('daftarhdr', DaftarhdrController::class);

// Rute untuk waktu shalat
Route::prefix('dftrshalats')->name('dftrshalats.')->group(function () {
    Route::get('/', [DftrshalatController::class, 'index'])->name('index');
    Route::get('/create/{type?}', [DftrshalatController::class, 'create'])->name('create');
    Route::post('/', [DftrshalatController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [DftrshalatController::class, 'edit'])->name('edit');
    Route::delete('/{id}', [DftrshalatController::class, 'destroy'])->name('destroy');
    Route::get('/arsip', [DftrshalatController::class, 'arsip'])->name('arsip');
});

// Halaman utama
Route::get('/', function () {
    return view('welcome', ['title' => 'home page']);
})->name('welcome');

// Rute untuk pembimbing
Route::prefix('pembimbing')->name('pembimbing.')->group(function () {
    // Rute untuk journals
    Route::get('journals', [PembimbingController::class, 'journals'])->name('journals');
    Route::post('journals/{id}/approve', [PembimbingController::class, 'setuju'])->name('setuju');
    Route::post('journals/{id}/reject', [PembimbingController::class, 'tolak'])->name('tolak');

    // Rute untuk approvals
    Route::get('approvals', [PembimbingController::class, 'approvals'])->name('approvals');
    Route::post('approvals/{id}/approve', [PembimbingController::class, 'approve'])->name('approve');
    Route::post('approvals/{id}/reject', [PembimbingController::class, 'reject'])->name('reject');

    // Rute untuk shalat
    Route::get('shalat', [PembimbingController::class, 'shalat'])->name('shalat');
    Route::post('shalat/{id}/approve', [PembimbingController::class, 'disetujui'])->name('disetujui');
    Route::post('shalat/{id}/reject', [PembimbingController::class, 'ditolak'])->name('ditolak');
});
