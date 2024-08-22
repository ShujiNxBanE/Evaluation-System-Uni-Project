<a href="{{ route('evidences')}}">Volver a las evaluaciones</a>

<form action="{{ route('create_new_evidence')}}">
    @method('GET')
    @csrf

    <label>Description:</label>
    <textarea name="description" id="" cols="30" rows="4"></textarea>
    <button type="submit">
        Crear
    </button>
</form>
