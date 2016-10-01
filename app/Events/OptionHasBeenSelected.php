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

class OptionHasBeenSelected
{
    use InteractsWithSockets, SerializesModels;

    public $device;
    public $patient;
    public $option;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Device $device, Patient $patient, $option)
    {
        $this->device = $device;
        $this->patient = $patient;
        $this->option = $option;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('option_selected.' . $this->patient->id);
    }
}
