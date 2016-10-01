<?php

namespace INU\Http\Controllers\HomeCare;

use Illuminate\Http\Request;

use INU\Http\Requests;
use INU\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    public function __invoke() 
    {
    	return view('home_care.schedule');
    }
}
