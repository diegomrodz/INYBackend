<?php

namespace INU\Listeners;

use INU\Events\OptionHasBeenSelected;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use INU\OptionSelection;

class OptionSelectionRegistration
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
     * @param  OptionHasBeenSelected  $event
     * @return void
     */
    public function handle(OptionHasBeenSelected $event)
    {
        $e = new OptionSelection;

        $e->device_id = $event->device->id;
        $e->patient_id = $event->patient->id;
        $e->option = json_encode($event->option);

        $e->save();
    }
}
