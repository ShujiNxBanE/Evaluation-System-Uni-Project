<a href="{{ route('institutional_datas') }}">Volver a los datos institucionales</a>


<p>{{ $institutional_data->name }}</p>
<p>{{ $institutional_data->country}}</p>
<p>{{ $institutional_data->creation_year}}</p>
<p>{{ $institutional_data->institution_character}}</p>
<p>{{ $institutional_data->program_edition}}</p>
<p>{{ $institutional_data->web_adresss}}</p>
<p>{{ $institutional_data->postal_address}}</p>
<p>{{ $institutional_data->recognition_resolution}}</p>
<p>{{ $institutional_data->start_date}}</p>
<p>{{ $institutional_data->end_date}}</p>
<p>{{ $institutional_data->number_of_hours}}</p>
<p>{{ $institutional_data->total_teaching_staff}}</p>
<p>{{ $institutional_data->total_administrative_staff}}</p>
<p>{{ $institutional_data->certificate}}</p>

<a href="{{ route('edit_institutional_data', ['institutional_data' => $institutional_data->id]) }}">Editar Dato Institucional</a>
<form action="{{ route('destroy_institutional_data', ['institutional_data' => $institutional_data->id]) }}" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit">
        Eliminar Dato institucional
    </button>
</form>
