<a href="{{ route('show_institutional_data_details', ['institutional_data' => $institutional_data->id]) }}">Volver a los detalles</a>


<form action="{{ route('update_institutional_data', ['institutional_data' => $institutional_data->id]) }}">
    @method('GET')
    @csrf

    <label>Nombre:</label>
    <input type="text" name="name" value="{{ $institutional_data->name }}">
    <br>
    <label>Pais:</label>
    <input type="text" name="country" value="{{ $institutional_data->country }}">
    <br>
    <label>Año de creacion:</label>
    <input type="text" name="creation_year" value="{{ $institutional_data->creation_year }}">
    <br>
    <label>Carácter de la Institución:</label>
    <input type="text" name="institution_character" value="{{ $institutional_data->institution_character }}">
    <br>

    <label>Ediciones del programa:</label>
    <input type="text" name="program_edition" value="{{ $institutional_data->program_edition }}">
    <br>

    <label>Dirección web:</label>
    <input type="text" name="web_adresss" value="{{ $institutional_data->web_adresss }}">
    <br>

    <label>Dirección postal:</label>
    <input type="text" name="postal_address" value="{{ $institutional_data->postal_address }}">
    <br>

    <label>Edición actual:</label>
    <input type="text" name="recognition_resolution" value="{{ $institutional_data->recognition_resolution }}">
    <br>

    <label>Fecha de inicio:</label>
    <input type="text" name="start_date" value="{{ $institutional_data->start_date }}">
    <br>

    <label>Fecha de culminación:</label>
    <input type="text" name="end_date" value="{{ $institutional_data->end_date }}">
    <br>

    <label>Número de Horas:</label>
    <input type="text" name="number_of_hours" value="{{ $institutional_data->number_of_hours }}">
    <br>

    {{-- <label>Total alumnos:</label>
    <input type="text" name="total_students" value="{{ $institutional_data->total_students }}">
    <br> --}}

    <label>Total personal docente:</label>
    <input type="text" name="total_teaching_staff" value="{{ $institutional_data->total_teaching_staff }}">
    <br>

    <label>Total personal administrativo:</label>
    <input type="text" name="total_administrative_staff" value="{{ $institutional_data->total_administrative_staff }}">
    <br>

    <label>Certificado a otorgar:</label>
    <input type="text" name="certificate" value="{{ $institutional_data->certificate }}">
    <br>
    <button type="submit">
        Actualizar
    </button>
</form>
