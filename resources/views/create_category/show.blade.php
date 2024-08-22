<a href="{{ route('categories' )}}">Volver a las categorias</a>

<h3>Nombre de la categoria: {{ $category->name }}</h3>
<br>
<p>Descripcion: {{ $category->description }}</p>

<a href="{{ route('edit_category', ['category' => $category->id]) }}">Editar Categoria</a>

<form action="{{ route('destroy_category', ['category' => $category->id]) }}" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit">
        Eliminar Categoria
    </button>
</form>

