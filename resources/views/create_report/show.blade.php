<a href="{{ route('reports') }}">Volver a los reportes</a>


<h3>Comentarios:</h3>
<p>{{ $report->comments }}</p>
<h3>Sugerencias:</h3>
<p>{{ $report->suggestions }}</p>

<a href="{{ route('edit_report', ['report' => $report->id]) }}">Editar Evidencia</a>
<form action="{{ route('destroy_report', ['report' => $report->id]) }}" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit">
        Eliminar Reporte
    </button>
</form>
