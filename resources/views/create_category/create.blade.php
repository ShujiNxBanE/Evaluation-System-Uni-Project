<a href="{{ route('categories' )}}">Volver a las Categorias</a>

<form action="{{ route('create_new_category') }}">
    @method('GET')
    @csrf
    <label> Nombre: </label>
    <input type="text" name="name" maxlength="255">
    <br>
    <label> Descripcion </label>
    <input type="text" name="description" maxlength="255">
    <br>
    <button type="submit">Crear</button>
</form>
