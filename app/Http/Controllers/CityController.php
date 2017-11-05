<?php

namespace App\Http\Controllers;

use DB;
use App\Citys;
use App\Countrys;

use Illuminate\Http\Request;

class CityController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $no = 1;
        $view = citys::orderBy('id', 'DESC')->get();
        return view('internal.city.view', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $citys = DB::select('select max(codecity) as idMaks from  citys');
        foreach($citys as $row3){}
        $nomor  = $row3->idMaks; 
        $noRand = (int) substr($row3->idMaks, 3, 3);
        $noRand++;  
        $char   = "CIT";
        $no   =  $char . sprintf("%03s", $noRand);
        $country = countrys::pluck('name', 'id');
        return view('internal.city.create', compact('no','country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $city = new citys;
        $this->validate($request, [
             'name' => 'required',
             'description' => 'required']);
        $city->codecity = $request->codecity;
        $city->codecountry = $request->codecountry;
        $city->name = $request->name;
        $city->description = $request->description;
        $city->status = $request->status;
        $city->save();
        \Session::flash('success', 'City data has been successfully added!,');
        return redirect('/city');
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
        $edit = citys::find($id);
        return view('internal.city.edit', compact('edit','country'));
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
        
         $city = citys::find($id);
        $this->validate($request, [
             'name' => 'required',
             'description' => 'required']);
        $city->codecountry = $request->codecountry;
        $city->name = $request->name;
        $city->description = $request->description;
        $city->status = $request->status;
        $city->save();
        \Session::flash('success', 'City data has been edited successfully!,');
        return redirect('/city');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = citys::find($id);
        $city->delete();
         \Session::flash('warning', 'City data has been successfully deleted!,');
        return redirect('/city');
    }
}
