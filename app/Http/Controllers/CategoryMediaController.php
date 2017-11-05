<?php

namespace App\Http\Controllers;

use DB;
use App\Categorymedia;

use Illuminate\Http\Request;

class CategoryMediaController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $view = categorymedia::orderBy('id', 'DESC')->get();
        return view('internal.categorymedia.view', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorymedia = DB::select('select max(codecategorymedia) as idMaks from categorymedia');
        foreach($categorymedia as $row3){}
        $nomor  = $row3->idMaks; 
        $noRand = (int) substr($row3->idMaks, 3, 3);
        $noRand++;  
        $char   = "CTM";
        $no   =  $char . sprintf("%03s", $noRand);
        return view('internal.categorymedia.create', compact('no'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categorymedia = new categorymedia;
        $this->validate($request, [
             'codecategorymedia' => 'required',
             'name' => 'required',
             'description' => 'required']);
        $categorymedia->codecategorymedia = $request->codecategorymedia;
        $categorymedia->name = $request->name;
        $categorymedia->description = $request->description;
        $categorymedia->status = $request->status;
        $categorymedia->save();
        \Session::flash('success', 'Category Media data has been successfully added!,');
        return redirect('/categorymedia');
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
        $edit = categorymedia::find($id);
        return view('internal.categorymedia.edit', compact('edit'));
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
         $categorymedia = categorymedia::find($id);
        $this->validate($request, [
             'name' => 'required',
             'description' => 'required']);
        $categorymedia->name = $request->name;
        $categorymedia->description = $request->description;
        $categorymedia->status = $request->status;
        $categorymedia->save();
        \Session::flash('success', 'Category Media data has been edited successfully!,');
        return redirect('/categorymedia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorymedia = categorymedia::find($id);
        $categorymedia->delete();
         \Session::flash('warning', 'Category Media data has been successfully deleted!,');
        return redirect('/categorymedia');
    }
}
