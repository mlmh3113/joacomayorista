<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use Inertia\Inertia;
use App\Mail\FacturaMail; // Importa la clase de correo
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

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
        ]);
    
        // Agregar productos a la compra
        foreach ($request->productos as $producto) {
            $compra->productos()->attach($producto['id'], [
                'cantidad' => $producto['cantidad'],
                'precio' => $producto['precio'],
            ]);
        }
    
        // Cargar los productos relacionados antes de generar el PDF
        $compra->load('productos');
    
        // Generar el PDF
        $pdf = Pdf::loadView('emails.facturaPDF', ['compra' => $compra]);
    
        // Enviar el correo con la factura PDF
        Mail::to('contacto@joacomayorista.com.ar')->send(new FacturaMail($compra, $pdf));
    
        return redirect()->back()->with('success', 'La compra se ha creado correctamente y se ha enviado la factura por correo.');
    }
    

    public function delete(Request $request)
    {
        $compra = Compra::findOrFail($request->id);
        $compra->delete();
        return redirect()->back()->with('success', 'La compra ha sido eliminada');
    }
}
