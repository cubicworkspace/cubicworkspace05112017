<?php

namespace App\Http\Controllers;
use DB;
use App\Categorypaymentmethodes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class CategorypaymentmethodeController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $view = categorypaymentmethodes::orderBy('id', 'DESC')->get();
        return view('internal.categorypaymentmethode.view', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorypaymentmethode = DB::select('select max(codecategorypaymentmethode) as idMaks from categorypaymentmethodes');
        foreach($categorypaymentmethode as $row3){}
        $nomor  = $row3->idMaks; 
        $noRand = (int) substr($row3->idMaks, 3, 3);
        $noRand++;  
        $char   = "CPM";
        $no   =  $char . sprintf("%03s", $noRand);
        return view('internal.categorypaymentmethode.create', compact('no'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $categorypaymentmethode = new categorypaymentmethodes;

        $this->validate($request, [
             'name' => 'required',
             'codecategorypaymentmethode' => 'required',
             'description' => 'required']);
        $categorypaymentmethode->name = $request->name;
        $categorypaymentmethode->codecategorypaymentmethode = $request->codecategorypaymentmethode;
        $categorypaymentmethode->description = $request->description;
        $categorypaymentmethode->status = $request->status;
        $categorypaymentmethode->save();
        \Session::flash('success', 'Category Payment Methode data has been successfully added!,');
        return redirect('/categorypaymentmethode');
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
        $edit = categorypaymentmethodes::find($id);
        return view('internal.categorypaymentmethode.edit', compact('edit'));
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
        $categorypaymentmethode = categorypaymentmethodes::find($id);
            $this->validate($request, [
                 'name' => 'required']);
            $categorypaymentmethode->name = $request->name;
           // $categorypaymentmethode->codecategorypaymentmethode = $request->codecategorypaymentmethode;
            $categorypaymentmethode->description = $request->description;
            $categorypaymentmethode->status = $request->status;
            $categorypaymentmethode->save();
            \Session::flash('success', 'Category Payment Methode data has been edited successfully!,');
            return redirect('/categorypaymentmethode');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorypaymentmethode = categorypaymentmethodes::find($id);
            $categorypaymentmethode->delete();
             \Session::flash('warning', 'Category Payment Methode data has been successfully deleted!,');
            return redirect('/categorypaymentmethode');
    }
}
