<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        // Ambil notifikasi user yang login dengan pagination
        $notifications = auth()->user()->notifications()->paginate(10);
        
        // Return view dengan data notifikasi
        return view('notifications.index', compact('notifications'));
    }

    public function markAsRead($notificationId)
    {
        $notification = Auth::user()->notifications()->findOrFail($notificationId);
        $notification->markAsRead();
        
        return back()->with('success', 'Notifikasi telah ditandai sebagai dibaca');
    }

    public function markAllAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
        
        return back()->with('success', 'Semua notifikasi telah ditandai sebagai dibaca');
    }
}