<a href="{{ route('institutional_datas')}}">Volver a los datos institucionales</a>

<form action="{{ route('create_new_institutional_data')}}">
    @method('GET')
    @csrf

    <label>Nombre:</label>
    <input type="text" name="name">
    <br>
    <label>Pais:</label>
    <input type="text" name="country">
    <br>
    <label>Año de creacion:</label>
    <input type="text" name="creation_year">
    <br>
    <label>Carácter de la Institución:</label>
    <input type="text" name="institution_character">
    <br>

    <label>Ediciones del programa:</label>
    <input type="text" name="program_edition">
    <br>

    <label>Dirección web:</label>
    <input type="text" name="web_adresss">
    <br>

    <label>Dirección postal:</label>
    <input type="text" name="postal_address">
    <br>

    <label>Edición actual:</label>
    <input type="text" name="recognition_resolution">
    <br>

    <label>Fecha de inicio:</label>
    <input type="text" name="start_date">
    <br>

    <label>Fecha de culminación:</label>
    <input type="text" name="end_date">
    <br>

    <label>Número de Horas:</label>
    <input type="text" name="number_of_hours">
    <br>

    {{-- <label>Total alumnos:</label>
    <input type="text" name="total_teaching_staff">
    <br> --}}

    <label>Total personal docente:</label>
    <input type="text" name="total_teaching_staff">
    <br>

    <label>Total personal administrativo:</label>
    <input type="text" name="total_administrative_staff">
    <br>

    <label>Certificado a otorgar:</label>
    <input type="text" name="certificate">
    <br>
    <button type="submit">
        Crear
    </button>
</form>
