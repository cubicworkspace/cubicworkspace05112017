<?php

namespace App\Http\Controllers;

use DB;
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
use App\Bbillingcompanyservices;
use App\Paymentmethodes;
use App\Companies;
use App\Teams;
use App\Events;
use App\Categoryevents;
use App\Sosialmedias;
use App\Messages;

use Mail;
use App\Mail\Reminder;
use App\Mail\OrderShipped;

use App\Http\Requests; 
use App\Http\Requests\companyservicesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Session;
use PDF;

class WebsiteController extends Controller
{
  

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sosialmedia        = sosialmedias::where('status', '=', 'Y')->get();   
        $identitas          = companies::find('1');
        $media              = media::find('4');
        $header             = informasicompanies::where('categoryinfromasi', '=', 'HEADER')
                                                 ->where('status', '=', 'Y')->limit(3)->get();
        $topbasecamp        = companypartnership::where('codetagservices', '=', '3')
                                                 ->where('status', '=', 'Y')->limit(4)->get();
        $specialpackages    = companyservices::where('codetagservices', '=', '5')
                                                 ->where('status', '=', 'Y')->limit(3)->get();
        $services           = informasicompanies::where('categoryinfromasi', '=', 'SERVICES')
                                                 ->where('status', '=', 'Y')->limit(3)->get();
        $testimonial        = testimonials::where('status', '=', 'Y')->limit(2)->get();
        $city               = citys::pluck('name','id');
        $services2          = services::pluck('name','id');
        return view('website.index', compact('sosialmedia','identitas','media','header','topbasecamp','specialpackages','services','testimonial','city','services2'));
    }

    public function package_list()
    {
        $sosialmedia              = sosialmedias::where('status', '=', 'Y')->get();   
        $identitas                = companies::find('1');
        $companyservices          = companyservices::orderBy('id', 'DESC')->paginate(10);
        $count_companyservices    = companyservices::count();
        $city                     = citys::pluck('name','id');
        $services                 = services::pluck('name','id');
        return view('website.package_list', compact('sosialmedia','identitas','companyservices','count_companyservices','city','services'));
    }

    public function package_search(Request $request) {
        $sosialmedia             = sosialmedias::where('status', '=', 'Y')->get();   
        $identitas                = companies::find('1');
        $companyservices          = companyservices::paginate(10);
        $count_companyservices    = companyservices::count();
        $city                     = citys::pluck('name','id');
        $services                 = services::pluck('name','id');
        
        $codeservices   = $request->input('codeservices');

        if (! empty($codeservices)) {
            // $codeservices = $request->input('codeservices');
            $codecity      = $request->input('codecity');

            // Query
            $query          = companyservices::where('codeservices', 'LIKE', '%' . $codeservices. '%');
            // (! empty($codeservices)) ? $query->where('codeservices', $codeservices) : '';
            (! empty($codecity)) ? $query->where('codecity', $codecity) : '';
            $companyservices = $query->paginate(10);

            // URL Links count_companyservices
            // $count_companyservices = (! empty($codeservices)) ? $companyservices->appends(['codeservices' => $codeservices]) : '';
            $count_companyservices = (! empty($codecity)) ? $count_companyservices = $companyservices->appends(['codecity' => $codecity]) : '';
            $count_companyservices = $companyservices->appends(['codeservices' => $codeservices]);

            $count_companyservices = $companyservices->total();
            return view('website.package_list', compact('sosialmedia','identitas','companyservices','count_companyservices','city','services','codeservices','count_companyservices'));
        }

        return redirect('package');
    }

    public function package_detail($id, $name='')
    {
        $sosialmedia              = sosialmedias::where('status', '=', 'Y')->get();   
        $identitas                = companies::find('1');
        $bookingspaces            = bookingspaces::paginate(10);
        $companyservices          = companyservices::findOrFail($id);
        $mediacompanyservices     = mediacompanyservices::where('codecompanyservices', '=', $id)
                                                 ->where('status', '=', 'Y')->get();
        return view('website.package_detail', compact('sosialmedia','identitas','companyservices','mediacompanyservices'));
    }

    public function package_searchroom(Request $request) {
        $codecompanyservices = $request->input('codecompanyservices');
        $datein        = $request->input('datein');
        $dateout       = $request->input('dateout');
        $bookingspaces = bookingspaces::where('codecompanyservices',Input::get('codecompanyservices'))
                                        ->where('datein',Input::get('datein'))
                                        ->where('dateout',Input::get('dateout'))->first();
        // $billingcompanyservices     = billingcompanyservices::where('codecompanyservices', '=', $codecompanyservices)->get();

        // $billingcompanyservices = DB::select("select * from billingcompanyservices WHERE codecompanyservices ='$codecompanyservices'");
        // foreach($billingcompanyservices as $row){}

        if (is_null($bookingspaces)) {
        // if (is_null($bookingspaces) && $row->currentquota > 0) {
        \Session::flash('success', '<b class="text-success">Available Room!</b> from <b>'.date('d F Y', strtotime($datein)).'</b> to <b>'.date('d F Y', strtotime($dateout)).'</b>');
            return redirect('/website/package/detail/'.$codecompanyservices.'/confirmation/');
        }
        \Session::flash('error', '<b class="text-danger">No Available Room!</b> from <b>'.date('d F Y', strtotime($datein)).'</b> to <b>'.date('d F Y', strtotime($dateout)).'</b>');
            return redirect('/website/package/detail/'.$codecompanyservices.'/confirmation/');
        
    }

    public function partnership($id, $name='')
    {
        $sosialmedia              = sosialmedias::where('status', '=', 'Y')->get();   
        $identitas                = companies::find('1');
        $bookingspaces            = bookingspaces::paginate(10);
        $companyservices          = companyservices::where('codecompanypartnership', '=', $id)->get();
        $companypartnership       = companypartnership::findOrFail($id);
        $mediacompanyservices     = mediacompanyservices::where('codecompanypartnership', '=', $id)
                                                 ->where('status', '=', 'Y')->get();
        return view('website.partnership', compact('sosialmedia','identitas','companypartnership','mediacompanyservices','companyservices','bookingspaces'));
    }

   public function partner()
    {
        $companypartnerships = DB::select('select max(codecompanypartnership) as idMaks from  companypartnerships');
        foreach($companypartnerships as $row3){}
        $nomor  = $row3->idMaks; 
        $noRand = (int) substr($row3->idMaks, 3, 3);
        $noRand++;  
        $char   = "COP";
        $nocomp   =  $char . sprintf("%03s", $noRand);

        $citys = DB::select('select max(codecity) as idMaks from  citys');
        foreach($citys as $row3){}
        $nomorcity  = $row3->idMaks; 
        $noRandcity = (int) substr($row3->idMaks, 3, 3);
        $noRandcity++;  
        $char   = "CIT";
        $nocity   =  $char . sprintf("%03s", $noRandcity);

        $countrys = DB::select('select max(codecountry) as idMaks from  countrys');
        foreach($countrys as $row3){}
        $nomorcountry  = $row3->idMaks; 
        $noRandcountry = (int) substr($row3->idMaks, 3, 3);
        $noRandcountry++;  
        $char   = "COU";
        $nocountry   =  $char . sprintf("%03s", $noRandcountry);

        $users = DB::select('select max(codeuser) as idMaks from users');
        foreach($users as $row3){}
        $nomoruser  = $row3->idMaks; 
        $noRanduser = (int) substr($row3->idMaks, 3, 3);
        $noRanduser++;  
        $char   = "USR";
        $nouser   =  $char . sprintf("%03s", $noRanduser);


        $sosialmedia        = sosialmedias::where('status', '=', 'Y')->get();   
        $identitas          = companies::find('1');
        $media              = media::find('4');
        $header             = informasicompanies::where('categoryinfromasi', '=', 'HEADER')
                                                 ->where('status', '=', 'Y')->limit(3)->get();
        $companypartnership = companypartnership::where('status', '=', 'Y')->get();
        return view('website.partner', compact('nocomp','nocountry','nocity','nouser','sosialmedia','identitas','media','header','companypartnership'));
    }

    

    public function about()
    {
        $sosialmedia            = sosialmedias::where('status', '=', 'Y')->get();   
        $identitas              = companies::find('1');
        $teams                  = teams::all();
        $companypartnership     = companypartnership::all();
        return view('website.about', compact('sosialmedia','identitas','teams','companypartnership'));
    }

    public function events()
    {
        $sosialmedia            = sosialmedias::where('status', '=', 'Y')->get();   
        $identitas              = companies::find('1'); 
        $categoryevents         = categoryevents::where('status', '=', 'Y')->get();       
        $events                 = events::paginate(5);
        $count_events           = events::count();
        return view('website.event', compact('sosialmedia','identitas','events','count_events','categoryevents'));
    }

    public function events_detail($id, $title='')
    {
        $sosialmedia            = sosialmedias::where('status', '=', 'Y')->get();   
        $identitas              = companies::find('1');
        $categoryevents         = categoryevents::where('status', '=', 'Y')->get();       
        $events                 = events::findOrFail($id);
        return view('website.event_detail', compact('sosialmedia','identitas','events','categoryevents'));
    }

    public function contact()
    {
        $identitas               = companies::find('1');
        $sosialmedia             = sosialmedias::where('status', '=', 'Y')->get();
        $informasicompanies      = informasicompanies::where('categoryinfromasi', '=', 'OFFICE')
                                                       ->where('status', '=', 'Y')->get(); 
        return view('website.contact', compact('sosialmedia','identitas','informasicompanies','sosialmedia'));
    }

  

    public function subscriber(Request $request)
    {
        $subscriber = subscribers::where('email',Input::get('email'))->first();
        if (is_null($subscriber)) {
            $subscriber = new subscribers;
            $subscriber->name        = '-';
            $subscriber->email       = $request->email;
            $subscriber->status      = 'N';
            $subscriber->save();
        \Session::flash('success', 'Thank you for doing Newsletter!');
        return redirect('/');
        } 
        \Session::flash('warning', 'Your email is already registered in the Newsletter!');
        return redirect('/');
    
    }

    public function messages(Request $request)
    {
            $messages = new mEssages;
            $messages->name                    = $request->name;
            $messages->email                   = $request->email;
            $messages->subject                 = $request->subject;
            $messages->description             = $request->description;
            $messages->status                  = 'N';
            $messages->save();
        \Session::flash('success', 'Thank you for doing Messages!');
        return redirect('/website/contact');
    }

    public function bookingtour(Request $request)
    {
            $bookingtour = new bookingtour;
            $bookingtour->codecompanyservices     = $request->codecompanyservices;
            $bookingtour->codecompanypartnership  = $request->codecompanypartnership;
            $bookingtour->date                    = $request->date;
            $bookingtour->time                    = $request->time;
            $bookingtour->email                   = $request->email;
            $bookingtour->phone                   = $request->phone;
            $bookingtour->status                  = 'N';
            $bookingtour->save();
        \Session::flash('success', 'Thank you for doing Booking Tour!');
        return redirect('/website/package/detail/'.$request->codecompanyservices.'/confirmation/');
    }

    public function booking($id, $name='')
    {
        $sosialmedia             = sosialmedias::where('status', '=', 'Y')->get();   
        $identitas               = companies::find('1');
        $no = rand(11111,99999);
        $companyservices          = companyservices::findOrFail($id);
        $paymentmethodes          = paymentmethodes::all();
        return view('website.booking', compact('sosialmedia','identitas','companyservices','paymentmethodes','no'));
    }

    public function bookingroom(Request $request)
    {
        $sosialmedia             = sosialmedias::where('status', '=', 'Y')->get();   
        $identitas   = companies::find('1');
        $members     = members::where('codeuser', '=', $request->input('codeuser'))
                                                 ->where('status', '=', 'Y')->limit(1)->get();
        $bookingspaces = DB::select('select max(codebookingspace) as idMaks from bookingspaces');
        foreach($bookingspaces as $row3){}
        $nomor  = $row3->idMaks; 
        $noRand = (int) substr($row3->idMaks, 3, 3);
        $noRand++;  
        $char   = "CBS";
        $no   =  $char . sprintf("%03s", $noRand);
        $data = ([
            "codecompanyservices" => $request->input('id'), 
            "price" => $request->input('price'), 
            "codeuser" => $request->input('codeuser'), 
            "datein" => $request->input('datein'), 
            "dateout" => $request->input('dateout'), 
            "name" => $request->input('name'), 
            "email" => $request->input('email'), 
            "phone" => $request->input('phone'), 
            "address" => $request->input('address'), 
            "codepaymentmethode" => $request->input('codepaymentmethode'),
            "invoice" => $request->input('no')
        ]);
        $datein     = $request->input('datein');
        $dateout    = $request->input('dateout');
        $selisih    = strtotime($dateout) -  strtotime($datein);
        $hari       = $selisih/(60*60*24);
        $total      = ($hari * $request->input('price'));

        $companyservices          = companyservices::findOrFail($request->id);
        return view('website.bookingroom', compact('sosialmedia','identitas','no','companyservices','data','hari','total','value','members'));
    }

    public function bookingsend(Request $request)
    {
        $bookingspace = new bookingspaces;
        $bookingspace->codebookingspace = $request->codebookingspace;
        $bookingspace->codecompanypartnership = $request->codecompanypartnership;
        $bookingspace->codeservices = $request->codeservices;
        $bookingspace->codecompanyservices = $request->codecompanyservices;
        $bookingspace->codeuser = $request->codeuser;
        $bookingspace->codepaymentmethode = $request->codepaymentmethode;
        $bookingspace->invoice = $request->invoice;
        $bookingspace->name = $request->name;
        $bookingspace->email = $request->email;
        $bookingspace->phone = $request->phone;
        $bookingspace->address = $request->address;
        //$bookingspace->quota = $request->quota;
        //$bookingspace->quotauser = $request->quotauser;
        $bookingspace->price   = $request->price;
        $bookingspace->totalprice = $request->totalprice;
        $bookingspace->datein = date('Y-m-d', strtotime($request->datein));
        $bookingspace->dateout= date('Y-m-d', strtotime($request->dateout));
        // $bookingspace->currentquotauser = $request->currentquotauser;
        // $bookingspace->nowquotauser = $request->nowquotauser;
        // $bookingspace->information = $request->information;
        $bookingspace->dateregister = date('Y-m-d H:i:s');
        $bookingspace->status      = 'N';
        $bookingspace->save();

        // Mail::to($request->email)->send(new Reminder);
        // Mail::to($mail2)->send(new OrderShipped);
        \Session::flash('thanks', '<p>Your confirmation number is <span class="text-primary font700">'.$request->invoice.'</span></p>');
        return redirect('/website/package/bookingroom/thanks/'.$request->invoice);
    }

    public function bookingthanks($invoice='')
    { 
        $sosialmedia            = sosialmedias::where('status', '=', 'Y')->get();   
        $identitas              = companies::find('1');       
        $bookingspaces          = bookingspaces::where('invoice', '=', $invoice)->limit(1)->get();
        return view('website.bookingthanks', compact('sosialmedia','identitas','bookingspaces'));
    }


    public function invoice_print($invoice='')
    {

        $bookingspaces          = bookingspaces::where('invoice', '=', $invoice)->limit(1)->get();
        $pdf=PDF::loadView('website.invoice_print', ['bookingspaces' => $bookingspaces]);
        return $pdf->download($invoice.'-invoice-cubicworkspace.pdf');
    }


    public function loginmember()
    {
        $sosialmedia             = sosialmedias::where('status', '=', 'Y')->get();   
        $identitas               = companies::find('1');
        $users = DB::select('select max(codeuser) as idMaks from users');
        foreach($users as $row3){}
        $nomor  = $row3->idMaks; 
        $noRand = (int) substr($row3->idMaks, 3, 3);
        $noRand++;  
        $char   = "USR";
        $no   =  $char . sprintf("%03s", $noRand);
        return view('website.login', compact('sosialmedia','identitas','no'));
    }

    public function register(Request $request)
    {
        $user = users::where('email',Input::get('email'))->first();
        if (is_null($user)) {
            $user = new users;
            $member = new members;
                $extention = Input::file('image')->getClientOriginalExtension();
                $filename = rand(11111,99999).'.'. $extention;
                $request->file('image')->move(
                    base_path() . '/public/upload/member/', $filename
                );
            $user->name = $request->name;
            $user->codeuser = $request->codeuser;
            $user->lastlogin = date('Y-m-d H:i:s');
            $user->registerdate = date('Y-m-d H:i:s');
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            $member->codeuser = $request->codeuser;
            $member->email = $request->email;
            $member->institution = $request->institution;
            $member->birthday = $request->birthday;
            $member->phone = $request->phone;
            $member->address =$request->address;
            $member->image = $filename;
            $member->description = $request->description;
            $member->information = $request->information;

            $member->save();
            $user->save();
        \Session::flash('success', 'Thank you for registering as a member!');
        return redirect('/website/loginmember');
        } 
        \Session::flash('warning', 'Your email is registered as a member!');
        return redirect('/website/loginmember');
    
    }

    // public function dashboard()
    // {
    //     $sosialmedia             = sosialmedias::where('status', '=', 'Y')->get();   
    //     $identitas               = companies::find('1');
    //     return view('website.dashboard', compact('sosialmedia','identitas'));
    // }
   
}
