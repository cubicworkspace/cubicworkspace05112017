<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberLoginController extends Controller
{
	public function __construct()
	{
		$this->middleware('gues:member');
	}
    public function showLoginForm() 
    {
    	return view('website.login');
    }

    public function login()
    {
    	return true;
    }
}
