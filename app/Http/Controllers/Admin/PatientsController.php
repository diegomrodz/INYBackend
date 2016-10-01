<?php

namespace INU\Http\Controllers\Admin;

use Illuminate\Http\Request;

use INU\Http\Requests;
use INU\Http\Controllers\Controller;

use INU\Patient;

class PatientsController extends Controller
{
    public function __invoke() 
    {
    	$patients = Patient::paginate(10);

    	return view('admin.patients')
    		   ->with('patients', $patients);
    }
}
