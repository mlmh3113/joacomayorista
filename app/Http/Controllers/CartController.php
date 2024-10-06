<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use Inertia\Inertia;

class CartController extends Controller
{
    public function index()
    {
        return Inertia::render('Cart/Index');
    }

    public function store(Request $request)
    {
        // Crear la compra
        $compra = Compra::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellido,
            'dni' => $request->dni,
            'direccion' => $request->direccion,
            'localidad' => $request->localidad,
            'provincia' => $request->provincia,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'fecha' => now(),
            'total' => $request->total,
            // Si tienes otros campos en la tabla compras, agrégalo aquí
        ]);

        foreach ($request->productos as $producto) {
            $compra->productos()->attach($producto['id'], [
                'cantidad' => $producto['cantidad'],
                'precio' => $producto['precio'],
            ]);
        }
    

        return redirect()->back()->with('success', 'La compra se ha creado correctamente');
    }

    public function delete(Request $request)
    {
        $compra = Compra::findOrFail($request->id);
        $compra->delete();
        return redirect()->back()->with('success', 'La compra ha sido eliminada');
    }
}
