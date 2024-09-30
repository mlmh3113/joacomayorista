<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index()
    {
        return Inertia::render('Cart/Index');
    }

    public function store(Request $request)
    {
dd($request->all());
    
    }


        
}
