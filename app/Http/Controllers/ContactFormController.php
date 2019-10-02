<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{

    public function create() {

        return view('contact.create');

    }


    public function store() {

        $data = request()->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        // Send An Email
        Mail::to('test@test.com')->send(new ContactFormMail($data));

        // Second way of sending a flash message:
        // session()->flash('message', 'Thanks for your message. We\'ll be in touch.');

        return redirect('/contact')
                ->with('message', 'Thanks for your message. We\'ll be in touch.');
    }


}
