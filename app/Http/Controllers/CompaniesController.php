<?php

namespace App\Http\Controllers;

use DB;
use App\Companies;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $no = 1;
        $view = companies::orderBy('id', 'DESC')->get();
        return view('internal.companies.view', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('internal.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $companies = new companies;
        $extention = Input::file('logo')->getClientOriginalExtension();
        $filename = rand(11111,99999).'.'. $extention;
        $request->file('logo')->move(
            base_path() . '/public/upload/companies/', $filename
        );
        $extention2 = Input::file('favicon')->getClientOriginalExtension();
        $favicon = rand(11111,99999).'.'. $extention2;
        $request->file('favicon')->move(
            base_path() . '/public/upload/companies/', $favicon
        );

        $this->validate($request, [            
             'name' => 'required',           
             'email' => 'required',            
             'phone' => 'required',
             'email' => 'required',]);
        $companies->name = $request->name;
        if(! is_null($favicon)) { $companies->favicon = $favicon; }
        if(! is_null($filename)){ $companies->logo = $filename; }
        $companies->email = $request->email;
        $companies->phone = $request->phone;
        $companies->fax = $request->fax;
        $companies->address = $request->address;
        $companies->maps = $request->maps;
        $companies->profile = $request->profile;
        $companies->history = $request->history;
        $companies->description = $request->description;
        $companies->vision = $request->vision;
        $companies->mision = $request->mision;
        $companies->registerdate = date('Y-m-d H:i:s');
        $companies->status = $request->status;
        $companies->save();
        \Session::flash('success', 'Companies data has been successfully added!,');
        return redirect('/companies');
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
        $edit = companies::find($id);
        return view('internal.companies.edit', compact('edit'));
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
        $companies = companies::find($id);
        $logo = Input::file('logo');
        $favicon = Input::file('favicon');
        if($logo) {     
                File::delete(public_path('/upload/companies/'.$companies->logo)); 
                $extention = Input::file('logo')->getClientOriginalExtension();
                $filename =  date('YmdHis'). ".$extention";
                $request->file('logo')->move(
                    base_path() . '/public/upload/companies/', $filename
                );

                $this->validate($request, [            
                     'name' => 'required',           
                     'email' => 'required',            
                     'phone' => 'required',
                     'email' => 'required',]);
                $companies->name = $request->name;
                $companies->logo = $filename;
                $companies->email = $request->email;
                $companies->phone = $request->phone;
                $companies->fax = $request->fax;
                $companies->address = $request->address;
                $companies->maps = $request->maps;
                $companies->profile = $request->profile;
                $companies->history = $request->history;
                $companies->description = $request->description;
                $companies->vision = $request->vision;
                $companies->mision = $request->mision;
                $companies->faq     = $request->faq;
                $companies->registerdate = date('Y-m-d H:i:s');
                $companies->status = $request->status;
                $companies->save();
                \Session::flash('success', 'Companies data has been edited successfully!,');
                return redirect('/companies/1/edit');
        } elseif($favicon) {
                File::delete(public_path('/upload/companies/'.$companies->favicon)); 
                $extention2 = Input::file('favicon')->getClientOriginalExtension();
                $favicon = rand(11111,99999).'.'. $extention2;
                $request->file('favicon')->move(
                    base_path() . '/public/upload/companies/', $favicon
                );

                $this->validate($request, [            
                     'name' => 'required',           
                     'email' => 'required',            
                     'phone' => 'required',
                     'email' => 'required',]);
                $companies->name = $request->name;
                $companies->favicon = $favicon;
                $companies->email = $request->email;
                $companies->phone = $request->phone;
                $companies->fax = $request->fax;
                $companies->address = $request->address;
                $companies->maps = $request->maps;
                $companies->profile = $request->profile;
                $companies->history = $request->history;
                $companies->description = $request->description;
                $companies->vision = $request->vision;
                $companies->mision = $request->mision;
                $companies->faq     = $request->faq;
                $companies->registerdate = date('Y-m-d H:i:s');
                $companies->status = $request->status;
                $companies->save();
                \Session::flash('success', 'Companies data has been edited successfully!,');
                return redirect('/companies/1/edit');
        }else {
                $this->validate($request, [            
                     'name' => 'required',           
                     'email' => 'required',            
                     'phone' => 'required',
                     'email' => 'required',]);
                $companies->name = $request->name;
                $companies->email = $request->email;
                $companies->phone = $request->phone;
                $companies->fax = $request->fax;
                $companies->address = $request->address;
                $companies->maps = $request->maps;
                $companies->profile = $request->profile;
                $companies->history = $request->history;
                $companies->description = $request->description;
                $companies->vision = $request->vision;
                $companies->mision = $request->mision;
                $companies->faq     = $request->faq;
                $companies->registerdate = date('Y-m-d H:i:s');
                $companies->status = $request->status;
                $companies->save();
                \Session::flash('success', 'Companies data has been edited successfully!,');
                return redirect('/companies/1/edit');
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
        $companies = companies::find($id);
        $companies->delete();
        \Session::flash('warning', 'Companies data has been successfully deleted!,');
        return redirect('/companies');
    }
}
