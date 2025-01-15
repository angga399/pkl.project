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


Route::post('/daftarhdr/store', [DaftarhdrController::class, 'store'])->name('daftarhdr.store');

Route::resource('journals', JournalController::class);

// Halaman utama
Route::get('/', function () {
    return view('welcome', ['title' => 'home page']);
})->name('welcome');


Route::get('/pembimbing/journals', [PembimbingController::class, 'journals'])->name('pembimbing.journals');
Route::post('/pembimbing/journals/{id}/approve', [PembimbingController::class, 'setuju'])->name('pembimbing.setuju');
Route::post('/pembimbing/journals/{id}/reject', [PembimbingController::class, 'tolak'])->name('pembimbing.tolak');

Route::get('/pembimbing/approvals', [PembimbingController::class, 'approvals'])->name('pembimbing.approvals');
Route::post('/pembimbing/approvals/{id}/approve', [PembimbingController::class, 'aprove'])->name('pembimbing.aprove');
Route::post('/pembimbing/approvals/{id}/reject', [PembimbingController::class, 'reject'])->name('pembimbing.reject');


Route::get('/pembimbing/shalat', [PembimbingController::class, 'shalat'])->name('pembimbing.shalat');
Route::post('/pembimbing/shalat/{id}/approve', [PembimbingController::class, 'disetujui'])->name('pembimbing.setuju');
Route::post('/pembimbing/shalat/{id}/reject', [PembimbingController::class, 'ditolak'])->name('pembimbing.tolak');




Route::get('/Dftrshalats', [DftrshalatController::class, 'index'])->name('dftrshalats.index');
Route::get('/create', [DftrshalatController::class, 'create'])->name('dftrshalats.create');
Route::post('/store', [DftrshalatController::class, 'store'])->name('dftrshalats.store');

Route::prefix('pembimbing')->name('pembimbing.')->group(function() {
    Route::get('approvals', [PembimbingController::class, 'approvals'])->name('approvals');
    Route::post('approve/{id}', [PembimbingController::class, 'approve'])->name('approve');
    Route::post('reject/{id}', [PembimbingController::class, 'reject'])->name('reject');
});