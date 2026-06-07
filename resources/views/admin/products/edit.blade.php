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

    <label>Stock</label>

    <input
        type="number"
        name="stock"
        value="{{ $product->stock }}"
    >

    <br><br>

    <button type="submit">
        Guardar cambios
    </button>

</form>

</body>
</html>