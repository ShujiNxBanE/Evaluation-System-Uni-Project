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
    <label for="">Seleccione al usuario que desee asignarle el programa</label>
        <br>
        <p>Nota: Si no desea asignar el programa aun no seleccione ninguno.</p>
        <select name="user_id" class="form-control" required>

            <option value="{{ Auth::user()->role_id }}">Seleccione un usario</option>

            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    <button type="submit">Actualizar</button>
</form>
