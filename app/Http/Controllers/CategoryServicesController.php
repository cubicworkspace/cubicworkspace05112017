<?php

namespace App\Http\Controllers;

use DB;
use App\Categoryservices;

use Illuminate\Http\Request;

class CategoryServicesController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $view = categoryservices::orderBy('id', 'DESC')->get();
        return view('internal.categoryservices.view', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = DB::select('select max(codecategoryservices) as idMaks from categoryservices');
        foreach($service as $row3){}
        $nomor  = $row3->idMaks; 
        $noRand = (int) substr($row3->idMaks, 3, 3);
        $noRand++;  
        $char   = "CTS";
        $no   =  $char . sprintf("%03s", $noRand);
        return view('internal.categoryservices.create', compact('no'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new categoryservices;
        $this->validate($request, [
             'name' => 'required',
             'description' => 'required']);
        $service->codecategoryservices = $request->codecategoryservices;
        $service->name = $request->name;
        $service->description = $request->description;
        $service->status = $request->status;
        $service->save();
        \Session::flash('success', 'Category Services data has been successfully added!,');
        return redirect('/categoryservices');
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
        $edit = categoryservices::find($id);
        return view('internal.categoryservices.edit', compact('edit'));
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
         $service = categoryservices::find($id);
        $this->validate($request, [
             'name' => 'required',
             'description' => 'required']);
        $service->name = $request->name;
        $service->description = $request->description;
        $service->status = $request->status;
        $service->save();
        \Session::flash('success', 'Category Services data has been edited successfully!,');
        return redirect('/categoryservices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = categoryservices::find($id);
        $service->delete();
         \Session::flash('warning', 'Category Services data has been successfully deleted!,');
        return redirect('/categoryservices');
    }
}
