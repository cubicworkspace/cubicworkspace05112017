<?php

namespace App\Http\Controllers;

use DB;
use App\Adminspartnerships;
use App\Companypartnership;
use App\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminPartnershipController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $view = adminspartnerships::orderBy('id', 'DESC')->get();
        return view('internal.adminpartnership.view', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = users::pluck('name', 'id');
         $companypartnership = companypartnership::pluck('name', 'id');
        return view('internal.adminpartnership.create', compact('no','user','companypartnership'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $adminpartnership = new adminspartnerships;
        $extention = Input::file('image')->getClientOriginalExtension();
        $filename =  date('YmdHis'). ".$extention";
        $request->file('image')->move(
            base_path() . '/public/upload/adminpartnership/', $filename
        );

        $this->validate($request, [
             'codecompanypartnership' => 'required',
             'phone' => 'required',
             'codeuser' => 'required',
             'address' => 'required']);
        $adminpartnership->codecompanypartnership = $request->codecompanypartnership;
        $adminpartnership->phone = $request->phone;
        $adminpartnership->address = $request->address;
        $adminpartnership->codeuser = $request->codeuser;
        $adminpartnership->image = $filename;
        $adminpartnership->status = $request->status;
        $adminpartnership->save();
        \Session::flash('success', 'Admin Partnership data has been successfully added!,');
        return redirect('/adminpartnership');
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
        $companypartnership = companypartnership::all();
        $edit = adminspartnerships::find($id);
        return view('internal.adminpartnership.edit', compact('edit','user','companypartnership'));
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
       $adminpartnership = adminspartnerships::find($id);
        $image = Input::file('image');
        if($image) {     
            File::delete(public_path('/upload/adminpartnership/'.$adminpartnership->image)); 
            $extention = Input::file('image')->getClientOriginalExtension();  
            $filename =  date('YmdHis'). ".$extention";
            $request->file('image')->move(
                base_path() . '/public/upload/adminpartnership/', $filename
            );
                $this->validate($request, [
                     'codecompanypartnership' => 'required',
                     'phone' => 'required',
                     'codeuser' => 'required',
                     'address' => 'required']);
                $adminpartnership->codecompanypartnership = $request->codecompanypartnership;
                $adminpartnership->phone = $request->phone;
                $adminpartnership->address = $request->address;
                $adminpartnership->codeuser = $request->codeuser;
                $adminpartnership->image = $filename;
                $adminpartnership->status = $request->status;
                $adminpartnership->save();
                \Session::flash('success', 'Admin Partnership data has been edited successfully!,');
                return redirect('/adminpartnership');
        } else {

            $adminpartnership = adminspartnerships::find($id);
                $image = Input::file('image');
                $this->validate($request, [
                     'codecompanypartnership' => 'required',
                     'phone' => 'required',
                     'codeuser' => 'required',
                     'address' => 'required']);
                $adminpartnership->codecompanypartnership = $request->codecompanypartnership;
                $adminpartnership->phone = $request->phone;
                $adminpartnership->address = $request->address;
                $adminpartnership->codeuser = $request->codeuser;
                $adminpartnership->status = $request->status;
                $adminpartnership->save();
                \Session::flash('success', 'Admin Partnership data has been edited successfully!,');
                return redirect('/adminpartnership');
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
        $adminpartnership = adminspartnerships::find($id);
        File::delete(public_path('/upload/adminpartnership/'.$adminpartnership->image));
        $adminpartnership->delete();
         \Session::flash('warning', 'Admin Partnership data has been successfully deleted!,');
        return redirect('/adminpartnership');
    }
}
