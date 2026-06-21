<!DOCTYPE html>
<html>
<head>
    <title>Crear Vehículo</title>
</head>
<body>

<h1>Crear Vehículo</h1>

<form method="POST" action="{{ route('admin.products.store') }}">

    @csrf

    <label>Nombre</label>
    <br>
    <input type="text" name="name">
    <br><br>

    <label>Precio</label>
    <br>
    <input type="number" step="0.01" name="price">
    <br><br>

    <label>Imagen</label>
    <br>
    <input type="text" name="image">
    <br><br>

    <label>Motor</label>
    <br>
    <input type="text" name="motor">
    <br><br>

    <label>Potencia</label>
    <br>
    <input type="number" name="potencia">
    <br><br>

    <label>Aceleración</label>
    <br>
    <input type="number" step="0.1" name="aceleracion">
    <br><br>

    <label>Categoría</label>
    <br>
    <input type="text" name="category">
    <br><br>

    <button type="submit">
        Crear vehículo
    </button>

</form>

<br>

<a href="{{ route('admin.products.index') }}">
    Volver al listado
</a>

</body>
</html>