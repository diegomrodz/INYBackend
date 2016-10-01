<?php

namespace INU\Http\Controllers\Admin;

use Illuminate\Http\Request;

use INU\Http\Requests;
use INU\Http\Controllers\Controller;

use INU\User;

class UsersController extends Controller
{
    public function __invoke() 
    {
    	$users = User::paginate(10);

    	return view('admin.users')
    	     ->with('users', $users);
    }
}
