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
    <a href="{{ route('process_create_institutional_data', ['program' => $program->id]) }}">Llenar Datos Institucionales</a>
@else
    <a href="{{ route('process_edit_institutional_data', ['program' => $program->id]) }}">Modificar Datos Institucionales</a>
@endif


<h3>
    Categorias del programa
</h3>
<ul>
    @foreach ($program->categories as $category)
        <li>
            <a href="{{ route('admin_show_category', ['program' => $program->id, 'category' => $category->id]) }}">
                {{ $category->name }}
            </a>
            | Puntaje total: {{ $category->total_score }} / {{ $category->max_score }}
        </li>
    @endforeach
</ul>

<h2>Puntajes totales</h2>
<p>Puntaje Total: {{ $totalScore }}</p>
<p>Puntaje Máximo: {{ $totalMaxScore }}</p>

<a href="{{ route('programs')}}">Volver a los programas</a>
