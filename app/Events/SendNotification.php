<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class SendNotification implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $title;
    public $body;

    public function __construct($title, $body)
    {
        $this->title = $title;
        $this->body = $body;
    }

    public function broadcastOn()
    {
        return ['notification-channel']; // channel public
    }

    public function broadcastAs()
    {
        return 'notification.sent'; // nama event di Flutter
    }
}
