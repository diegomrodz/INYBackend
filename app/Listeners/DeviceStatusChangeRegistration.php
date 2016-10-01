<?php

namespace INU\Listeners;

use INU\Events\DeviceStatusChanged;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use INU\DeviceStatusChange;

class DeviceStatusChangeRegistration
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  DeviceStatusChanged  $event
     * @return void
     */
    public function handle(DeviceStatusChanged $event)
    {
        $e = new DeviceStatusChange;

        $e->device_id = $event->device->id;
        $e->patient_id = $event->patient->id;
        $e->status = json_encode($event->status);

        $e->save();
    }
}
