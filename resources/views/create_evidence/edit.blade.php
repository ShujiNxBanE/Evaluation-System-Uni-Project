<a href="{{ route('show_evidence_details', ['evidence' => $evidence->id]) }}">Volver a los detalles</a>


<form action="{{ route('update_evidence', ['evidence' => $evidence->id]) }}">
    @method('GET')
    @csrf

    <label>Description:</label>
    <textarea name="description" id="" cols="30" rows="4"> {{ $evidence->description }}</textarea>
    <button type="submit">
        Actualizar
    </button>
</form>
