<!DOCTYPE html>
<html>
<head>
    <title>Administrar Productos</title>
</head>
<body>

<h1>Administración de Vehículos</h1>

<table border="1">

<tr>
    <th>SKU</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Stock</th>
    <th>Acciones</th>
</tr>

@foreach($products as $product)

<tr>

    <td>{{ $product->sku }}</td>

    <td>{{ $product->name }}</td>

    <td>{{ $product->price }}</td>

    <td>{{ $product->stock }}</td>

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