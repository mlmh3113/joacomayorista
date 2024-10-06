<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class NewsController extends Controller
{

public function store(Request $request)
{
    $email = $request->email;

    Subscriber::create([
        'email' => $email
    ]);

    return redirect()->back()->with('success', 'Se ha registrado correctamente');
}
}