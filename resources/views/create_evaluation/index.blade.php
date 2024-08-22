<a href="{{ route('programs') }}">Volver a los programas</a>
<a href="{{ route('create_evaluations') }}">Crear evaluacion</a>
<ul>
    @foreach ($evaluations as $evaluation)
        <li>
            <h3>Numero de evaluacion: {{ $evaluation->id }}</h3>
            <a href="{{ route('show_evaluation_details', ['evaluation' => $evaluation->id]) }}">Detalles</a>
        </li>
    @endforeach
</ul>

{{ $evaluations->links() }}

