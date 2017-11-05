<?php

namespace App\Http\Controllers;

use DB;
use App\Admins;
use App\Users;
use App\Categoryadmins;
use App\Http\Requests\AdminsRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    //     $this->middleware('admin');
    // }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $view = Admins::orderBy('id', 'DESC')->get();
        return view('internal.admin.view', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admins = DB::select('select max(codeadmin) as idMaks from admins');
        foreach($admins as $row3){}
        $nomor  = $row3->idMaks; 
        $noRand = (int) substr($row3->idMaks, 3, 3);
        $noRand++;  
        $char   = "ADM";
        $no   =  $char . sprintf("%03s", $noRand);
        $user = users::pluck('name', 'id');
        $categoryadmin = categoryadmins::pluck('name', 'id');
        return view('internal.admin.create', compact('no','user','categoryadmin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin = new admins;
        $extention = Input::file('image')->getClientOriginalExtension();
        $filename =  date('YmdHis'). ".$extention";
        $request->file('image')->move(
            base_path() . '/public/upload/admin/', $filename
        );

        $this->validate($request, [
             'codecategoryadmin' => 'required',
             'codeadmin' => 'required',
             'phone' => 'required']);
        $admin->codecategoryadmin = $request->codecategoryadmin;
        $admin->codeadmin = $request->codeadmin;
        $admin->phone = $request->phone;
        $admin->codeuser = $request->codeuser;
        $admin->image = $filename;
        $admin->status = $request->status;
        $admin->save();
        \Session::flash('success', 'Admin data has been successfully added!,');
        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = users::all();
        $categoryadmin = categoryadmins::all();
        $edit = admins::find($id);
        return view('internal.admin.edit', compact('edit','user','categoryadmin'));
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
        $admin = admins::find($id);
        $image = Input::file('image');
        if($image) {     
            File::delete(public_path('/upload/admin/'.$admin->image));
            $extention = Input::file('image')->getClientOriginalExtension();
            $filename =  date('YmdHis'). ".$extention";
            $request->file('image')->move(
                base_path() . '/public/upload/admin/', $filename
            );

            $this->validate($request, [
                 'codecategoryadmin' => 'required',
                 'phone' => 'required']);
            $admin->codecategoryadmin = $request->codecategoryadmin;
            $admin->phone = $request->phone;
            $admin->codeuser = $request->codeuser;
            $admin->image = $filename;
            $admin->status = $request->status;
            $admin->save();
            \Session::flash('success', 'Admin data has been edited successfully!,');
            return redirect('/admin');
        } else {
            $admin = admins::find($id);
            $this->validate($request, [
                 'codecategoryadmin' => 'required',
                 'phone' => 'required']);
            $admin->codecategoryadmin = $request->codecategoryadmin;
            $admin->phone = $request->phone;
            $admin->codeuser = $request->codeuser;
            $admin->status = $request->status;
            $admin->save();
            \Session::flash('success', 'Admin data has been edited successfully!,');
            return redirect('/admin');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {       
        $admin = admins::find($id);
        File::delete(public_path('/upload/admin/'.$admin->image));
        $admin->delete();
        \Session::flash('warning', 'Admin data has been successfully deleted!,');
        return redirect('/admin');
    }


}
