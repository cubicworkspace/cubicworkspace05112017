<?php

namespace App\Http\Controllers;

use DB;
use App\Users;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $no = 1;
        $view = users::orderBy('id', 'ASC')->get();
        return view('internal.user.view', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $users = DB::select('select max(codeuser) as idMaks from users');
        foreach($users as $row3){}
        $nomor  = $row3->idMaks; 
        $noRand = (int) substr($row3->idMaks, 3, 3);
        $noRand++;  
        $char   = "USR";
        $no   =  $char . sprintf("%03s", $noRand);
        return view('internal.user.create', compact('no'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new users;
        $this->validate($request, [
             'codeuser' => 'required',
             'email' => 'required']);
        $user->codeuser = $request->codeuser;
        $user->name = $request->name;
        $user->lastlogin = date('Y-m-d H:i:s');
        $user->registerdate = date('Y-m-d H:i:s');
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->save();
        \Session::flash('success', 'Users data has been successfully added!,');
        return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = users::find($id);
        return view('internal.user.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $user = users::find($id);
        $this->validate($request, [
             'email' => 'required']);
        $user->name = $request->name;
        $user->name = $request->name;
        $user->lastlogin = date('Y-m-d H:i:s');
        $user->registerdate = date('Y-m-d H:i:s');
        $user->email = $request->email;
        if( $user->password = Hash::make('password')) {
        $user->password = bcrypt($request->password);
        } else {
        $user->password = array_except($request->password);

        }
        $user->status = $request->status;
        $user->save();
        \Session::flash('success', 'Users data has been edited successfully!,');
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = users::find($id);
        $user->delete();
        \Session::flash('warning', 'Users data has been successfully deleted!,');
        return redirect('/user');
    }
}
