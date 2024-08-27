
@if ($institutional_data == null)
    <a href="{{ route('process_create_institutional_data', ['program' => $program->id]) }}">LLenar Datos Institucionales</a>
@else
    <a href="">Modificar Datos Institucionales</a>
@endif

<h2>
    Nombre del programa: {{ $program->name }}
</h2>

<ul>
    @foreach ($program->categories as $category)
        <li>
            <a href="">{{ $category->name }}</a>
        </li>
    @endforeach
</ul>

<a href="{{ route('process_index')}}">Volver a los programas</a>
