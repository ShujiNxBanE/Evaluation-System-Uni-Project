<h1>
    Hola soy la vista para editar
</h1>

<form action="{{ route('update_program', ['program' => $program->id]) }}">
    @method('GET')
    @csrf
    <label for="">Nombre del programa: </label>
    <input type="text" value="{{ $program->name }}" name="name">
    <br>
    <label for="">Descripcion del programa: </label>
    <textarea name="description" cols="30" rows="4"> {{ $program->description }} </textarea>
    <br>
    <button type="submit">Actualizar</button>

</form>
