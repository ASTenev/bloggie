<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormEmail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ];

        Mail::to('your-email-address@example.com')->send(new ContactFormEmail($data));

        return redirect('/contact')->with('success', 'Your message has been sent.');
    }
}
