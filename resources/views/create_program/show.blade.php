<a href="{{ route('programs')}}">Volver a los programas</a>
<h1>
    soy la vista para ver el detalle
</h1>
<p>Descripcion: {{ $program->description }}</p>

<h3>
    @if (!$program->institutional_data == null)
        Nombre de la institucion: {{ $program->institutional_data->name }}
        <br>
        Año de creacion: {{ $program->institutional_data->creation_year }}
    @else
            Aun no hay datos institucionales
    @endif
</h3>

<h3>
    Categorias del programa
</h3>

<ul>
    @foreach ($program->categories as $category)
        <li>
            <a>{{ $category->name }}</a>
        </li>
    @endforeach
</ul>


