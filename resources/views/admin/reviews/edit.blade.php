<h1>Editar Comentario</h1>

<form
method="POST"
action="{{ route(
'admin.reviews.update',
$review
) }}"
>

@csrf
@method('PUT')

<label>Estrellas</label>

<input
type="number"
name="stars"
value="{{ $review->stars }}"
min="1"
max="5"
>

<br><br>

<label>Comentario</label>

<textarea
name="comment"
rows="5"
cols="50"
>{{ $review->comment }}</textarea>

<br><br>

<button>
Guardar
</button>

</form>