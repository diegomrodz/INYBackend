<?php

namespace INU\Http\Controllers\Api;

use Illuminate\Http\Request;

use INU\Http\Requests;
use INU\Http\Controllers\Controller;

use INU\Events\DeviceStatusChanged;
use INU\Events\DevicePanelStatusChanged;
use INU\Events\OptionHasBeenSelected;

use INU\Device;
use INU\DeviceStatusChange;
use INU\Patient;
use INU\Panel;

use Cache;

class DevicePanelController extends Controller
{
    public function deviceChanges($deviceId, $patientId) 
    {
    	$device = Device::find($deviceId);
		$patient = Patient::find($patientId);

		$change = DeviceStatusChange::where('device_id', $deviceId)
									->where('patient_id', $patientId)
									->where('has_been_processed', false)
									->where('active', true)
									->first();

		if (is_null($change)) 
		{
			return -1;
		}

		event(new DevicePanelStatusChanged($change));

		return $change;
    }

	public function statusOf($deviceId, $patientId) 
	{
		$device = Device::find($deviceId);
		$patient = Patient::find($patientId);

		$devicePanelName = $device->panelNameFor($patient);

		if (Cache::has($devicePanelName)) 
		{
			return Cache::get($devicePanelName);
		}

		$panel = $device->startPanelFor($patient);

		Cache::put($devicePanelName, $panel, 1);

		return $panel;
	}

	public function moveToStart($deviceId, $patientId) 
	{
		$device = Device::find($deviceId);
		$patient = Patient::find($patientId);		
		
		$panel = $device->startPanelFor($patient);
		$devicePanelName = $device->panelNameFor($patient);

		Cache::put($devicePanelName, $panel, 1);

		event(new DeviceStatusChanged($device, $patient, $panel));

		return 1;
	}

	public function moveLeft($deviceId, $patientId) 
	{
		$device = Device::find($deviceId);
		$patient = Patient::find($patientId);		
		
		$status = $this->statusOf($deviceId, $patientId);

		$panel = $device->startPanelFor($patient);
		$devicePanelName = $device->panelNameFor($patient);

		if ($status["level"] == 0) {
			$panel["selectedOption"] = $panel["leftOption"];
		} else {
			$panel["selectedOption"] = $status["leftOption"];
		}

		Cache::put($devicePanelName, $panel, 1);

		event(new DeviceStatusChanged($device, $patient, $panel));
		event(new OptionHasBeenSelected($device, $patient, $panel["selectedOption"]));

		return 1;
	}

	public function moveRight($deviceId, $patientId) 
	{
		$device = Device::find($deviceId);
		$patient = Patient::find($patientId);		
		
		$status = $this->statusOf($deviceId, $patientId);

		$panel = $device->startPanelFor($patient);
		$devicePanelName = $device->panelNameFor($patient);

		if ($status["level"] == 0) {
			$panel["selectedOption"] = $panel["rightOption"];
		} else {
			$panel["selectedOption"] = $status["rightOption"];
		}

		Cache::put($devicePanelName, $panel, 1);

		event(new DeviceStatusChanged($device, $patient, $panel));
		event(new OptionHasBeenSelected($device, $patient, $panel["selectedOption"]));

		return 1;
	}

	public function moveDown($deviceId, $patientId) 
	{
		$device = Device::find($deviceId);
		$patient = Patient::find($patientId);		
		
		$status = $this->statusOf($deviceId, $patientId);

		$panel = $device->startPanelFor($patient);
		$devicePanelName = $device->panelNameFor($patient);

		if ($status["level"] == 0) {
			$panel["selectedOption"] = $panel["bottomOption"];
		} else {
			$panel["selectedOption"] = "";
		}

		Cache::put($devicePanelName, $panel, 1);

		event(new DeviceStatusChanged($device, $patient, $panel));
		event(new OptionHasBeenSelected($device, $patient, $panel["selectedOption"]));

		return 1;
	}


	public function moveUp($deviceId, $patientId) 
	{
		$device = Device::find($deviceId);
		$patient = Patient::find($patientId);		
		
		$status = $this->statusOf($deviceId, $patientId);

		$panel = $device->getNextPanelFor($patient, $status, $status["level"]);

		if ($panel == null) 
		{
			return -1;
		}

		$devicePanelName = $device->panelNameFor($patient);

		Cache::put($devicePanelName, $panel, 1);

		event(new DeviceStatusChanged($device, $patient, $panel));

		return 1;
	}

}
