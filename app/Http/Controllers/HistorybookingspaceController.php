<?php

namespace App\Http\Controllers;

use DB;
use App\Historybookingspaces;
use App\Services;
use App\Companypartnership;
use App\Billingcompanyservices;
use App\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class HistorybookingspaceController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $view = historybookingspaces::orderBy('id', 'DESC')->get();
        return view('internal.historybookingspace.view', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $companypartnership     = companypartnership::pluck('name', 'id');
        $services               = services::pluck('name', 'id');
        $billingcompanyservices = billingcompanyservices::pluck('name', 'id');
        $users                  = users::pluck('name', 'id');

        return view('internal.historybookingspace.create', compact('companypartnership','services','billingcompanyservices','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $historybookingspace = new historybookingspaces;

        $this->validate($request, [
             'name' => 'required',
             'quota' => 'required',
             'phone' => 'required']);
        $historybookingspace->codebookingspace = $request->codebookingspace;
        $historybookingspace->codecompanypartnership = $request->codecompanypartnership;
        $historybookingspace->codebilling = $request->codebilling;
        $historybookingspace->codeservices = $request->codeservices;
        $historybookingspace->codeuser = $request->codeuser;
        $historybookingspace->invoice = $request->invoice;
        $historybookingspace->name = $request->name;
        $historybookingspace->email = $request->email;
        $historybookingspace->phone = $request->phone;
        $historybookingspace->address = $request->address;
        $historybookingspace->quota = $request->quota;
        $historybookingspace->quotauser = $request->quotauser;
        $historybookingspace->price = $request->price;
        $historybookingspace->totalprice = $request->totalprice;
        $historybookingspace->datein = date('Y-m-d H:i:s');
        $historybookingspace->dateout = date('Y-m-d H:i:s');
        $historybookingspace->currentquotauser = $request->currentquotauser;
        $historybookingspace->nowquotauser = $request->nowquotauser;
        $historybookingspace->information = $request->information;
        $historybookingspace->datetime = date('Y-m-d H:i:s');
        $historybookingspace->status = $request->status;
        $historybookingspace->save();
        \Session::flash('success', 'History Booking Space data has been successfully added!,');
        return redirect('/historybookingspace');
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
        $companypartnership     = companypartnership::all();
        $services               = services::all();
        $billingcompanyservices = billingcompanyservices::all();
        $users                  = users::all();

        $edit = historybookingspaces::find($id);
        return view('internal.historybookingspace.edit', compact('edit','companypartnership','services','billingcompanyservices','users'));
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
         $historybookingspace = historybookingspaces::find($id);
            $this->validate($request, [
                'name' => 'required',
             'quota' => 'required',
             'phone' => 'required']);
       // $event->codeevent = $request->codeevent;
        $historybookingspace->codebookingspace = $request->codebookingspace;
        $historybookingspace->codecompanypartnership = $request->codecompanypartnership;
        $historybookingspace->codebilling = $request->codebilling;
        $historybookingspace->codeservices = $request->codeservices;
        $historybookingspace->codeuser = $request->codeuser;
        $historybookingspace->invoice = $request->invoice;
        $historybookingspace->name = $request->name;
        $historybookingspace->email = $request->email;
        $historybookingspace->phone = $request->phone;
        $historybookingspace->address = $request->address;
        $historybookingspace->quota = $request->quota;
        $historybookingspace->quotauser = $request->quotauser;
        $historybookingspace->price = $request->price;
        $historybookingspace->totalprice = $request->totalprice;
        $historybookingspace->datein = date('Y-m-d H:i:s');
        $historybookingspace->dateout = date('Y-m-d H:i:s');
        $historybookingspace->currentquotauser = $request->currentquotauser;
        $historybookingspace->nowquotauser = $request->nowquotauser;
        $historybookingspace->information = $request->information;
        $historybookingspace->datetime = date('Y-m-d H:i:s');
        $historybookingspace->status = $request->status;
        $historybookingspace->save();
            \Session::flash('success', 'History Booking Space data has been edited successfully!,');
            return redirect('/historybookingspace');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $historybookingspace = historybookingspaces::find($id);
        $historybookingspace->delete();
        \Session::flash('warning', 'History Booking Space data has been successfully deleted!,');
        return redirect('/historybookingspace');
    }
}
