<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JournalController;
use App\Http\Controllers\DaftarhdrController;

Route::get('/welcome', function () {
    return view('welcome'); // pastikan ada file 'welcome.blade.php' di resources/views
})->name('welcome');

Route::resource('daftarhdr', DaftarhdrController::class);


Route::resource('journals', JournalController::class);


Route::get('/', function () {
    return view('welcome', ['title' => 'home page']);

});
