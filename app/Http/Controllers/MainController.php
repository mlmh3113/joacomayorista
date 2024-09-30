<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MainController extends Controller
{

    public function index(){
        $products = Product::with('categories')->get();
        $categories = Category::all();
        return Inertia::render('Index', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function contact(){
        return Inertia::render('Contact');
    }
}
