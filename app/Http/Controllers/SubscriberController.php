<?php

namespace App\Http\Controllers;

use DB;
use App\Subscribers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class SubscriberController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $view = subscribers::orderBy('id', 'DESC')->get();
        return view('internal.subscriber.view', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('internal.subscriber.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $subscriber = new subscribers;
        $this->validate($request, [
             'name' => 'required',
             'email' => 'required']);
        $subscriber->name        = $request->name;
        $subscriber->email       = $request->email;
        $subscriber->status      = $request->status;
        $subscriber->save();
        \Session::flash('success', 'Subscriber data has been successfully added!,');
        return redirect('/subscriber');
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
        $edit = subscribers::find($id);
        return view('internal.subscriber.edit', compact('edit'));
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
         $subscriber = subscribers::find($id);

            $this->validate($request, [
                 'name' => 'required',
                 'email' => 'required']);
            $subscriber->name        = $request->name;
            $subscriber->email       = $request->email;
            $subscriber->status      = $request->status;
            $subscriber->save();
            \Session::flash('success', 'Subscriber data has been edited successfully!,');
            return redirect('/subscriber');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscriber = subscribers::find($id);
        $subscriber->delete();
        \Session::flash('warning', 'Subscriber data has been successfully deleted!,');
        return redirect('/subscriber');
    }
}