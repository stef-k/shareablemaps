<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Mail\ContactReceived;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function postMail(MailRequest $request)
    {
        $email   = $request->input('email');
        $message = $request->input('message');

        Mail::to(\env('ADMIN_EMAIL'))->send(new ContactReceived($email, $message));

        return view('email-send');
    }

}
