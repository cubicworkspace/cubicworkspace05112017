<?php

namespace App\Http\Controllers;
use DB;
use App\Testimonials;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $view = testimonials::orderBy('id', 'DESC')->get();
        return view('internal.testimonial.view', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('internal.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $testimonial= new testimonials;

        $extention = Input::file('image')->getClientOriginalExtension();
        $filename = rand(11111,99999).'.'. $extention;
        $request->file('image')->move(
            base_path() . '/public/upload/testimonial/', $filename
        );

        $this->validate($request, [
             'name' => 'required',
             'description' => 'required']);
        $testimonial->name        = $request->name;
        $testimonial->description = $request->description;
        $testimonial->image       = $filename;
        $testimonial->status      = $request->status;
        $testimonial->save();
        \Session::flash('success', 'Testimonial data has been successfully added!,');
        return redirect('/testimonial');
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
        $edit = testimonials::find($id);
        return view('internal.testimonial.edit', compact('edit'));
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
        $testimonial= testimonials::find($id);

        $image = Input::file('image');
        if($image) {  
            File::delete(public_path('/upload/testimonial/'.$testimonial->image));
            $extention = Input::file('image')->getClientOriginalExtension();
            $filename = rand(11111,99999).'.'. $extention;
            $request->file('image')->move(
                base_path() . '/public/upload/testimonial/', $filename
            );

            $this->validate($request, [
                 'name' => 'required',
                 'description' => 'required']);
            $testimonial->name        = $request->name;
            $testimonial->description = $request->description;
            $testimonial->image       = $filename;
            $testimonial->status      = $request->status;
            $testimonial->save();
            \Session::flash('success', 'Testimonial data has been edited successfully!,');
            return redirect('/testimonial');
        } else {

            $this->validate($request, [
                 'name' => 'required',
                 'description' => 'required']);
            $testimonial->name        = $request->name;
            $testimonial->description = $request->description;
            $testimonial->status      = $request->status;
            $testimonial->save();
            \Session::flash('success', 'Testimonial data has been edited successfully!,');
            return redirect('/testimonial');
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
        $testimonial = testimonials::find($id);
        File::delete(public_path('/upload/testimonial/'.$testimonial->image));
        $testimonial->delete();
        \Session::flash('warning', 'Testimonial data has been successfully deleted!,');
        return redirect('/testimonial');
    }
}
