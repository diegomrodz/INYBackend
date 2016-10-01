<?php

namespace INU\Http\Controllers\DevicePanel;

use Illuminate\Http\Request;

use INU\Http\Requests;
use INU\Http\Controllers\Controller;

use INU\Device;
use INU\Patient;

class DevicePanelController extends Controller
{
	public function getIndex($deviceId, $patientId) 
	{
		$device = Device::find($deviceId);
		$patient = Patient::find($patientId);

		return view('device-panel.index')
			   ->with('device', $device)
			   ->with('patient', $patient);
	}

	public function getCurrent($deviceId) 
	{
		$device = Device::find($deviceId);

		return redirect()->to("/device-panel/$deviceId/for/$device->current_patient_id");
	}
}
