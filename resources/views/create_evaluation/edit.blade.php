<a href="{{ route('show_evaluation_details', ['evaluation' => $evaluation->id]) }}">Volver a los detalles</a>


<form action="{{ route('update_evaluation', ['evaluation' => $evaluation->id]) }}">
    @method('GET')
    @csrf

    <label>Description:</label>
    <textarea name="description" id="" cols="30" rows="4"> {{ $evaluation->description }}</textarea>
    <button type="submit">
        Actualizar
    </button>
</form>
