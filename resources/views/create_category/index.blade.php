<a href="{{ route('programs')}}">Volver a Programas</a>


<a href="{{ route('create_categories') }}">Crear nueva categoria</a>


<ul>
    @foreach ($categories as $category)
        <li>
            <h3>
                <a href="{{ route('show_category_details', ['category' => $category->id]) }}">Nombre: {{ $category->name }}</a></h3>
        </li>
    @endforeach
</ul>
