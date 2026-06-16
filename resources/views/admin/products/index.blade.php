<!DOCTYPE html>
<html>
<head>
    <title>Administrar Productos</title>
</head>
<body>

<h1>Administración de Vehículos</h1>

<table border="1">

<tr>
    <th>Nombre</th>
    <th>Motor</th>
    <th>Potencia</th>
    <th>Aceleración</th>
    <th>Precio</th>
    <th>Acciones</th>
</tr>

@foreach($products as $product)

<tr>

    <td>{{ $product->name }}</td>

    <td>{{ $product->motor }}</td>

    <td>{{ $product->potencia }} CV</td>

    <td>{{ $product->aceleracion }} s</td>

    <td>{{ number_format($product->price, 0, ',', '.') }} €</td>

    <td>
        <a href="{{ route('admin.products.edit', $product) }}">
            Editar
        </a>
    </td>

</tr>

@endforeach

</table>

{{ $products->links() }}

</body>
</html>