<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\NotificationController;




Route::middleware('auth:sanctum')->get('/notifications', function (Request $request) {
    return response()->json([
        'notifications' => DB::table('notifications')
            ->where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->get()
    ]);
});

