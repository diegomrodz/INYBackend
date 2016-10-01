<?php

namespace INU\Listeners;

use INU\Events\DevicePanelStatusChanged;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateDeviceStatusChange
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
     * @param  DevicePanelStatusChanged  $event
     * @return void
     */
    public function handle(DevicePanelStatusChanged $event)
    {
        $event->change->has_been_processed = true;
        $event->change->save();
    }
}
