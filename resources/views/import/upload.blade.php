<!DOCTYPE html>
<html>
<head>
    <title>Importar Vehículos</title>
</head>
<body>

<h1>Importar catálogo</h1>

@if(session('success'))
    <p style="color:green">
        {{ session('success') }}
    </p>
@endif

@if($errors->any())
    <ul style="color:red">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('products.import') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <input type="file" name="excel">

    <button type="submit">
        Importar
    </button>

</form>

</body>
</html>