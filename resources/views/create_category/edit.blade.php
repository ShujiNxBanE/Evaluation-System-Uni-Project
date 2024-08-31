<a href="{{ route('show_category_details', ['category' => $category->id]) }}">Volver a los detalles</a>

<form action="{{ route('update_category', ['category' => $category->id]) }}">
    @method('GET')
    @csrf
    <label> Nombre: </label>
    <input type="text" name="name" value="{{$category->name}}" maxlength="255">
    <br>
    <label> Descripcion </label>
    <input type="text" name="description" value="{{$category->description}}" maxlength="255">
    <br>
    <button type="submit">Actualizar</button>
</form>
