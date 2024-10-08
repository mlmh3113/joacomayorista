<!DOCTYPE html>
<html>
<head>
    <title>Factura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Factura</h1>
    <p><strong>Nombre:</strong> {{ $compra->nombre }} {{ $compra->apellidos }}</p>
    <p><strong>DNI:</strong> {{ $compra->dni }}</p>
    <p><strong>Dirección:</strong> {{ $compra->direccion }}</p>
    <p><strong>Localidad:</strong> {{ $compra->localidad }}</p>
    <p><strong>Provincia:</strong> {{ $compra->provincia }}</p>
    <p><strong>Email:</strong> {{ $compra->email }}</p>
    <p><strong>Teléfono:</strong> {{ $compra->telefono }}</p>
    <p><strong>Total:</strong> ${{ number_format($compra->total, 2) }}</p>

    <h2>Productos</h2>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($compra->productos as $producto)
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->pivot->cantidad }}</td>
                    <td>${{ number_format($producto->pivot->precio, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
