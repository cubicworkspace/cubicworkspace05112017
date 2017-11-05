<?php

namespace App\Http\Controllers;


use DB;
use App\Tagservices;
use App\Services;

use Illuminate\Http\Request;

class TagServicesController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $no = 1;
        $view = tagservices::orderBy('id', 'DESC')->get();
        return view('internal.tagservices.view', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $tagservices = DB::select('select max(codetagservices) as idMaks from tagservices');
        foreach($tagservices as $row3){}
        $nomor  = $row3->idMaks; 
        $noRand = (int) substr($row3->idMaks, 3, 3);
        $noRand++;  
        $char   = "CTS";
        $no   =  $char . sprintf("%03s", $noRand);
        $services = services::pluck('name', 'id');
        return view('internal.tagservices.create', compact('no','services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tagservices = new tagservices;
        $this->validate($request, [
             'codetagservices' => 'required',
             'codeservices' => 'required',
             'description' => 'required']);
        $tagservices->codetagservices = $request->codetagservices;
        $tagservices->codeservices = $request->codeservices;
        $tagservices->name = $request->name;
        $tagservices->description = $request->description;
        $tagservices->choosetagservices = $request->choosetagservices;
        $tagservices->status = $request->status;
        $tagservices->save();
        \Session::flash('success', 'Tag Services data has been successfully added!,');
        return redirect('/tagservices');
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
        $services = services::all();
        $edit = tagservices::find($id);
        return view('internal.tagservices.edit', compact('edit','services'));
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
        $tagservices = tagservices::find($id);
        $this->validate($request, [
             'codeservices' => 'required',
             'description' => 'required']);
        $tagservices->codeservices = $request->codeservices;
        $tagservices->name = $request->name;
        $tagservices->description = $request->description;
        $tagservices->choosetagservices = $request->choosetagservices;
        $tagservices->status = $request->status;
        $tagservices->save();
        \Session::flash('success', 'Tag Services data has been edited successfully!,');
        return redirect('/tagservices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tagservices = tagservices::find($id);
        $tagservices->delete();
         \Session::flash('warning', 'Tag Services data has been successfully deleted!,');
        return redirect('/tagservices');
    }
}
