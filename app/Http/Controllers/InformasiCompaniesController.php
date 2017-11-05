<?php

namespace App\Http\Controllers;

use DB;
use App\Informasicompanies;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class InformasiCompaniesController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $no = 1;
        $view = informasicompanies::orderBy('id', 'DESC')->get();
        return view('internal.informasicompanies.view', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('internal.informasicompanies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $informasicompanies = new informasicompanies;

        $extention = Input::file('icon')->getClientOriginalExtension();
        $filename =  date('YmdHis'). ".$extention";
        $request->file('icon')->move(
            base_path() . '/public/upload/informasicompanies/', $filename
        );

        $this->validate($request, [
             'name' => 'required',
             'title' => 'required']);
        $informasicompanies->name = $request->name;
        $informasicompanies->title = $request->title;
        $informasicompanies->description = $request->description;
        $informasicompanies->icon = $filename;
        $informasicompanies->categoryinfromasi= $request->categoryinfromasi;
        $informasicompanies->status = $request->status;
        $informasicompanies->save();
        \Session::flash('success', 'Informasi Companies data has been successfully added!,');
        return redirect('/informasicompanies');
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
        $edit = informasicompanies::find($id);
        return view('internal.informasicompanies.edit', compact('edit'));
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
        $informasicompanies = informasicompanies::find($id);
        $icon = Input::file('icon');
        if($icon) {     
            File::delete(public_path('/upload/informasicompanies/'.$informasicompanies->icon));  
            $extention = Input::file('icon')->getClientOriginalExtension();
            $filename =  date('YmdHis'). ".$extention";
            $request->file('icon')->move(
                base_path() . '/public/upload/informasicompanies/', $filename
            );

            $this->validate($request, [
                 'name' => 'required',
                 'title' => 'required']);
            $informasicompanies->name = $request->name;
            $informasicompanies->title = $request->title;
            $informasicompanies->description = $request->description;
            $informasicompanies->icon = $filename;
            $informasicompanies->categoryinfromasi = $request->categoryinfromasi;
            $informasicompanies->status = $request->status;
            $informasicompanies->save();
            \Session::flash('success', 'Informasi Companies data has been edited successfully!,');
            return redirect('/informasicompanies');
        } else {
            $this->validate($request, [
                 'name' => 'required',
                 'title' => 'required']);
            $informasicompanies->name = $request->name;
            $informasicompanies->title = $request->title;
            $informasicompanies->description = $request->description;
            $informasicompanies->categoryinfromasi= $request->categoryinfromasi;
            $informasicompanies->status = $request->status;
            $informasicompanies->save();
            \Session::flash('success', 'Informasi Companies data has been edited successfully!,');
            return redirect('/informasicompanies');
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
        $informasicompanies = informasicompanies::find($id);
        File::delete(public_path('/upload/informasicompanies/'.$informasicompanies->icon));   
        $informasicompanies->delete();
        \Session::flash('warning', 'Informasi Companies data has been successfully deleted!,');
        return redirect('/informasicompanies');
    }
}
