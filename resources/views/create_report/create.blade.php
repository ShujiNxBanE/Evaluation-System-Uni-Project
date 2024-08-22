<a href="{{ route('reports')}}">Volver a los reportes</a>

<form action="{{ route('create_new_report')}}">
    @method('GET')
    @csrf

    <label>Comentarios:</label>
    <textarea name="comments" id="" cols="30" rows="4"></textarea>
    <label>Sugerencias:</label>
    <textarea name="suggestions" id="" cols="30" rows="4"></textarea>
    <button type="submit">
        Crear
    </button>
</form>
