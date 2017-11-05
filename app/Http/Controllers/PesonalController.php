<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\Users;
use App\Members;
use App\Media;
use App\Categorymedia;
use App\Informasicompanies;
use App\Companypartnership;
use App\Companyservices;
use App\Testimonials;
use App\Subscribers;
use App\Citys;
use App\Services;
use App\Mediacompanyservices;
use App\Bookingtour;
use App\Bookingspaces;
use App\Billingcompanyservices;
use App\Paymentmethodes;
use App\Companies;
use App\Teams;
use App\Events;
use App\Categoryevents;
use App\Sosialmedias;
use App\Messages;

use App\Http\Requests; 
use App\Http\Requests\companyservicesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Session;
use PDF;


class PesonalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('member');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sosialmedia             = sosialmedias::where('status', '=', 'Y')->get();   
        $identitas               = companies::find('1');
        return view('personal.dashboard', compact('sosialmedia','identitas'));
    }

    public function profile($id, $email='')
    {
        $editmember              = members::where('email', '=', $email)->limit(1)->get(); 
        $edituser                = users::findOrFail($id);
        $sosialmedia             = sosialmedias::where('status', '=', 'Y')->get();   
        $identitas               = companies::find('1');
        return view('personal.profile', compact('sosialmedia','identitas','editmember','edituser'));
    }

    public function editprofile(Request $request, $id, $email)
    {
        $sosialmedia             = sosialmedias::where('status', '=', 'Y')->get();   
        $identitas               = companies::find('1');
        $member = members::find($id);
        $image = Input::file('image');
        if($image) {                
            File::delete(public_path('/upload/member/'.$member->image));
            $extention = Input::file('image')->getClientOriginalExtension();
            $filename = rand(11111,99999).'.'. $extention;
            $request->file('image')->move(
                base_path() . '/public/upload/member/', $filename
            );

        $user = users::findOrFail($request->codeuser);
        $user->name = $request->name;
        // if( $user->password = Hash::make('password')) {
        // $user->password = bcrypt($request->password);
        // } else {
        // $user->password = array_except($request->password);
        // }
        $member->codeuser = $request->codeuser;
        $member->institution = $request->institution;
        $member->birthday = $request->birthday;
        $member->phone = $request->phone;
        $member->address = $request->address;
        $member->image = $filename;
        $member->description = $request->description;
        $member->information = $request->information;
        $member->save();
        $user->save();
            \Session::flash('success', 'Member data has been edited successfully!,');
            return redirect('/personal/profile/'.Auth::user()->id.'/'.Auth::user()->email.'/');
        } else {
        $member = members::find($id);
        $user = users::findOrFail($request->codeuser);
        $user->name = $request->name;
        // if( $user->password = Hash::make('password')) {
        // $user->password = bcrypt($request->password);
        // } else {
        // $user->password = array_except($request->password);
        // }
        $member->codeuser = $request->codeuser;
        $member->institution = $request->institution;
        $member->birthday = $request->birthday;
        $member->phone = $request->phone;
        $member->address = $request->address;
        $member->description = $request->description;
        $member->information = $request->information;
        $member->save();
        $user->save();
            \Session::flash('success', 'Member data has been edited successfully!,');
            return redirect('/personal/profile/'.Auth::user()->id.'/'.Auth::user()->email.'/');

        }
        return view('personal.profile', compact('sosialmedia','identitas','editmember','edituser'));
    }

    public function booking($id, $email='')
    {
        $editmember              = members::where('email', '=', $email)->limit(1)->get();   
        $sosialmedia             = sosialmedias::where('status', '=', 'Y')->get();   
        $identitas               = companies::find('1');
        $bookingspaces           = bookingspaces::where('codeuser', '=', $id)
                                                ->where('email', '=', $email)->paginate(5);  
        $datenow                 = date('Y-m-d');    
        return view('personal.booking', compact('sosialmedia','identitas','editmember','bookingspaces','datenow'));
    }

    public function payment(Request $request, $id)
    {
        $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
        $sosialmedia             = sosialmedias::where('status', '=', 'Y')->get();   
        $identitas               = companies::find('1');
        $bookingspaces = bookingspaces::find($id);
        $uploadpayment = Input::file('uploadpayment');
        if($uploadpayment) {                
            File::delete(public_path('/upload/uploadpayment/'.$bookingspaces->uploadpayment));
            $extention = Input::file('uploadpayment')->getClientOriginalExtension();
            $filename = rand(11111,99999).'.'. $extention;
            $request->file('uploadpayment')->move(
                base_path() . '/public/upload/uploadpayment/', $filename
            );
        $bookingspaces->uploadpayment = $filename;
        $bookingspaces->save();
            \Session::flash('success', 'Thank you for uploading proof of payment!,');
            return redirect('/personal/booking/'.Auth::user()->id.'/'.Auth::user()->email.'/');
        } else {
        $bookingspaces = bookingspaces::find($id);
        $bookingspaces->uploadpayment = $filename;
        $bookingspaces->save();
            \Session::flash('success', 'Thank you for uploading proof of payment!,');
            return redirect('/personal/booking/'.Auth::user()->id.'/'.Auth::user()->email.'/');

        }
        return view('personal.booking', compact('sosialmedia','identitas','bookingspaces'));
    }

}
