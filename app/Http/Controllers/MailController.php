<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FacturaMail;
use Inertia\Inertia;

class MailController extends Controller
{


    public function index()
    {
        return Inertia::render('Mail');
    }


    
    public function mailFactura(Request $request)
    {
        Mail::to('contacto@joacomayorista.com.ar')->send(new FacturaMail());


        return redirect()->back();
    }
}
