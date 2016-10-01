<?php

namespace INU\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'INU\Events\DeviceStatusChanged' => [
            'INU\Listeners\DeviceStatusChangeRegistration',
            'INU\Listeners\DeviceStatusChangeNormalization'  
        ],
        'INU\Events\OptionHasBeenSelected' => [
            'INU\Listeners\OptionSelectionRegistration',
            'INU\Listeners\OptionSelectionNormalization',
        ],
        'INU\Events\DevicePanelStatusChanged' => [
            'INU\Listeners\UpdateDeviceStatusChange'
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
