<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JournalController;

Route::resource('journals', JournalController::class);


Route::get('/', function () {
    return view('welcome', ['title' => 'home page']);

});
