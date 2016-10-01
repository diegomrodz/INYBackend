<?php

namespace INU\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use INU\Device;
use INU\Patient;

class DeviceStatusChanged
{
    use InteractsWithSockets, SerializesModels;

    public $device;
    public $patient;
    public $status;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Device $device, Patient $patient, $status = null)
    {
        $this->device = $device;
        $this->patient = $patient;
        $this->status = $status;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel("device_panel.".$this->device->id);
    }
}
