<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;



Route::middleware('auth:sanctum')->get('/notifications', function () {
    return response()->json([
        ['message' => 'Test notification', 'type' => 'info']
    ]);
});
Route::get('/test', function() {
    return response()->json(['status' => 'success']);
});