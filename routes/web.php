<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\DaftarhdrController;
use App\Http\Controllers\DftrshalatController;
use App\Http\Controllers\PembimbingController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\ShalatController;




Route::get('/daftarhdr/create', [DaftarhdrController::class, 'create'])->name('daftarhdr.create');

Route::get('/histori/{daftarhdr}', [DaftarhdrController::class, 'histori'])->name('daftarhdr.histori');
Route::get('/histori-all', [DaftarhdrController::class, 'getAllHistories'])->name('daftarhdr.allHistories');
Route::get('/daftarhdr/{daftarhdr}', [DaftarhdrController::class, 'show'])->name('daftarhdr.show');

// Rute utama untuk daftarhdr
Route::resource('daftarhdr', DaftarhdrController::class);
Route::get('/guru/absen', [DaftarhdrController::class, 'showGuru'])->name('guru.absen');


// Route untuk menampilkan daftar waktu shalat
Route::get('dftrshalats', [DftrshalatController::class, 'index'])->name('dftrshalats.index');
Route::get('/guru/shalats', [DftrshalatController::class, 'showGuru'])->name('guru.shalats');

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
    return view('awal', ['title' => 'home page']);
})->name('awal');


// Route::get('guru.index', function () {
//     return view('guru.index', ['title' => 'home page']);
// })->name('gurui.ndex');

// Halaman utama
Route::get('/pembimbingpkl', function () {
    return view('pembimbingpkl', ['title' => 'home page']);
})->name('pembimbingpkl');

Route::get('/pembimbing/journals', [PembimbingController::class, 'journals'])->name('pembimbing.journals');
Route::post('/pembimbing/journals/{id}/approve', [PembimbingController::class, 'setuju'])->name('pembimbing.setuju');
Route::post('/pembimbing/journals/{id}/reject', [PembimbingController::class, 'tolak'])->name('pembimbing.tolak');

Route::get('/pembimbing/approvals', [PembimbingController::class, 'approvals'])->name('pembimbing.approvals');
Route::post('/pembimbing/approvals/{id}/approve', [PembimbingController::class, 'aprove'])->name('pembimbing.aprove');
Route::post('/pembimbing/approvals/{id}/reject', [PembimbingController::class, 'reject'])->name('pembimbing.reject');


Route::get('/pembimbing/shalat', [PembimbingController::class, 'shalat'])->name('pembimbing.shalat');
Route::post('/pembimbing/shalat/{id}/approve', [PembimbingController::class, 'disetujui'])->name('pembimbing.setuju');
Route::post('/pembimbing/shalat/{id}/reject', [PembimbingController::class, 'ditolak'])->name('pembimbing.tolak');


// Rute untuk journals (daftar utama journals)
Route::get('journals', [JournalController::class, 'index'])->name('journals.index');


Route::get('/journals/create', [JournalController::class, 'create'])->name('journals.create');
Route::post('/journals/store', [JournalController::class, 'store'])->name('journals.store');
Route::get('/journals/{id}/edit', [JournalController::class, 'edit'])->name('journals.edit');
Route::put('/journals/{id}', [JournalController::class, 'update'])->name('journals.update');
Route::delete('/journals/{id}', [JournalController::class, 'destroy'])->name('journals.destroy'); // Pastikan ini ada
Route::get('/journals', [JournalController::class, 'index'])->name('journals.index');
Route::get('guru/journal', [JournalController::class, 'showGuru'])->name('guru.journal');
Route::get('guru',[GuruController::class,'index'])->name('guru.index');



Route::get('/Dftrshalats', [DftrshalatController::class, 'index'])->name('dftrshalats.index');
Route::get('/create', [DftrshalatController::class, 'create'])->name('dftrshalats.create');
Route::post('/store', [DftrshalatController::class, 'store'])->name('dftrshalats.store');
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



Route::get('/absen-datang', function () {
    return view('daftarhdr.absen-datang'); // Halaman untuk absen datang
})->name('absen.datang');

Route::get('/absen-pulang', function () {
    return view('daftarhdr.absen-pulang'); // Halaman untuk absen pulang
})->name('absen.pulang');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);



// Menampilkan form login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

// Menangani login
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');





Route::middleware('auth')->group(function () {
    // Menampilkan halaman edit profil
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    
    // Mengupdate profil
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    
    // Menghapus akun
    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.delete');


        // Menampilkan halaman Detail Akun
        Route::get('/profile/details', [ProfileController::class, 'show'])->name('profile.details');
});

// routes/web.php
// routes/web.php

Route::get('/pembimbingpkl', function () {
    return view('pembimbingpkl'); // Ganti dengan nama view yang sesuai
})->name('pembimbingpkl');


Route::get('/', function () {
    return view('awal'); // Ganti dengan nama view yang sesuai
})->name('awal');

Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome')->middleware('auth');

Route::get('/pembimbingpkl', function () {
    return view('.pembimbingpkl');
})->name('pembimbingpkl')->middleware('auth');

Route::get('/journals/export-pdf', [JournalController::class, 'exportPdf'])->name('journals.exportPdf');
