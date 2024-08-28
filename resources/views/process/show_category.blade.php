<h2>
    Programa: {{ $program->name }}
</h2>

<h3>
    @php
        $counter = 1;
    @endphp
    @foreach ($evaluations as $evaluation)
        <p> {{ $counter }} - {{ $evaluation->description }}</p>
        @php
            $counter++;
        @endphp
        <a href="{{ route('process_create_evidence', ['program' => $program->id, 'category' => $category->id, 'evaluation' => $evaluation->id]) }}">Subir evidencias</a>
        @if (isset($reports[$evaluation->id]))
            <a href="{{ route('process_edit_report', ['program' => $program->id, 'category' => $category->id, 'evaluation' => $evaluation->id, 'report' => $reports[$evaluation->id]->id]) }}">Modificar reporte</a>
        @else
            <a href="{{ route('process_create_report', ['program' => $program->id, 'category' => $category->id, 'evaluation' => $evaluation->id]) }}">Realizar reporte</a>
        @endif
    @endforeach
</h3>
<a href="{{ route('process_program', ['program' => $program->id]) }}">Atras</a>
