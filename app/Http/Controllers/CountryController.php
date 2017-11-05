<?php

namespace App\Http\Controllers;


use DB;
use App\Countrys;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CountryController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $no = 1;
        $view = countrys::orderBy('id', 'DESC')->get();
        return view('internal.country.view', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countrys = DB::select('select max(codecountry) as idMaks from  countrys');
        foreach($countrys as $row3){}
        $nomor  = $row3->idMaks; 
        $noRand = (int) substr($row3->idMaks, 3, 3);
        $noRand++;  
        $char   = "COU";
        $no   =  $char . sprintf("%03s", $noRand);
        return view('internal.country.create', compact('no'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $country = new countrys;
        $extention = Input::file('flag')->getClientOriginalExtension();
        $filename = rand(11111,99999).'.'. $extention;
        $request->file('flag')->move(
            base_path() . '/public/upload/country/', $filename
        );
        $this->validate($request, [
             'codecountry' => 'required',
             'name' => 'required',
             'description' => 'required']);
        $country->codecountry = $request->codecountry;
        $country->name = $request->name;
        $country->flag = $filename;
        $country->description = $request->description;
        $country->status = $request->status;
        $country->save();
        \Session::flash('success', 'Country data has been successfully added!,');
        return redirect('/country');
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
        $edit = countrys::find($id);
        return view('internal.country.edit', compact('edit'));
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
        
        $country = countrys::find($id);
        $flag= Input::file('flag');
        if($flag) {     
            File::delete(public_path('/upload/country/'.$country->flag)); 
            $extention = Input::file('flag')->getClientOriginalExtension();
            $filename = rand(11111,99999).'.'. $extention;
            $request->file('flag')->move(
                base_path() . '/public/upload/country/', $filename
            );
            $this->validate($request, [
                 'name' => 'required',
                 'description' => 'required']);
            $country->name = $request->name;
            $country->flag = $filename;
            $country->description = $request->description;
            $country->status = $request->status;
            $country->save();
            \Session::flash('success', 'Country data has been edited successfully!,');
            return redirect('/country');
        } else {
            $this->validate($request, [
                 'name' => 'required',
                 'description' => 'required']);
            $country->name = $request->name;
            $country->description = $request->description;
            $country->status = $request->status;
            $country->save();
            \Session::flash('success', 'Country data has been edited successfully!,');
            return redirect('/country');
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
        $country = countrys::find($id);
        File::delete(public_path('/upload/country/'.$country->flag)); 
        $country->delete();
         \Session::flash('warning', 'Country data has been successfully deleted!,');
        return redirect('/country');
    }
}
