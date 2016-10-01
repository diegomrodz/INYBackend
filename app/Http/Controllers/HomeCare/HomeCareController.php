<?php

namespace INU\Http\Controllers\HomeCare;

use Illuminate\Http\Request;

use INU\Http\Requests;
use INU\Http\Controllers\Controller;

class HomeCareController extends Controller
{
    public function __invoke() 
    {
    	return view('home_care.home_care');
    }
}
