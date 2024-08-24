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
