<?php

namespace App\Http\Controllers;
use DB;
use App\Teams;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $view = teams::orderBy('id', 'DESC')->get();
        return view('internal.team.view', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('internal.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $team = new teams;

        $extention = Input::file('image')->getClientOriginalExtension();
        $filename = rand(11111,99999).'.'. $extention;
        $request->file('image')->move(
            base_path() . '/public/upload/team/', $filename
        );

        $this->validate($request, [
             'name' => 'required',
             'job' => 'required']);
        $team->name        = $request->name;
        $team->image       = $filename;
        $team->job         = $request->job;
        $team->description = $request->description;
        $team->status      = $request->status;
        $team->save();
        \Session::flash('success', 'Team data has been successfully added!,');
        return redirect('/team');
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
        $edit = teams::find($id);
        return view('internal.team.edit', compact('edit'));
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
        $team= teams::find($id);
        $image = Input::file('image');
        if($image) {  
            File::delete(public_path('/upload/team/'.$team->image));
            $extention = Input::file('image')->getClientOriginalExtension();
            $filename = rand(11111,99999).'.'. $extention;
            $request->file('image')->move(
                base_path() . '/public/upload/team/', $filename
            );

            $this->validate($request, [
                 'name' => 'required',
                 'job' => 'required']);
            $team->name        = $request->name;
            $team->image       = $filename;
            $team->job         = $request->job;
            $team->description = $request->description;
            $team->status      = $request->status;
            $team->save();
            \Session::flash('success', 'Team data has been edited successfully!,');
            return redirect('/team');
        } else {

            $this->validate($request, [
                 'name' => 'required',
                 'job' => 'required']);
            $team->name        = $request->name;
            $team->job         = $request->job;
            $team->description = $request->description;
            $team->status      = $request->status;
            $team->save();
            \Session::flash('success', 'Team data has been edited successfully!,');
            return redirect('/team');
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
        $team = teams::find($id);
        File::delete(public_path('/upload/team/'.$team->image));
        $team->delete();
        \Session::flash('warning', 'Team data has been successfully deleted!,');
        return redirect('/team');
    }
}
