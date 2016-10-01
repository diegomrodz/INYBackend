<?php

namespace INU\Listeners;

use INU\Events\DeviceStatusChanged;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use INU\DeviceStatusChange;

class DeviceStatusChangeNormalization
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
        $waiting = DeviceStatusChange::where('device_id', $event->device->id)
                                     ->where('patient_id', $event->patient->id)
                                     ->where('has_been_processed', false)
                                     ->where('active', true)
                                     ->get();

        $count = count($waiting);

        if ($count > 1) 
        {
            foreach ($waiting as $key => $e) 
            {
                if ($key != $count - 1) 
                {
                    $e->has_been_processed = true;
                    $e->save();
                }
            }
        }
    }
}
