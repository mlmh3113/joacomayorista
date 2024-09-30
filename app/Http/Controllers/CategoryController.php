<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return Inertia::render('Category/Index', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->save();
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $category = Category::find($request->id);
        $category->delete();
        return redirect()->back();
    }
}
