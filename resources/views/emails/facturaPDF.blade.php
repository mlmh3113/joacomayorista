<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Factura</h1>
    <p>Nombre: {{ $compra->nombre }} {{ $compra->apellidos }}</p>
    <p>DNI: {{ $compra->dni }}</p>
    <p>Dirección: {{ $compra->direccion }}</p>
    <p>Localidad: {{ $compra->localidad }}</p>
    <p>Provincia: {{ $compra->provincia }}</p>
    <p>Email: {{ $compra->email }}</p>
    <p>Teléfono: {{ $compra->telefono }}</p>
    <p>Fecha: {{ $compra->fecha }}</p>

    <h2>Productos</h2>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->name }}</td> <!-- Nombre del producto -->
                    <td>{{ $producto->pivot->cantidad }}</td>
                    <td>{{ number_format($producto->pivot->precio, 2, ',', '.') }}</td>
                    <td>{{ number_format($producto->pivot->cantidad * $producto->pivot->precio, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Detalles de descuentos y envío -->
    <h3>Detalles de la Compra</h3>
    <p>Descuentos: -{{ number_format($compra->descuento, 2, ',', '.') }}</p>
    {{-- <p>Costo de Envío: {{ number_format($compra->envio, 2, ',', '.') }}</p> --}}
    
    <h3>Total de la Compra: {{ number_format($compra->total, 2, ',', '.') }}</h3>
</body>
</html>
