<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;




// routes/api.php
Route::middleware('auth:sanctum')->group(function() {
    Route::get('/notifications', function() {
        return auth()->user()->unreadNotifications()->limit(10)->get()->map(function($notification) {
            return [
                'id' => $notification->id,
                'data' => $notification->data,
                'created_at' => $notification->created_at->toDateTimeString(),
                'read_at' => $notification->read_at
            ];
        });
    });
    
    Route::post('/notifications/mark-as-read', function() {
        auth()->user()->unreadNotifications->markAsRead();
        return response()->json(['success' => true]);
    });
});