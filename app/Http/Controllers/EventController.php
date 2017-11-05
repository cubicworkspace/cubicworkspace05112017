<?php

namespace App\Http\Controllers;
use DB;
use App\Events;
use App\Categoryevents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $view = events::orderBy('id', 'DESC')->get();
        return view('internal.event.view', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = DB::select('select max(codeevent) as idMaks from events');
        foreach($events as $row3){}
        $nomor  = $row3->idMaks; 
        $noRand = (int) substr($row3->idMaks, 3, 3);
        $noRand++;  
        $char   = "EVT";
        $no   =  $char . sprintf("%03s", $noRand);
        $categoryevent = categoryevents::pluck('name', 'id');
        return view('internal.event.create', compact('no','categoryevent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new events;

        $extention = Input::file('image')->getClientOriginalExtension();
        $filename = rand(11111,99999).'.'. $extention;
        $request->file('image')->move(
            base_path() . '/public/upload/event/', $filename
        );

        $this->validate($request, [
             'title' => 'required',
             'description' => 'required',
             'quota' => 'required',
             'address' => 'required']);
        $event->codeevent = $request->codeevent;
        $event->codecategoryevent = $request->codecategoryevent;
        $event->title = $request->title;
        $event->url = $request->url;
        $event->description = $request->description;
        $event->datetime = date('Y-m-d H:i:s');
        $event->quota = $request->quota;
        $event->image = $filename;
        $event->address = $request->address;
        $event->status = $request->status;
        $event->save();
        \Session::flash('success', 'Event data has been successfully added!,');
        return redirect('/event');
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
        $edit = events::find($id);
        $categoryevent = categoryevents::all();
        return view('internal.event.edit', compact('edit','categoryevent'));
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
        $event = events::find($id);
        $image = Input::file('image');
        if($image) {     
            File::delete(public_path('/upload/event/'.$event->image));  
            $extention = Input::file('image')->getClientOriginalExtension();
            $filename = rand(11111,99999).'.'. $extention;
            $request->file('image')->move(
                base_path() . '/public/upload/event/', $filename
            );

            $this->validate($request, [
             'title' => 'required',
             'description' => 'required',
             'quota' => 'required',
             'address' => 'required']);
       // $event->codeevent = $request->codeevent;
        $event->codecategoryevent = $request->codecategoryevent;
        $event->title = $request->title;
        $event->url = $request->url;
        $event->description = $request->description;
        $event->datetime = date('Y-m-d H:i:s');
        $event->quota = $request->quota;
        $event->image = $filename;
        $event->address = $request->address;
        $event->status = $request->status;
        $event->save();
            \Session::flash('success', 'Event data has been edited successfully!,');
            return redirect('/event');
        } else {
            $event = events::find($id);
            $this->validate($request, [
              'title' => 'required',
             'description' => 'required',
             'quota' => 'required',
             'address' => 'required']);
       // $event->codeevent = $request->codeevent;
        $event->codecategoryevent = $request->codecategoryevent;
        $event->title = $request->title;
        $event->url = $request->url;
        $event->description = $request->description;
        $event->datetime = date('Y-m-d H:i:s');
        $event->quota = $request->quota;
        $event->address = $request->address;
        $event->status = $request->status;
        $event->save();
            \Session::flash('success', 'Event data has been edited successfully!,');
            return redirect('/event');

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
        $event = events::find($id);
        File::delete(public_path('/upload/event/'.$event->image));
        $event->delete();
        \Session::flash('warning', 'Event data has been successfully deleted!,');
        return redirect('/event');
    }
}
