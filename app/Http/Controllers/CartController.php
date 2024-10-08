<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use Inertia\Inertia;
use App\Mail\FacturaMail; // Importa el Mailable
use Illuminate\Support\Facades\Mail; // Importa la fachada Mail

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

        // Enviar el correo con los detalles de la compra
        Mail::to($request->email)->send(new FacturaMail($compra));

        return redirect()->back()->with('success', 'La compra se ha creado correctamente y se ha enviado un correo de confirmación.');
    }

    public function delete(Request $request)
    {
        $compra = Compra::findOrFail($request->id);
        $compra->delete();
        return redirect()->back()->with('success', 'La compra ha sido eliminada');
    }
}
