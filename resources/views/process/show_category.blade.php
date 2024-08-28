
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
        <a href="">Subir evidencias</a>
        <a href="">Realizar reporte</a>
    @endforeach
</h3>
<a href="{{ route('process_program' , ['program' => $program->id]) }}">Atras</a>
