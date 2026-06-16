<!DOCTYPE html>
<html>
<head>
    <title>Editar Vehículo</title>
</head>
<body>

<h1>Editar Vehículo</h1>

<form
    method="POST"
    action="{{ route('admin.products.update', $product) }}"
>

    @csrf
    @method('PUT')

    <label>Nombre</label>
    <input
        type="text"
        name="name"
        value="{{ $product->name }}"
    >

    <br><br>

    <label>Precio</label>
    <input
        type="number"
        step="0.01"
        name="price"
        value="{{ $product->price }}"
    >

    <br><br>

    <label>Imagen</label>
    <input
        type="text"
        name="image"
        value="{{ $product->image }}"
    >

    <br><br>

    <label>Motor</label>
    <input
        type="text"
        name="motor"
        value="{{ $product->motor }}"
    >

    <br><br>

    <label>Potencia</label>
    <input
        type="text"
        name="potencia"
        value="{{ $product->potencia }}"
    >

    <br><br>

    <label>Aceleración</label>
    <input
        type="text"
        name="aceleracion"
        value="{{ $product->aceleracion }}"
    >

    <br><br>

    <label>Categoría</label>
    <input
        type="text"
        name="category"
        value="{{ $product->category }}"
    >

    <br><br>

    <button type="submit">
        Guardar cambios
    </button>

</form>

</body>
</html>