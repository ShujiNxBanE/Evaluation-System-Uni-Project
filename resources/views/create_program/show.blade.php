<a href="{{ route('programs')}}">Volver a los programas</a>
<h1>
    soy la vista para ver el detalle
</h1>
<p>Descripcion: {{ $program->description }}</p>

<h3>
    Nombre de la institucion: {{ $program->institutional_data->name }}
    <br>
    Año de creacion: {{ $program->institutional_data->creation_year }}
</h3>

<h3>
    Categorias del programa
</h3>

<ul>
    @foreach ($program->categories as $category)
        <li>
            <a href="{{ route('category_evaluations', ['category' => $category->id]) }}">{{ $category->name }}</a>
        </li>
    @endforeach
</ul>


