<!-- resources/views/emails/facturaPDF.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura de Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        h2 {
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>Factura de Compra</h1>
<p><strong>Nombre:</strong> {{ $compra->nombre }} {{ $compra->apellidos }}</p>
<p><strong>DNI:</strong> {{ $compra->dni }}</p>
<p><strong>Dirección:</strong> {{ $compra->direccion }}</p>
<p><strong>Localidad:</strong> {{ $compra->localidad }}</p>
<p><strong>Provincia:</strong> {{ $compra->provincia }}</p>
<p><strong>Email:</strong> {{ $compra->email }}</p>
<p><strong>Teléfono:</strong> {{ $compra->telefono }}</p>
<p><strong>Fecha:</strong> {{ $compra->fecha }}</p>

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
        @foreach ($compra->productos as $producto)
        <tr>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->pivot->cantidad }}</td>
            <td>{{ number_format($producto->pivot->precio, 2, ',', '.') }}</td>
            <td>{{ number_format($producto->pivot->cantidad * $producto->pivot->precio, 2, ',', '.') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<p><strong>Total de la Compra:</strong> {{ number_format($compra->total, 2, ',', '.') }}</p>

</body>
</html>
