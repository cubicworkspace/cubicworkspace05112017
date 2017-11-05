<?php

namespace App\Http\Controllers;
use DB;
use App\Members;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class MemberController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $view = members::orderBy('id', 'DESC')->get();
        return view('internal.member.view', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = DB::select('select max(codeuser) as idMaks from members');
        foreach($members as $row3){}
        $nomor  = $row3->idMaks; 
        $noRand = (int) substr($row3->idMaks, 3, 3);
        $noRand++;  
        $char   = "CMB";
        $no   =  $char . sprintf("%03s", $noRand);
        return view('internal.member.create', compact('no'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $member = new members;

        $extention = Input::file('image')->getClientOriginalExtension();
        $filename = rand(11111,99999).'.'. $extention;
        $request->file('image')->move(
            base_path() . '/public/upload/member/', $filename
        );

        $this->validate($request, [
             'institution' => 'required',
             'phone' => 'required']);
        $member->codeuser = $request->codeuser;
        $member->institution = $request->institution;
        $member->birthday = $request->birthday;
        $member->phone = $request->phone;
        $member->address = $request->address;
        $member->image = $filename;
        $member->description = $request->description;
        $member->information = $request->information;
        $member->registerdate = date('Y-m-d H:i:s');
        $member->lastlogin = date('Y-m-d H:i:s');
        $member->status = $request->status;
        $member->save();
        \Session::flash('success', 'Member data has been successfully added!,');
        return redirect('/member');
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
        $edit = members::find($id);
        return view('internal.member.edit', compact('edit'));
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
        $member = members::find($id);
        $image = Input::file('image');
        if($image) {                
            File::delete(public_path('/upload/member/'.$member->image));
            $extention = Input::file('image')->getClientOriginalExtension();
            $filename = rand(11111,99999).'.'. $extention;
            $request->file('image')->move(
                base_path() . '/public/upload/member/', $filename
            );

            $this->validate($request, [
                 'institution' => 'required',
                 'phone' => 'required']);
           // $member->codeuser = $request->codeuser;
        $member->institution = $request->institution;
        $member->birthday = $request->birthday;
        $member->phone = $request->phone;
        $member->address = $request->address;
        $member->image = $filename;
        $member->description = $request->description;
        $member->information = $request->information;
        $member->registerdate = date('Y-m-d H:i:s');
        $member->lastlogin = date('Y-m-d H:i:s');
        $member->status = $request->status;
        $member->save();
            \Session::flash('success', 'Member data has been edited successfully!,');
            return redirect('/member');
        } else {
            $member = members::find($id);
            $this->validate($request, [
                 'institution' => 'required',
                 'phone' => 'required']);
            //$member->codeuser = $request->codeuser;
        $member->institution = $request->institution;
        $member->birthday = $request->birthday;
        $member->phone = $request->phone;
        $member->address = $request->address;
        $member->description = $request->description;
        $member->information = $request->information;
        $member->registerdate = date('Y-m-d H:i:s');
        $member->lastlogin = date('Y-m-d H:i:s');
        $member->status = $request->status;
        $member->save();
            \Session::flash('success', 'Member data has been edited successfully!,');
            return redirect('/member');

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
        $member = members::find($id);
        File::delete(public_path('/upload/member/'.$member->image));
        $member->delete();
        \Session::flash('warning', 'Member data has been successfully deleted!,');
        return redirect('/member');
    }
}
