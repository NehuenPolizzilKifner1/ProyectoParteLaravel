<h1>Editar Usuario</h1>

<form
method="POST"
action="{{ route(
'admin.users.update',
$user
) }}"
>

@csrf
@method('PUT')

<select name="role">

<option value="admin">
Administrador
</option>

<option value="vendor">
Vendedor
</option>

<option value="editor">
Editor
</option>

<option value="user">
Usuario
</option>

</select>

<button>
Guardar
</button>

</form>