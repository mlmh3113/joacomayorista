<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Inertia\Inertia;

class BannerController extends Controller
{
    public function index()
    {
        return Inertia::render('Banner/Index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'images' => 'required',
        ]);
    
        // Eliminar todos los registros de la tabla antes de guardar el nuevo
        Banner::truncate();
    
        $banner = new Banner();
        $banner->images = json_encode($request->images);
        $banner->save();
    
        return redirect()->back();
    }
    
}
