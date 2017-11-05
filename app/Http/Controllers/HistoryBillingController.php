<?php

namespace App\Http\Controllers;

use DB;
use App\Historybillingcompanyservices;
use App\Companyservices;
use App\Companypartnership;


use Illuminate\Http\Request;

class HistoryBillingController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $no = 1;
        $view = historybillingcompanyservices::orderBy('id', 'DESC')->get();
        return view('internal.historybilling.view', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companypartnership = companypartnership::pluck('name', 'id');
        $companyservices = companyservices::pluck('name', 'id');
        return view('internal.historybilling.create', compact('companypartnership','companyservices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $historybilling = new historybillingcompanyservices;
        $this->validate($request, [            
             'name' => 'required']);
        $historybilling->name = $request->name;
        $historybilling->codebilling = $request->codebilling;
        $historybilling->codecompanyservices = $request->codecompanyservices;
        $historybilling->codecompanypartnership = $request->codecompanypartnership;
        $historybilling->quota = $request->quota;
        $historybilling->currentquota = $request->currentquota;
        $historybilling->usedquota = $request->usedquota;
        $historybilling->currentquotauser = $request->currentquotauser;
        $historybilling->nowquotauser = $request->nowquotauser;
        $historybilling->price= $request->price;
        $historybilling->information = $request->information;
        $historybilling->datetime = date('Y-m-d H:i:s');
        $historybilling->status = $request->status;
        $historybilling->save();
        \Session::flash('success', 'History Billing Company Services data has been successfully added!,');
        return redirect('/historybilling');
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
        $companypartnership = companypartnership::all();
        $companyservices = companyservices::all();
        $edit = historybillingcompanyservices::find($id);
        return view('internal.historybilling.edit', compact('edit','companypartnership','companyservices'));
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
        
        $historybilling = historybillingcompanyservices::find($id);
        $this->validate($request, [            
             'name' => 'required']);
        $historybilling->name = $request->name;
        $historybilling->codebilling = $request->codebilling;
        $historybilling->codecompanyservices = $request->codecompanyservices;
        $historybilling->codecompanypartnership = $request->codecompanypartnership;
        $historybilling->quota = $request->quota;
        $historybilling->currentquota = $request->currentquota;
        $historybilling->usedquota = $request->usedquota;
        $historybilling->currentquotauser = $request->currentquotauser;
        $historybilling->nowquotauser = $request->nowquotauser;
        $historybilling->price= $request->price;
        $historybilling->information = $request->information;
        $historybilling->datetime = date('Y-m-d H:i:s');
        $historybilling->status = $request->status;
        $historybilling->save();
        \Session::flash('success', 'History Billing Company Services data has been edited successfully!,');
        return redirect('/historybilling');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $historybilling = historybillingcompanyservices::find($id);
        $historybilling->delete();
         \Session::flash('warning', 'History Billing Company Services data has been successfully deleted!,');
        return redirect('/historybilling');
    }
}
