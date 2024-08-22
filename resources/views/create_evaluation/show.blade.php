<a href="{{ route('evaluations') }}">Volver a las evaluaciones</a>


<p>Description: {{ $evaluation->description }}</p>

<a href="{{ route('edit_evaluation', ['evaluation' => $evaluation->id]) }}">Editar Evaluacion</a>
<form action="{{ route('destroy_evaluation', ['evaluation' => $evaluation->id]) }}" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit">
        Eliminar Evaluacion
    </button>
</form>
