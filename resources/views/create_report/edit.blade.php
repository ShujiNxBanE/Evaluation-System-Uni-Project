<a href="{{ route('show_report_details', ['report' => $report->id]) }}">Volver a los detalles</a>


<form action="{{ route('update_report', ['report' => $report->id]) }}">
    @method('GET')
    @csrf

    <label>Comentarios:</label>
    <textarea name="comments" id="" cols="30" rows="4"> {{ $report->comments }}</textarea>
    <label>Sugerencias:</label>
    <textarea name="suggestions" id="" cols="30" rows="4"> {{ $report->suggestions }} </textarea>
    <button type="submit">
        Actualizar
    </button>
</form>
