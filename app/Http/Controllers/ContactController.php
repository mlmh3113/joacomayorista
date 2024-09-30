<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function store(Request $request)
    {

        Mail::to('contacto@nvnwebdesing.com')->send(new ContactMail($request->name, $request->email, $request->phone, $request->msg));

    }
}
