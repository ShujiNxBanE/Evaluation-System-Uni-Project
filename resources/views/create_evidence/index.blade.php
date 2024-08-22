<a href="{{ route('programs') }}">Volver a los programas</a>
<a href="{{ route('create_evidences') }}">Crear evidencias</a>
<ul>
    @foreach ($evidences as $evidence)
        <li>
            <h3>Numero de evaluacion: {{ $evidence->id }}</h3>
            <a href="{{ route('show_evidence_details', ['evidence' => $evidence->id]) }}">Detalles</a>
        </li>
    @endforeach
</ul>



