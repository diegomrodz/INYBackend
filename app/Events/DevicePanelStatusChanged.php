<?php

namespace INU\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use INU\DeviceStatusChange;

class DevicePanelStatusChanged
{
    use InteractsWithSockets, SerializesModels;

    public $change;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(DeviceStatusChange $change)
    {
        $this->change = $change;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
