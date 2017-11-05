<?php

namespace App\Http\Controllers;

use DB;
use App\Companyservices;
use App\Tagservices;
use App\Companypartnership;
use App\Services;
use App\Citys;
use App\Tagcompanyservices;
use App\Billingcompanyservices;
use App\Http\Requests;
use App\Http\Requests\CompanyservicesRequest;


use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CompanyServicesController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $no = 1;
        $view = companyservices::orderBy('id', 'DESC')->get();
        return view('internal.companyservices.view', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companyservices = DB::select('select max(codecompanyservices) as idMaks from companyservices');
        foreach($companyservices as $row3){}
        $nomor  = $row3->idMaks; 
        $noRand = (int) substr($row3->idMaks, 3, 3);
        $noRand++;  
        $char   = "COS";
        $no   =  $char . sprintf("%03s", $noRand);
        $tagservices = tagservices::where('choosetagservices', '=', 'COMPANY SERVICES')->pluck('name', 'id');
        $companypartnership = companypartnership::pluck('name', 'id');
        $services = services::pluck('name', 'id');
        $city = citys::pluck('name', 'id');
        return view('internal.companyservices.create', compact('no','tagservices','companypartnership','services','city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $companyservices = new companyservices;
        $billingcompanyservices = new billingcompanyservices;
        $this->validate($request, [            
             'name' => 'required']);
        $companyservices->name = $request->name;
        $companyservices->codecompanyservices = $request->codecompanyservices;
        $companyservices->codeservices = $request->codeservices;
        $companyservices->codecity = $request->codecity;
        $companyservices->codecompanypartnership = $request->codecompanypartnership;
        $companyservices->information = $request->information;
        $companyservices->codetagservices = $request->codetagservices;
        $companyservices->quota = $request->quota;
        $companyservices->price = $request->price;
        $companyservices->quotauser = $request->quotauser;
        $companyservices->information = $request->information;
        $companyservices->registerdate = date('Y-m-d H:i:s');
        $companyservices->status = $request->status;

        $billingcompanyservices->codecompanyservices = $request->codecompanyservices;
        $billingcompanyservices->name = $request->name;
        $billingcompanyservices->codecompanypartnership = $request->codecompanypartnership;
        $billingcompanyservices->quota = $request->quota;
        $billingcompanyservices->currentquota = $request->quota;
        $billingcompanyservices->information = $request->information;   
        $billingcompanyservices->registerdate = date('Y-m-d H:i:s');

        $companyservices->save();
        $billingcompanyservices->save();
        // $companyservices->tagservices()->attach($request->input('codetagservices'));
        \Session::flash('success', 'Company Services data has been successfully added!,');
        return redirect('/companyservices');
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
        $services = services::all();
        $city = citys::all();
        $edit = companyservices::find($id);
        $tagservices = tagservices::where('choosetagservices', '=', 'COMPANY SERVICES')->pluck('name', 'id');
        return view('internal.companyservices.edit', compact('edit','companypartnership','services','city','tagservices'));
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
        $companyservices = companyservices::find($id);
        $this->validate($request, [            
             'name' => 'required']);
        $companyservices->name = $request->name;
        $companyservices->codeservices = $request->codeservices;
        $companyservices->codetagservices = $request->codetagservices;
        $companyservices->codecity = $request->codecity;
        $companyservices->codecompanypartnership = $request->codecompanypartnership;
        $companyservices->information = $request->information;
        $companyservices->quota = $request->quota;
        $companyservices->price = $request->price;
        $companyservices->quotauser = $request->quotauser;
        $companyservices->information = $request->information;
        $companyservices->registerdate = date('Y-m-d H:i:s');
        $companyservices->status = $request->status;
        $companyservices->save();
        //    if (! is_null($request->input('tag_services'))) {
        //     $companyservices->tagservices()->sync($request->input('tag_services'));
        // }

        \Session::flash('success', 'Company Services data has been edited successfully!,');
        return redirect('/companyservices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companyservices = companyservices::find($id);
        $companyservices->delete();
         \Session::flash('warning', 'Company Services data has been successfully deleted!,');
        return redirect('/companyservices');
    }

    public function delete($codecompanyservices)
    {
        DB::table('companyservices')->where('codecompanyservices', '=', $codecompanyservices)->delete();
        DB::table('billingcompanyservices')->where('codecompanyservices', '=', $codecompanyservices)->delete();
        // $companyservices = companyservices::find($codecompanyservices);
        // $billingcompanyservices = billingcompanyservices::find($codecompanyservices);
        // $companyservices->delete();
        // $billingcompanyservices->delete();
         \Session::flash('warning', 'Company Services data has been successfully deleted!,');
        return redirect('/companyservices');
    }
}
