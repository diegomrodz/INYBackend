<?php

namespace INU\Http\Controllers\Admin;

use Illuminate\Http\Request;

use INU\Http\Requests;
use INU\Http\Controllers\Controller;

use INU\Device;

class DevicesController extends Controller
{
    public function __invoke() 
    {
    	$devices = Device::paginate(10);

    	return view('admin.devices')
    		 ->with('devices', $devices);
    }
}
