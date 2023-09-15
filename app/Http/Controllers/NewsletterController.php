<?php

namespace App\Http\Controllers;

use Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class NewsletterController extends Controller
{
    
    public function subscribe(Request $request) {
        $request->validate([
            'email' => 'required|email'
        ]);
        $email = $request->email;
        if(!Newsletter::isSubscribed($email)) {
            Newsletter::subscribe($email);
        }
        Session::flash('success', 'Thank you for subscribing to out newsletter');
        return redirect()->back();
    }

    public function showContactForm() {
        return view('contact');
    }

    public function contact(Request $request) {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $text = $request->message;

        Mail::send('contact_email', ['text' => $text], function ($mail) use ($name, $email, $subject, $text) {
            $mail->from($email, $name);
            $mail->to('blendpajaziti.7@gmail.com');
            $mail->subject($subject);
        });
        Session::flash('success', 'Thank you for contacting us');
        return redirect()->back();
    }

}
