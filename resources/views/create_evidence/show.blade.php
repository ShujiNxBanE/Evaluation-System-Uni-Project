<a href="{{ route('evidences') }}">Volver a las evidencias</a>


<p>Description: {{ $evidence->description }}</p>


<a href="{{ route('edit_evidence', ['evidence' => $evidence->id]) }}">Editar Evidencia</a>
<form action="{{ route('destroy_evidence', ['evidence' => $evidence->id]) }}" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit">
        Eliminar Evidencia
    </button>
</form>
