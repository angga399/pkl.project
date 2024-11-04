<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JournalController;
use App\Http\Controllers\DaftarhdrController;

Route::resource('daftarhdr', DaftarhdrController::class);
Route::get('/daftarhdr', [DaftarhdrController::class, 'index'])->name('daftarhdr.index');

Route::post('/daftarhdr/store', [DaftarhdrController::class, 'store'])->name('daftarhdr.store');

Route::post('/create', [DaftarhdrController::class, 'store'])->name('create.store');






Route::get('/welcome', function () {
    return view('welcome'); // pastikan ada file 'welcome.blade.php' di resources/views
})->name('welcome');

Route::resource('daftarhdr', DaftarhdrController::class);

Route::post('/create', [DaftarhdrController::class, 'store'])->name('create.store');
Route::resource('journals', JournalController::class);


Route::get('/', function () {
    return view('welcome', ['title' => 'home page']);

});
