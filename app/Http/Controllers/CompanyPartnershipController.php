<?php

namespace App\Http\Controllers;

use DB;
use App\Companypartnership;
use App\Countrys;
use App\Citys;
use App\Tagservices;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class CompanyPartnershipController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $view = companypartnership::orderBy('id', 'ASC')->get();
        return view('internal.companypartnership.view', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companypartnerships = DB::select('select max(codecompanypartnership) as idMaks from  companypartnerships');
        foreach($companypartnerships as $row3){}
        $nomor  = $row3->idMaks; 
        $noRand = (int) substr($row3->idMaks, 3, 3);
        $noRand++;  
        $char   = "COP";
        $no   =  $char . sprintf("%03s", $noRand);
        $city = citys::pluck('name', 'id');
        $country = countrys::pluck('name', 'id');
        $tagservices = tagservices::where('choosetagservices', '=', 'PARTNERSHIP')->pluck('name', 'id');
        return view('internal.companypartnership.create', compact('no','country','city','tagservices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $companypartnership = new companypartnership;
        $extention = Input::file('logo')->getClientOriginalExtension();
        $filename = rand(11111,99999).'.'. $extention;
        $request->file('logo')->move(
            base_path() . '/public/upload/companypartnership/', $filename
        );
        $extention2 = Input::file('favicon')->getClientOriginalExtension();
        $favicon = rand(11111,99999).'.'. $extention2;
        $request->file('favicon')->move(
            base_path() . '/public/upload/companypartnership/', $favicon
        );

        $this->validate($request, [            
             'name' => 'required',           
             'email' => 'required',            
             'phone' => 'required',
             'email' => 'required',]);
        $companypartnership->name = $request->name;
        $companypartnership->codecompanypartnership = $request->codecompanypartnership;
        $companypartnership->favicon = $favicon;
        $companypartnership->logo = $filename;
        $companypartnership->codetagservices = $request->codetagservices;
        $companypartnership->email = $request->email;
        $companypartnership->phone = $request->phone;
        $companypartnership->fax = $request->fax;
        $companypartnership->address = $request->address;
        $companypartnership->maps = $request->maps;
        $companypartnership->codecountry = $request->codecountry;
        $companypartnership->codecity = $request->codecity;
        $companypartnership->profile = $request->profile;
        $companypartnership->history = $request->history;
        $companypartnership->description = $request->description;
        $companypartnership->vision = $request->vision;
        $companypartnership->mision = $request->mision;
        $companypartnership->faq = $request->faq;
        $companypartnership->information = $request->information;
        $companypartnership->registerdate = date('Y-m-d H:i:s');
        $companypartnership->status = $request->status;
        $companypartnership->save();
        \Session::flash('success', 'Company Partnership data has been successfully added!,');
        return redirect('/companypartnership');
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
        
        $country = countrys::all();
        $city = citys::all();
        $edit = companypartnership::find($id);
        $tagservices = tagservices::where('choosetagservices', '=', 'PARTNERSHIP')->pluck('name', 'id');
        return view('internal.companypartnership.edit', compact('edit','country','city','tagservices'));
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
        $companypartnership = companypartnership::find($id);
        $logo = Input::file('logo');
        $favicon = Input::file('favicon');
        if($logo && $favicon) {     
            File::delete(public_path('/upload/companypartnership/'.$companypartnership->logo));  
            $extention = Input::file('logo')->getClientOriginalExtension();
            $filename = rand(11111,99999).'.'. $extention;
            $request->file('logo')->move(
                base_path() . '/public/upload/companypartnership/', $filename
            );
            File::delete(public_path('/upload/companypartnership/'.$companypartnership->favicon));  
            $extention2 = Input::file('favicon')->getClientOriginalExtension();
            $favicon = rand(11111,99999).'.'. $extention2;
            $request->file('favicon')->move(
                base_path() . '/public/upload/companypartnership/', $favicon
            );

            $this->validate($request, [            
                 'name' => 'required',           
                 'email' => 'required',            
                 'phone' => 'required',
                 'email' => 'required',]);
            $companypartnership->name = $request->name;
            $companypartnership->favicon = $favicon;
            $companypartnership->logo = $filename;
            $companypartnership->codetagservices = $request->codetagservices;
            $companypartnership->email = $request->email;
            $companypartnership->phone = $request->phone;
            $companypartnership->fax = $request->fax;
            $companypartnership->address = $request->address;
            $companypartnership->maps = $request->maps;
            $companypartnership->codecountry = $request->codecountry;
            $companypartnership->codecity = $request->codecity;
            $companypartnership->profile = $request->profile;
            $companypartnership->history = $request->history;
            $companypartnership->description = $request->description;
            $companypartnership->vision = $request->vision;
            $companypartnership->mision = $request->mision;
            $companypartnership->faq = $request->faq;
            $companypartnership->information = $request->information;
            $companypartnership->registerdate = date('Y-m-d H:i:s');
            $companypartnership->status = $request->status;
            $companypartnership->save();
            \Session::flash('success', 'Company Partnership data has been edited successfully!,');
            return redirect('/companypartnership');
        } else {

            $this->validate($request, [            
                 'name' => 'required',           
                 'email' => 'required',            
                 'phone' => 'required',
                 'email' => 'required',]);
            $companypartnership->name = $request->name;
            $companypartnership->email = $request->email;
            $companypartnership->phone = $request->phone;
            $companypartnership->codetagservices = $request->codetagservices;
            $companypartnership->fax = $request->fax;
            $companypartnership->address = $request->address;
            $companypartnership->maps = $request->maps;
            $companypartnership->codecountry = $request->codecountry;
            $companypartnership->codecity = $request->codecity;
            $companypartnership->profile = $request->profile;
            $companypartnership->history = $request->history;
            $companypartnership->description = $request->description;
            $companypartnership->vision = $request->vision;
            $companypartnership->mision = $request->mision;
            $companypartnership->faq = $request->faq;
            $companypartnership->information = $request->information;
            $companypartnership->registerdate = date('Y-m-d H:i:s');
            $companypartnership->status = $request->status;
            $companypartnership->save();
            \Session::flash('success', 'Company Partnership data has been edited successfully!,');
            return redirect('/companypartnership');
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
        $companypartnership = companypartnership::find($id);
        File::delete(public_path('/upload/companypartnership/'.$companypartnership->logo));  
        File::delete(public_path('/upload/companypartnership/'.$companypartnership->favicon));  
        $companypartnership->delete();
        \Session::flash('warning', 'Company Partnership data has been successfully deleted!,');
        return redirect('/companypartnership');
    }
}
