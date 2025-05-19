<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Notifications\Notification;

class StatusUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userId;
    public $message;
    public $type;

    public function __construct($userId, $message, $type = 'info')
    {
        $this->userId = $userId;
        $this->message = $message;
        $this->type = $type;

        Notification::create([
            'user_id' => $userId,
            'type' => $type,
            'message' => $message
        ]);
    }

    public function broadcastOn()
    {
        return new PrivateChannel('user.'.$this->userId);
    }

    public function broadcastAs()
    {
        return 'status.updated';
    }
}