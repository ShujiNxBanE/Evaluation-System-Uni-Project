<h2>
    Nombre del programa: {{ $program->name }}
</h2>

<h3>
    @if ($institutional_data == null)
        Aun no hay datos institucionales.
    @else
        Nombre de institucion: {{ $institutional_data->name }}
        <br>
        Año de creacion: {{ $institutional_data->creation_year }}
    @endif
</h3>

@if ($institutional_data == null)
    <a href="{{ route('process_create_institutional_data', ['program' => $program->id]) }}">LLenar Datos Institucionales</a>
@else
    <a href="{{ route('process_edit_institutional_data', ['program' => $program->id]) }}">Modificar Datos Institucionales</a>
@endif


<h3>
    Categorias del programa
</h3>
<ul>
    @foreach ($program->categories as $category)
        <li>
            <a href="">{{ $category->name }}</a>
        </li>
    @endforeach
</ul>

<a href="{{ route('process_index')}}">Volver a los programas</a>
