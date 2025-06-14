<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AttendanceRejected implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userId;
    public $attendanceData;
    public $reason;
    public $message;

    public function __construct($userId, $attendanceData, $reason)
    {
        $this->userId = $userId;
        $this->attendanceData = $attendanceData;
        $this->reason = $reason;
        $this->message = "Absensi Anda pada {$attendanceData['tanggal']} ditolak";
    }

    public function broadcastOn()
    {
        return new PrivateChannel('user.' . $this->userId);
    }

    public function broadcastWith()
    {
        return [
            'message' => $this->message,
            'type' => 'error',
            'attendanceData' => $this->attendanceData,
            'reason' => $this->reason,
            'timestamp' => now()->toDateTimeString()
        ];
    }
}