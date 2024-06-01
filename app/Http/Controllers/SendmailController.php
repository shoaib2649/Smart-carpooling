<?php

namespace App\Http\Controllers;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;


class SendmailController extends Controller
{
  public function sendEmail()
{
    $maildata=[
    	'tittle'=>'ShebiCarpooling',
    	'body'=>'This email is testing purpose are you agree'
    ];
    Mail::to('sunnymalik6772@gmail.com')->send(new SendMail($maildata));
   // return redirect('/send');
} 
}
