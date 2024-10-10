<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura de Compra</title>
</head>
<body>
    <h1>Gracias por tu compra, {{ $compra->nombre }}!</h1>
    <p>Detalles de tu compra:</p>
    <ul>
        <li>Nombre: {{ $compra->nombre }}</li>
        <li>Apellidos: {{ $compra->apellidos }}</li>
        <li>DNI: {{ $compra->dni }}</li>
        <li>Dirección: {{ $compra->direccion }}</li>
        <li>Localidad: {{ $compra->localidad }}</li>
        <li>Provincia: {{ $compra->provincia }}</li>
        <li>Email: {{ $compra->email }}</li>
        <li>Teléfono: {{ $compra->telefono }}</li>
        
        <!-- Mostrar el descuento -->
        <li>Descuento: ${{ $compra->descuento }}</li>

        <!-- Mostrar el gasto de envío -->
        <li>Costo de Envío: ${{ $compra->envio }}</li>

        <!-- Mostrar el total después del descuento y el costo de envío -->
        <li>Total: ${{ $compra->total }}</li>
    </ul>
</body>
</html>
