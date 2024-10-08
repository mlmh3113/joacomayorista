<!DOCTYPE html>
<html>
<head>
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
        <li>Total: ${{ $compra->total }}</li>
    </ul>
</body>
</html>
