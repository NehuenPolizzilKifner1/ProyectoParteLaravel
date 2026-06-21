<h1>Gestión de Comentarios</h1>

<table border="1">

<tr>
    <th>Usuario</th>
    <th>Vehículo</th>
    <th>Estrellas</th>
    <th>Comentario</th>
    <th>Acciones</th>
</tr>

@foreach($reviews as $review)

<tr>

<td>{{ $review->user->name }}</td>

<td>{{ $review->product->name }}</td>

<td>{{ $review->stars }}</td>

<td>{{ $review->comment }}</td>

<td>

<a href="{{ route(
    'admin.reviews.edit',
    $review
) }}">
Editar
</a>

<form
method="POST"
action="{{ route(
'admin.reviews.destroy',
$review
) }}"
>

@csrf
@method('DELETE')

<button>
Eliminar
</button>

</form>

</td>

</tr>

@endforeach

</table>