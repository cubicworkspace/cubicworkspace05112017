<?php

namespace App\Http\Controllers;


use DB;
use App\Media;
use App\Categorymedia;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $view = media::orderBy('id', 'DESC')->get();
        return view('internal.media.view', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $media = DB::select('select max(codemedia) as idMaks from media');
        foreach($media as $row3){}
        $nomor  = $row3->idMaks; 
        $noRand = (int) substr($row3->idMaks, 3, 3);
        $noRand++;  
        $char   = "MED";
        $no   =  $char . sprintf("%03s", $noRand);
        $categorymedia = categorymedia::pluck('name', 'id');
        return view('internal.media.create', compact('no','categorymedia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $media= new media;

        $extention = Input::file('image')->getClientOriginalExtension();
        $filename =  date('YmdHis'). ".$extention";
        $request->file('image')->move(
            base_path() . '/public/upload/media/', $filename
        );

        $this->validate($request, [
             'codecategorymedia' => 'required',
             'codemedia' => 'required',
             'name' => 'required',
             'url' => 'required']);
        $media->codecategorymedia= $request->codecategorymedia;
        $media->codemedia   = $request->codemedia;
        $media->name        = $request->name;
        $media->url         = $request->url;
        $media->date        = $request->date;
        $media->writer       = $request->writer;
        $media->image       = $filename;
        $media->status      = $request->status;
        $media->save();
        \Session::flash('success', 'Media data has been successfully added!,');
        return redirect('/media');
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
        $categorymedia = categorymedia::all();
        $edit = media::find($id);
        return view('internal.media.edit', compact('edit','categorymedia'));
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
        $media= media::find($id);
        $image = Input::file('image');
        if($image) {
            File::delete(public_path('/upload/media/'.$media->image));  
            $extention = Input::file('image')->getClientOriginalExtension();
            $filename =  date('YmdHis'). ".$extention";
            $request->file('image')->move(
                base_path() . '/public/upload/media/', $filename
            );

            $this->validate($request, [
                 'name' => 'required',
                 'url' => 'required']);
            $media->name        = $request->name;
            $media->url         = $request->url;
            $media->date        = $request->date;
            $media->writer      = $request->writer;
            $media->image       = $filename;
            $media->status      = $request->status;
            $media->save();
            \Session::flash('success', 'Media data has been edited successfully!,');
            return redirect('/media');
        } else {

            $this->validate($request, [
                 'codecategorymedia' => 'required',
                 'name' => 'required',
                 'url' => 'required']);
            $media->codecategorymedia= $request->codecategorymedia;
            $media->name        = $request->name;
            $media->url         = $request->url;
            $media->date        = $request->date;
            $media->writer      = $request->writer;
            $media->status      = $request->status;
            $media->save();
            \Session::flash('success', 'Media data has been edited successfully!,');
            return redirect('/media');
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
        $media = media::find($id);
        File::delete(public_path('/upload/media/'.$media->image));
        $media->delete();
        \Session::flash('warning', 'Media data has been successfully deleted!,');
        return redirect('/media');
    }
}
