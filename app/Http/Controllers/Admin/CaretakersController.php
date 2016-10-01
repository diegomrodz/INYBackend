<?php

namespace INU\Http\Controllers\Admin;

use Illuminate\Http\Request;

use INU\Http\Requests;
use INU\Http\Controllers\Controller;

use INU\Caretaker;

class CaretakersController extends Controller
{
    public function __invoke() 
    {
    	$caretakers = Caretaker::paginate(10);

    	return view('admin.caretakers')
    		   ->with('caretakers', $caretakers);
    }
}
