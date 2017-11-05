<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\Reminder;
use App\Mail\OrderShipped;

class MailController extends Controller
{
    public function testMail()
    {
    	$mail = 'nava.webdevelopers@gmail.com';
    	$mail2 = 'ketut95@gmail.com';
    	// $mail = 'ketut95@gmail.com';

    	Mail::to($mail)->send(new Reminder);
    	Mail::to($mail2)->send(new OrderShipped);

    	dd('Mail Send successfully');
    }
}
