<?php

namespace INU\Http\Controllers\Admin;

use Illuminate\Http\Request;

use INU\Http\Requests;
use INU\Http\Controllers\Controller;

use INU\HomeCare;

class HomeCaresController extends Controller
{
    public function __invoke() 
    {
    	$homeCares = HomeCare::paginate(10);

    	return view('admin.home_cares')
    		   ->with('homeCares', $homeCares);
    }
}
