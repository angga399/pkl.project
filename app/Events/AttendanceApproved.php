<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AttendanceApproved implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userId;
    public $attendanceData;

    public function __construct($userId, array $attendanceData)
    {
        $this->userId = $userId;
        $this->attendanceData = array_merge([
            'tanggal' => now()->format('Y-m-d'),
            'message' => 'Absensi disetujui'
        ], $attendanceData);
    }

    public function broadcastOn()
    {
        return new Channel('user.'.$this->userId);
    }

    public function broadcastAs()
    {
        return 'attendance.approved';
    }

    public function broadcastWith()
    {
        return [
            'type' => 'success',
            'message' => $this->attendanceData['message'],
            'data' => $this->attendanceData,
            'time' => now()->toDateTimeString()
        ];
    }
}