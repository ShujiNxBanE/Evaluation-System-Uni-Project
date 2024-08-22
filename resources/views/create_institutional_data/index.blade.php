<a href="{{ route('programs') }}">Volver a los programas</a>
<a href="{{ route('create_institutional_datas') }}">Crear datos institucionales</a>
<ul>
    @foreach ($institutional_datas as $institutional_data)
        <li>
            <h3>Numero de dato institucional: {{ $institutional_data->id }}</h3>
            <a href="{{ route('show_institutional_data_details', ['institutional_data' => $institutional_data->id]) }}">Detalles</a>
        </li>
    @endforeach
</ul>



