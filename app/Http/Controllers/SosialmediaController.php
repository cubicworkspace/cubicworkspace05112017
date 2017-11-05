<?php

namespace App\Http\Controllers;

use DB;
use App\Sosialmedias;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SosialmediaController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $view = sosialmedias::orderBy('id', 'DESC')->get();
        return view('internal.sosialmedia.view', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('internal.sosialmedia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $sosialmedia = new sosialmedias;
        $this->validate($request, [
             'name' => 'required',
             'url' => 'required']);
        $sosialmedia->name        = $request->name;
        $sosialmedia->url         = $request->url;
        $sosialmedia->description = $request->description;
        $sosialmedia->status      = $request->status;
        $sosialmedia->save();
        \Session::flash('success', 'Social Media data has been successfully added!,');
        return redirect('/sosialmedia');
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
        $edit = sosialmedias::find($id);
        return view('internal.sosialmedia.edit', compact('edit'));
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
        $sosialmedia = sosialmedias::find($id);

            $this->validate($request, [
                 'name' => 'required',
                 'url' => 'required']);
            $sosialmedia->name        = $request->name;
            $sosialmedia->url         = $request->url;
            $sosialmedia->description = $request->description;
            $sosialmedia->status      = $request->status;
            $sosialmedia->save();
            \Session::flash('success', 'Social Media data has been edited successfully!,');
            return redirect('/sosialmedia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sosialmedia = sosialmedias::find($id);
        $sosialmedia->delete();
        \Session::flash('warning', 'Social Media data has been successfully deleted!,');
        return redirect('/sosialmedia');
    }
}
