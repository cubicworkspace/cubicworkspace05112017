<?php

namespace App\Http\Controllers;

use DB;
use App\Billingcompanyservices;
use App\Companyservices;
use App\Companypartnership;

use Illuminate\Http\Request;

class BillingCompanyServicesController extends Controller
{    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $no = 1;
        $view = billingcompanyservices::orderBy('id', 'DESC')->get();
        return view('internal.billingcompanyservices.view', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $billingcompanyservices = DB::select('select max(codebilling) as idMaks from billingcompanyservices');
        foreach($billingcompanyservices as $row3){}
        $nomor  = $row3->idMaks; 
        $noRand = (int) substr($row3->idMaks, 3, 3);
        $noRand++;  
        $char   = "BIL";
        $no   =  $char . sprintf("%03s", $noRand);
        $companypartnership = companypartnership::pluck('name', 'id');
        $companyservices = companyservices::pluck('name', 'id');
        return view('internal.billingcompanyservices.create', compact('no','companypartnership','companyservices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $billingcompanyservices = new billingcompanyservices;
        $this->validate($request, [            
             'name' => 'required']);
        $billingcompanyservices->name = $request->name;
        $billingcompanyservices->codebilling = $request->codebilling;
        $billingcompanyservices->codecompanyservices = $request->codecompanyservices;
        $billingcompanyservices->codecompanypartnership = $request->codecompanypartnership;
        $billingcompanyservices->quota = $request->quota;
        $billingcompanyservices->currentquota = $request->currentquota;
        $billingcompanyservices->usedquota = $request->usedquota;
        $billingcompanyservices->currentquotauser = $request->currentquotauser;
        $billingcompanyservices->nowquotauser = $request->nowquotauser;
        $billingcompanyservices->information = $request->information;
        $billingcompanyservices->registerdate = date('Y-m-d H:i:s');
        $billingcompanyservices->status = $request->status;
        $billingcompanyservices->save();
        \Session::flash('success', 'Billing Company Services data has been successfully added!,');
        return redirect('/billingcompanyservices');
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
        $companypartnership = companypartnership::all();
        $companyservices = companyservices::all();
        $edit = billingcompanyservices::find($id);
        return view('internal.billingcompanyservices.edit', compact('edit','companypartnership','companyservices'));
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
        $billingcompanyservices = billingcompanyservices::find($id);
        $this->validate($request, [            
             'name' => 'required']);
        $billingcompanyservices->name = $request->name;
        $billingcompanyservices->codecompanyservices = $request->codecompanyservices;
        $billingcompanyservices->codecompanypartnership = $request->codecompanypartnership;
        $billingcompanyservices->quota = $request->quota;
        $billingcompanyservices->currentquota = $request->currentquota;
        $billingcompanyservices->usedquota = $request->usedquota;
        $billingcompanyservices->currentquotauser = $request->currentquotauser;
        $billingcompanyservices->nowquotauser = $request->nowquotauser;
        $billingcompanyservices->information = $request->information;
        $billingcompanyservices->registerdate = date('Y-m-d H:i:s');
        $billingcompanyservices->status = $request->status;
        $billingcompanyservices->save();
        \Session::flash('success', 'Billing Company Services data has been edited successfully!,');
        return redirect('/billingcompanyservices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $billingcompanyservices = billingcompanyservices::find($id);
        $billingcompanyservices->delete();
         \Session::flash('warning', 'Billing Company Services data has been successfully deleted!,');
        return redirect('/billingcompanyservices');
    }
}
