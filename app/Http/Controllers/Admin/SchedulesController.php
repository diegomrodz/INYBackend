<?php

namespace INU\Http\Controllers\Admin;

use Illuminate\Http\Request;

use INU\Http\Requests;
use INU\Http\Controllers\Controller;

use INU\Schedule;

class SchedulesController extends Controller
{
    public function __invoke() 
    {
    	$schedules = Schedule::paginate(10);

    	return view('admin.schedules')
    		   ->with('schedules', $schedules);
    }
}
