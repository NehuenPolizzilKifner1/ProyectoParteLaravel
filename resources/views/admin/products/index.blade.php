<!DOCTYPE html>
<html>
<head>
    <title>Administrar Productos</title>
</head>
<body>

<h1>Administración de Vehículos</h1>

@if(session('success'))
    <p style="color:green">
        {{ session('success') }}
    </p>
@endif

<a href="{{ route('admin.products.create') }}">
    Crear vehículo
</a>

<br><br>

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

        |

        <form
            action="{{ route('admin.products.destroy', $product) }}"
            method="POST"
            style="display:inline"
        >

            @csrf
            @method('DELETE')

            <button
                type="submit"
                onclick="return confirm('¿Eliminar este vehículo?')"
            >
                Eliminar
            </button>

        </form>

    </td>

</tr>

@endforeach

</table>

<br>

{{ $products->links() }}

</body>
</html>