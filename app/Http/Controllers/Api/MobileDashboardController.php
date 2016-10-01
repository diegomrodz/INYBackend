<?php

namespace INU\Http\Controllers\Api;

use Illuminate\Http\Request;

use Auth;

use INU\Http\Requests;
use INU\Http\Controllers\Controller;

use INU\Device;
use INU\Caretaker;
use INU\Notification;
use INU\Patient;
use INU\OptionSelection;

use INU\Events\OptionHasBeenSelected;
use INU\Events\NotificationWasCreated;

class MobileDashboardController extends Controller
{
    public function getPatients() 
    {
    	$user = Auth::guard('api')->user();
    	$caretaker = $user->caretaker();

    	$patients = $caretaker->schedulePatients();

    	return $patients;
    }

    public function getNotifications($patientId) 
    {
        $user = Auth::guard('api')->user();

        $options = OptionSelection::where('patient_id', $patientId)
                                  ->where('has_been_processed', false)
                                  ->where('active', true)
                                  ->get();

        $count = count($options);

        if ($count == 0) 
        {
            return -1;
        }

        $notifications = array();

        foreach ($options as $key => $option) 
        {
            $opt = json_decode($option->option);
            $device = Device::find($option->device_id);
            $patient = Patient::find($option->patient_id);

            $notification = new Notification;

            $notification->device_option_id = $opt->id;
            $notification->patient_id = $option->patient_id;
            $notification->caretaker_id = $user->caretaker()->id;
            $notification->device_id = $option->device_id;
            $notification->action_id = $option->action_id;

            $notification->option = $option["option"];

            $notification->save();

            event(new NotificationWasCreated($notification));

            $option->has_been_processed = true;
            $option->save();

            $notification->option = json_decode($notification->option);

            array_push($notifications, $notification);
        }

        return $notifications;
    }
}
