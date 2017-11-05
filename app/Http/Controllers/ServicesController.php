<?php

namespace App\Http\Controllers;

use DB;
use App\Services;
use App\Categoryservices;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $view = services::orderBy('id', 'DESC')->get();
        return view('internal.services.view', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = DB::select('select max(codeservices) as idMaks from services');
        foreach($services as $row3){}
        $nomor  = $row3->idMaks; 
        $noRand = (int) substr($row3->idMaks, 3, 3);
        $noRand++;  
        $char   = "SER";
        $no   =  $char . sprintf("%03s", $noRand);
        $categoryservices = categoryservices::pluck('name', 'id');
        return view('internal.services.create', compact('no','categoryservices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $services = new services;
        $this->validate($request, [
             'name' => 'required',
             'description' => 'required']);
        $services->codeservices = $request->codeservices;
        $services->codecategoryservices = $request->codecategoryservices;
        $services->name = $request->name;
        $services->description = $request->description;
        $services->status = $request->status;
        $services->save();
        \Session::flash('success', 'Services data has been successfully added!,');
        return redirect('/services');
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
        $categoryservices = categoryservices::all();
        $edit = services::find($id);
        return view('internal.services.edit', compact('edit','categoryservices'));
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
         $services = services::find($id);
        $this->validate($request, [
             'name' => 'required',
             'description' => 'required']);
        $services->name = $request->name;
        $services->description = $request->description;
        $services->codecategoryservices = $request->codecategoryservices;
        $services->status = $request->status;
        $services->save();
        \Session::flash('success', 'Services data has been edited successfully!,');
        return redirect('/services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $services = services::find($id);
        $services->delete();
         \Session::flash('warning', 'Services data has been successfully deleted!,');
        return redirect('/services');
    }
}
