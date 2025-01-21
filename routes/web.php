<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\DaftarhdrController;
use App\Http\Controllers\DftrshalatController;
use App\Http\Controllers\PembimbingController;
use App\Http\Controllers\ShalatController;

// Rute utama untuk daftarhdr
Route::resource('daftarhdr', DaftarhdrController::class);

// Route untuk menampilkan daftar waktu shalat
Route::get('dftrshalats', [DftrshalatController::class, 'index'])->name('dftrshalats.index');

// Route untuk menampilkan form create berdasarkan tipe waktu shalat
Route::get('dftrshalats/create/{type?}', [DftrshalatController::class, 'create'])->name('dftrshalats.create');

// Route untuk menyimpan data waktu shalat
Route::post('dftrshalats', [DftrshalatController::class, 'store'])->name('dftrshalats.store');

// Rute untuk mengedit data waktu shalat
Route::get('dftrshalats/{id}/edit', [DftrshalatController::class, 'edit'])->name('dftrshalats.edit');

// Rute untuk menghapus data waktu shalat
Route::delete('dftrshalats/{id}', [DftrshalatController::class, 'destroy'])->name('dftrshalats.destroy');

// Rute untuk melihat arsip waktu shalat
Route::get('/dftrshalats/arsip', [DftrshalatController::class, 'arsip'])->name('dftrshalats.arsip');

// Halaman utama
Route::get('/', function () {
    return view('welcome', ['title' => 'home page']);
})->name('welcome');

// Rute resource untuk journals
Route::resource('journals', JournalController::class);

// Rute pembimbingpkl
Route::get('/pembimbingpkl', function () {
    return view('pembimbingpkl');
})->name('pembimbingpkl');

// Pembimbing routes
Route::prefix('pembimbing')->name('pembimbing.')->group(function() {
    Route::get('journals', [PembimbingController::class, 'journals'])->name('journals');
    Route::post('journals/{id}/approve', [PembimbingController::class, 'setuju'])->name('setuju');
    Route::post('journals/{id}/reject', [PembimbingController::class, 'tolak'])->name('tolak');

    Route::get('approvals', [PembimbingController::class, 'approvals'])->name('approvals');
    Route::post('approvals/{id}/approve', [PembimbingController::class, 'approve'])->name('approve');
    Route::post('approvals/{id}/reject', [PembimbingController::class, 'reject'])->name('reject');

    Route::get('shalat', [PembimbingController::class, 'shalat'])->name('shalat');
    Route::post('shalat/{id}/approve', [PembimbingController::class, 'disetujui'])->name('disetujui');
    Route::post('shalat/{id}/reject', [PembimbingController::class, 'ditolak'])->name('ditolak');
});
