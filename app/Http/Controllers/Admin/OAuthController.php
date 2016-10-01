<?php

namespace INU\Http\Controllers\Admin;

use Illuminate\Http\Request;

use INU\Http\Requests;
use INU\Http\Controllers\Controller;

class OAuthController extends Controller
{
    public function __invoke() 
    {
    	return view('admin.oauth');
    }
}
