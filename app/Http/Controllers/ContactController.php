<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact() {
        return view('contact');
    }

    public function store(Request $request) {
        $data = $request->all();

        Mail::to($data['email'])->send(new ContactMail($data));
        
        return redirect()->route('home')->with('success', 'Email inviata correttamente!');
    }
}
