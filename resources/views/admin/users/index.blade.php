<h1>Usuarios</h1>

<table border="1">

<tr>
    <th>Nombre</th>
    <th>Email</th>
    <th>Rol</th>
    <th>Acciones</th>
</tr>

@foreach($users as $user)

<tr>

<td>{{ $user->name }}</td>

<td>{{ $user->email }}</td>

<td>{{ $user->role }}</td>

<td>

<a href="{{ route(
'admin.users.edit',
$user
) }}">
Editar
</a>

</td>

</tr>

@endforeach

</table>