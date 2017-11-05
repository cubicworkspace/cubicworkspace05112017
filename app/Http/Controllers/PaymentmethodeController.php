<?php

namespace App\Http\Controllers;

use DB;
use App\Paymentmethodes;
use App\Categorypaymentmethodes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PaymentmethodeController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $view = paymentmethodes::orderBy('id', 'DESC')->get();
        return view('internal.paymentmethode.view', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paymentmethodes = DB::select('select max(codepaymentmethode) as idMaks from paymentmethodes');
        foreach($paymentmethodes as $row3){}
        $nomor  = $row3->idMaks; 
        $noRand = (int) substr($row3->idMaks, 3, 3);
        $noRand++;  
        $char   = "PAM";
        $no   =  $char . sprintf("%03s", $noRand);
        $categorypaymentmethodes        = categorypaymentmethodes::pluck('name', 'id');
        return view('internal.paymentmethode.create', compact('no','categorypaymentmethodes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paymentmethode = new paymentmethodes;

        $extention = Input::file('logo')->getClientOriginalExtension();
        $filename = rand(11111,99999).'.'. $extention;
        $request->file('logo')->move(
            base_path() . '/public/upload/paymentmethode/', $filename
        );

        $this->validate($request, [
             'name' => 'required',
             'description' => 'required',
             'nameuser' => 'required',
             'nouser' => 'required']);
        $paymentmethode->codepaymentmethode = $request->codepaymentmethode;
        $paymentmethode->codecategorypaymentmethode = $request->codecategorypaymentmethode;
        $paymentmethode->name = $request->name;
        $paymentmethode->nameuser = $request->nameuser;
        $paymentmethode->nouser = $request->nouser;
        $paymentmethode->description = $request->description;
        $paymentmethode->logo = $filename;
        $paymentmethode->status = $request->status;
        $paymentmethode->save();
        \Session::flash('success', 'Payment Methode data has been successfully added!,');
        return redirect('/paymentmethode');
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
        $categorypaymentmethode        = categorypaymentmethodes::all();
        $edit = paymentmethodes::find($id);
        return view('internal.paymentmethode.edit', compact('edit','categorypaymentmethode'));
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
         $paymentmethode = paymentmethodes::find($id);
        $logo = Input::file('logo');
        if($logo) {     
            File::delete(public_path('/upload/paymentmethode/'.$paymentmethode->logo)); 
            $extention = Input::file('logo')->getClientOriginalExtension();
            $filename = rand(11111,99999).'.'. $extention;
            $request->file('logo')->move(
                base_path() . '/public/upload/paymentmethode/', $filename
            );

            $this->validate($request, [
                'name' => 'required',
             'description' => 'required',
             'nameuser' => 'required',
             'nouser' => 'required']);
       // $event->codeevent = $request->codeevent;
        $paymentmethode->codecategorypaymentmethode = $request->codecategorypaymentmethode;
        $paymentmethode->name = $request->name;
        $paymentmethode->nameuser = $request->nameuser;
        $paymentmethode->nouser = $request->nouser;
        $paymentmethode->description = $request->description;
        $paymentmethode->logo = $filename;
        $paymentmethode->status = $request->status;
        $paymentmethode->save();
            \Session::flash('success', 'Payment Methode data has been edited successfully!,');
            return redirect('/paymentmethode');
        } else {
            $paymentmethode = paymentmethodes::find($id);
            $this->validate($request, [
               'name' => 'required',
             'description' => 'required',
             'nameuser' => 'required',
             'nouser' => 'required']);
       // $event->codeevent = $request->codeevent;
        //$paymentmethode->codepaymentmethode = $request->codepaymentmethode;
        $paymentmethode->codecategorypaymentmethode = $request->codecategorypaymentmethode;
        $paymentmethode->name = $request->name;
        $paymentmethode->nameuser = $request->nameuser;
        $paymentmethode->nouser = $request->nouser;
        $paymentmethode->description = $request->description;
        $paymentmethode->status = $request->status;
        $paymentmethode->save();
            \Session::flash('success', 'Payment Methode data has been edited successfully!,');
            return redirect('/paymentmethode');
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
        $paymentmethode = paymentmethodes::find($id);
        File::delete(public_path('/upload/paymentmethode/'.$paymentmethode->logo)); 
        $paymentmethode->delete();
        \Session::flash('warning', 'Payment Methode data has been successfully deleted!,');
        return redirect('/paymentmethode');
    }
}
