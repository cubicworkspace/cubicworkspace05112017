<?php

namespace App\Http\Controllers;

use App\users;
use App\companyservices;
use App\companypartnership;
use App\messages;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('nocache');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count_companyservices      = companyservices::count();
        $count_companypartnership   = companypartnership::count();
        $count_users                = users::count();
        $count_messages             = messages::count();
        return view('internal.dashboard', compact('count_companyservices','count_companypartnership','count_users','count_messages'));
    }
}
