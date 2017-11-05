<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class Controller extends BaseController
{
   
    use AuthenticatesUsers, AuthorizesRequests, DispatchesJobs, ValidatesRequests;

 	public function internal () {
   		return view('internal.login');
  	}
  	public function eksternal () {
   		return view('internal.login');
  	}
    // public function login () {
        // return "sudah login";
    // }
  
}
