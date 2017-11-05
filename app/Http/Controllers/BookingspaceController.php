<?php

namespace App\Http\Controllers;

use DB;
use App\Bookingspaces;
use App\Services;
use App\Companypartnership;
use App\Billingcompanyservices;
use App\Users;
use App\Paymentmethodes;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BookingspaceController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $view = bookingspaces::orderBy('id', 'DESC')->get();
        return view('internal.bookingspace.view', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookingspaces = DB::select('select max(codebookingspace) as idMaks from bookingspaces');
        foreach($bookingspaces as $row3){}
        $nomor  = $row3->idMaks; 
        $noRand = (int) substr($row3->idMaks, 3, 3);
        $noRand++;  
        $char   = "CBS";
        $no   =  $char . sprintf("%03s", $noRand);

        $companypartnership     = companypartnership::pluck('name', 'id');
        $services               = services::pluck('name', 'id');
        $billingcompanyservices = billingcompanyservices::pluck('name', 'id');
        $users                  = users::pluck('name', 'id');
        $paymentmethodes         = paymentmethodes::pluck('name', 'id');

        return view('internal.bookingspace.create', compact('no','companypartnership','services','billingcompanyservices','users','paymentmethodes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bookingspace = new bookingspaces;

        $this->validate($request, [
             'name' => 'required',
             'quota' => 'required',
             'phone' => 'required']);
        $bookingspace->codebookingspace = $request->codebookingspace;
        $bookingspace->codecompanypartnership = $request->codecompanypartnership;
        $bookingspace->codebilling = $request->codebilling;
        $bookingspace->codeservices = $request->codeservices;
        $bookingspace->codeuser = $request->codeuser;
        $bookingspace->codepaymentmethode = $request->codepaymentmethode;
        $bookingspace->invoice = $request->invoice;
        $bookingspace->name = $request->name;
        $bookingspace->email = $request->email;
        $bookingspace->phone = $request->phone;
        $bookingspace->address = $request->address;
        $bookingspace->quota = $request->quota;
        $bookingspace->quotauser = $request->quotauser;
        $bookingspace->price = $request->price;
        $bookingspace->totalprice = $request->totalprice;
        $bookingspace->datein = date('Y-m-d H:i:s');
        $bookingspace->dateout = date('Y-m-d H:i:s');
        $bookingspace->currentquotauser = $request->currentquotauser;
        $bookingspace->nowquotauser = $request->nowquotauser;
        $bookingspace->information = $request->information;
        $bookingspace->dateregister = date('Y-m-d H:i:s');
        $bookingspace->status = $request->status;
        $bookingspace->save();
        \Session::flash('success', 'Booking Space data has been successfully added!,');
        return redirect('/bookingspace');
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
        $companypartnership     = companypartnership::all();
        $services               = services::all();
        $billingcompanyservices = billingcompanyservices::all();
        $users                  = users::all();
        $paymentmethodes         = paymentmethodes::all();

        $edit = bookingspaces::find($id);
        return view('internal.bookingspace.edit', compact('edit','companypartnership','services','billingcompanyservices','users','paymentmethodes'));
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
        
            $bookingspace = bookingspaces::find($id);
            $this->validate($request, [
                'name' => 'required',
             'phone' => 'required',
             'quota' => 'required']);
       // $event->codeevent = $request->codeevent;
        //$bookingspace->codebookingspace = $request->codebookingspace;
        $bookingspace->codecompanypartnership = $request->codecompanypartnership;
        //$bookingspace->codebilling = $request->codebilling;
        $bookingspace->codeservices = $request->codeservices;
        //$bookingspace->codeuser = $request->codeuser;
        $bookingspace->codepaymentmethode = $request->codepaymentmethode;
        $bookingspace->invoice = $request->invoice;
        $bookingspace->name = $request->name;
        $bookingspace->email = $request->email;
        $bookingspace->phone = $request->phone;
        $bookingspace->address = $request->address;
        $bookingspace->quota = $request->quota;
        $bookingspace->quotauser = $request->quotauser;
        $bookingspace->price = $request->price;
        $bookingspace->totalprice = $request->totalprice;
        $bookingspace->datein = date('Y-m-d H:i:s');
        $bookingspace->dateout = date('Y-m-d H:i:s');
        $bookingspace->currentquotauser = $request->currentquotauser;
        $bookingspace->nowquotauser = $request->nowquotauser;
        $bookingspace->information = $request->information;
        $bookingspace->dateregister = date('Y-m-d H:i:s');
        $bookingspace->status = $request->status;
        $bookingspace->save();
            \Session::flash('success', 'Booking Space data has been edited successfully!,');
            return redirect('/bookingspace');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $bookingspace = bookingspaces::find($id);
        $bookingspace->delete();
        \Session::flash('warning', 'Booking Space data has been successfully deleted!,');
        return redirect('/bookingspace');
    }

    public function payment(Request $request, $id) {
        $bookingspace = bookingspaces::find($id);
        $id  = $request->id; 
            if ($bookingspace->statuspayment == 'N') {
                $bookingspace->statuspayment = 'Y';
            } else {
                $bookingspace->statuspayment = 'N';
            }
        $bookingspace->save();
        \Session::flash('success', 'Booking Space data has been edited successfully!,');
        return redirect('/bookingspace');
        // return "d";
    }

     public function detailbookingspace($id)
    {
        $companypartnership     = companypartnership::all();
        $services               = services::all();
        $billingcompanyservices = billingcompanyservices::all();
        $users                  = users::all();
        $paymentmethodes        = paymentmethodes::all();
        $datenow                = date('Y-m-d');    

        $detail = bookingspaces::find($id);
        return view('internal.bookingspace.detail', compact('detail','companypartnership','services','billingcompanyservices','users','paymentmethodes','datenow'));
    }
}
