<?php

namespace App\Http\Controllers;

use DB;
use App\Categoryadmins;

use Illuminate\Http\Request;

class CategoryadminController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $view = categoryadmins::orderBy('id', 'DESC')->get();
        return view('internal.categoryadmin.view', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryadmins = DB::select('select max(codecategoryadmin) as idMaks from categoryadmins');
        foreach($categoryadmins as $row3){}
        $nomor  = $row3->idMaks; 
        $noRand = (int) substr($row3->idMaks, 3, 3);
        $noRand++;  
        $char   = "CTA";
        $no   =  $char . sprintf("%03s", $noRand);
        return view('internal.categoryadmin.create', compact('no'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $categoryadmin = new categoryadmins;
        $this->validate($request, [
             'codecategoryadmin' => 'required',
             'name' => 'required',
             'description' => 'required']);
        $categoryadmin->codecategoryadmin = $request->codecategoryadmin;
        $categoryadmin->name = $request->name;
        $categoryadmin->description = $request->description;
        $categoryadmin->status = $request->status;
        $categoryadmin->save();
        \Session::flash('success', 'Category Admin data has been successfully added!,');
        return redirect('/categoryadmin');
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
        $edit = categoryadmins::find($id);
        return view('internal.categoryadmin.edit', compact('edit'));
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
        $categoryadmin = categoryadmins::find($id);
        $this->validate($request, [
             'name' => 'required',
             'description' => 'required']);
        $categoryadmin->name = $request->name;
        $categoryadmin->description = $request->description;
        $categoryadmin->status = $request->status;
        $categoryadmin->save();
        \Session::flash('success', 'Category Admin data has been edited successfully!,');
        return redirect('/categoryadmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryadmin = categoryadmins::find($id);
        $categoryadmin->delete();
         \Session::flash('warning', 'Category Admin data has been successfully deleted!,');
        return redirect('/categoryadmin');
    }
}
