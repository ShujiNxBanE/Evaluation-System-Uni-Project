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
        <a href="{{ route('admin_show_evidences', ['program' => $program->id, 'category' => $category->id, 'evaluation' => $evaluation->id]) }}">Ver evidencias</a>
        @if (isset($reports[$evaluation->id]))
            <a href="{{ route('admin_show_report', ['program' => $program->id, 'category' => $category->id, 'evaluation' => $evaluation->id, 'report' => $reports[$evaluation->id]->id]) }}">Ver reporte</a>
        @else
            <span>Aun no hay reporte</span>
        @endif
    @endforeach
</h3>
<a href="{{ route('admin_show_program', ['program' => $program->id]) }}">Atras</a>
