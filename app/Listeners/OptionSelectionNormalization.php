<?php

namespace INU\Listeners;

use INU\Events\OptionHasBeenSelected;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use INU\OptionSelection;

class OptionSelectionNormalization
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
        $waiting = OptionSelection::where('device_id', $event->device->id)
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
