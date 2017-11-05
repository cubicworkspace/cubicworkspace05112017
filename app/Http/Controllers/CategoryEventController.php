<?php

namespace App\Http\Controllers;
use DB;
use App\Categoryevents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CategoryEventController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $view = categoryevents::orderBy('id', 'DESC')->get();
        return view('internal.categoryevent.view', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryevent = DB::select('select max(codecategoryevent) as idMaks from categoryevents');
        foreach($categoryevent as $row3){}
        $nomor  = $row3->idMaks; 
        $noRand = (int) substr($row3->idMaks, 3, 3);
        $noRand++;  
        $char   = "CTE";
        $no   =  $char . sprintf("%03s", $noRand);
        return view('internal.categoryevent.create', compact('no'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoryevent = new categoryevents;

        $this->validate($request, [
             'name' => 'required',
             'codecategoryevent' => 'required',
             'description' => 'required']);
        $categoryevent->name = $request->name;
        $categoryevent->codecategoryevent = $request->codecategoryevent;
        $categoryevent->description = $request->description;
        $categoryevent->status = $request->status;
        $categoryevent->save();
        \Session::flash('success', 'Category Event data has been successfully added!,');
        return redirect('/categoryevent');
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
        $edit = categoryevents::find($id);
        return view('internal.categoryevent.edit', compact('edit'));
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
        $categoryevent = categoryevents::find($id);
            $this->validate($request, [
                 'name' => 'required',]);
            $categoryevent->name = $request->name;
            // $categoryevent->codecategoryevent = $request->codecategoryevent;
            $categoryevent->description = $request->description;
            $categoryevent->status = $request->status;
            $categoryevent->save();
            \Session::flash('success', 'Category Event data has been edited successfully!,');
            return redirect('/categoryevent');
    
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryevent = categoryevents::find($id);
            $categoryevent->delete();
             \Session::flash('warning', 'Category Event data has been successfully deleted!,');
            return redirect('/categoryevent');
    }
}
