    <h1>
        Hola soy la vista para crear
    </h1>

    <form action="{{ route('create_new_program') }}">
        @method('GET')
        @csrf
        <label for="">Nombre del programa: </label>
        <input type="text" placeholder="nombre" name="name">
        <br>
        <label for="">Descripcion del programa: </label>
        <textarea name="description" id="" cols="30" rows="4"></textarea>
        <br>
        <button type="submit">Crear</button>

    </form>
