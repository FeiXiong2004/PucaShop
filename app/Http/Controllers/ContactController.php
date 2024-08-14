<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create(){
        return view('contact');
    }
    public function store(Request $request){
        $title = $request->input('title');
        $fullname = $request->input('fullname');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $messageContent = $request->input('messageContent');
        Mail::mailer()->to('hunghn2004@gmail.com')->send(new SendMail($title , $fullname , $email , $phone , $messageContent));

        return redirect()->back()->with('message','Send Email Successfully')    ;
    }
}
