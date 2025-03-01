<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function welcomeEmail(Request $request){
        $ip = $request->getClientIp(true);
        $toEmail = 'theopensly@gmail.com';
        $message = 'welcome to my first laravel mail '.$ip.'';
        $subject = 'welcome to shop';
        
        $res = Mail::to($toEmail)->send(new WelcomeEmail($subject,$message));

        // dd($res);
        return 'sent';
    }

    public function view(){
        
        return view('mail.template');
        
    }
}