<?php

namespace App\Http\Controllers;
use DB;
use App\Messages;
use Illuminate\Http\Request;

class MessageController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $no = 1;
        $view = messages::orderBy('id', 'DESC')->get();
        return view('internal.message.view', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('internal.message.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = new messages;
        $this->validate($request, [
             'name' => 'required',
             'email'=> 'required',
             'subject' => 'required',
             'description'=> 'required']);
        $message->name        = $request->name;
        $message->email       = $request->email;
        $message->subject       = $request->subject;
        $message->description = $request->description;
        $message->status      = $request->status;
        $message->save();
        \Session::flash('success', 'Message data has been successfully added!,');
        return redirect('/message');
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
        $edit = messages::find($id);
        return view('internal.message.edit', compact('edit'));
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
        $message = messages::find($id);

            $this->validate($request, [
                 'name' => 'required',
                 'email' => 'required',
                 'subject' => 'required',
                 'description'=> 'required']);
            $message->name        = $request->name;
            $message->email       = $request->email;
            $message->subject        = $request->subject;
            $message->description        = $request->description;
            $message->status      = $request->status;
            $message->save();
            \Session::flash('success', 'Message data has been edited successfully!,');
            return redirect('/message');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = messages::find($id);
        $message->delete();
        \Session::flash('warning', 'Message data has been successfully deleted!,');
        return redirect('/message');
    }
}
