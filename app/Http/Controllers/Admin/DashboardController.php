<?php

namespace INU\Http\Controllers\Admin;

use Illuminate\Http\Request;

use INU\Http\Requests;
use INU\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke() 
    {
    	return view('admin.dashboard');
    }
}
