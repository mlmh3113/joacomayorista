<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('categories')->get();
        $categories = Category::all();
        return Inertia::render('Product/Index', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return Inertia::render('Product/Create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        // Crear el producto sin validaciones
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->color = $request->color;
        $product->caracteristics = $request->caracteristics;
        $product->main_image = $request->main_image;
        $product->images = json_encode($request->images);

        $product->save();

        // Asignar las categorías usando la relación pivot
        $product->categories()->attach($request->category_id);

        return redirect()->back()->with('success', 'Producto creado exitosamente');
    }

    public function edit($id)
    {
        $product = Product::with('categories')->findOrFail($id);
        $categories = Category::all();
        return Inertia::render('Product/Edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }


    public function show($id)
    {
        $product = Product::with('categories')->findOrFail($id);
        return Inertia::render('Product/Show', [
            'product' => $product
        ]);
    }

    public function update(Request $request, $id)
    {
        
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->color = $request->color;
        $product->caracteristics = $request->caracteristics;
        $product->main_image = $request->main_image;
        $product->images = json_encode($request->images);
        
        $product->save();


        $product->categories()->sync($request->category_id);

        return redirect()->route('product.show', $product->id)
            ->with('success', 'Producto actualizado correctamente');
    }

    public function delete(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->delete();
        return redirect()->back()->with('success', 'Producto eliminado correctamente');
    }
    public function search(Request $request)
    {
        // Convertimos el término de búsqueda a minúsculas y lo obtenemos
        $searchTerm = $request->search;
    
        // Extraemos las primeras letras del término de búsqueda para abarcar tanto "reloj" como "relojes"
        $searchTermBase = substr($searchTerm, 0, 4); // Se puede ajustar el número de caracteres
    
        // Búsqueda de productos que coincidan con el término de búsqueda, incluyendo el campo characteristics
        $products = Product::with('categories')
            ->where(function($query) use ($searchTerm, $searchTermBase) {
                $query->where('name', 'like', '%' . $searchTerm . '%')
                      ->orWhere('name', 'like', '%' . $searchTermBase . '%')
                      ->orWhere('caracteristics', 'like', '%' . $searchTerm . '%')
                      ->orWhere('caracteristics', 'like', '%' . $searchTermBase . '%');
            })
            ->get();
    
        $categories = Category::all();
    
        // Retorna la vista con los productos y sus categorías
        return Inertia::render('Product/Search', [
            'products' => $products,
            'categories' => $categories
        ]);
    }
    

    public function searchByCategory(Request $request)
    {
        $products = Product::with('categories')
            ->whereHas('categories', function ($query) use ($request) {
                $query->where('name', $request->category);
            })
            ->get();
    
        $categories = Category::all();
    
        return Inertia::render('Product/Search', [
            'products' => $products,
            'categories' => $categories
        ]);
    }




}
