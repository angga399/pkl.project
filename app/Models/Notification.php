<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        return auth()->user()->notifications()
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get()
            ->map(function($notification) {
                return [
                    'id' => $notification->id,
                    'type' => $notification->type,
                    'message' => $notification->message,
                    'created_at' => $notification->created_at->toISOString()
                ];
            });
    }
}