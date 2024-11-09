<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JournalController;
use App\Http\Controllers\DaftarhdrController;
use App\Http\Controllers\AbsenController;
use App\Models\Daftarhdr;
use App\Http\Controllers\DftrshalatController;

Route::resource('dftrshalats', DftrshalatController::class);



Route::get('/pembimbingpkl', function () {
    return view('pembimbingpkl'); // pastikan ada file 'pembimbingpkl.blade.php' di resources/views
})->name('pembimbingpkl');
Route::get('/welcome', function () {
    return view('welcome'); // pastikan ada file 'welcome.blade.php' di resources/views
})->name('welcome');

Route::post('/create', [DaftarhdrController::class, 'store'])->name('create.store');
Route::resource('journals', JournalController::class);
Route::resource('daftarhdr', DaftarhdrController::class);

Route::get('/', function () {
    return view('welcome', ['title' => 'home page']);

});
