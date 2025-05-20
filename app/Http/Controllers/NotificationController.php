<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Notification;

class NotificationController extends Controller
{
    public function index(Request $request)
    {

          return response()->json([
            ['id' => 1, 'type' => 'success', 'message' => 'Notifikasi contoh', 'created_at' => now()],
            ['id' => 2, 'type' => 'info', 'message' => 'Contoh notifikasi kedua', 'created_at' => now()]
        ]);
        // Pastikan user terautentikasi
        if (!$request->user()) {
            return response()->json([], 401);
        }

        $notifications = $request->user()->notifications()
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return response()->json($notifications);
    }
}