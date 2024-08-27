
<form action="{{ route('process_create_new_institutional_data', ['program' => $program->id]) }}">
    @method('GET')
    @csrf

    <label>Nombre de la Institución:</label>
    <input type="text" name="name" required>
    <br>

    <label>Pais:</label>
    <input type="text" name="country" required>
    <br>

    <label>Año de creacion:</label>
    <input type="text" name="creation_year" required>
    <br>

    <label>Carácter de la Institución:</label>
    <input type="text" name="institution_character" required>
    <br>

    <label>Ediciones del programa:</label>
    <input type="text" name="program_edition" required>
    <br>

    <label>Dirección web:</label>
    <input type="text" name="web_address" required placeholder="example.com">
    <br>

    <label>Dirección postal:</label>
    <input type="text" name="postal_address" required placeholder="1234">
    <br>

    <label>Resolución de reconocimiento:</label>
    <input type="text" name="recognition_resolution" required>
    <br>

    <label>Edición actual:</label>
    <input type="text" name="current_edition" required>
    <br>

    <label>Fecha de inicio:</label>
    <input type="text" name="start_date" required placeholder="2024-01-24">
    <br>

    <label>Fecha de culminación:</label>
    <input type="text" name="end_date" required placeholder="2024-12-24">
    <br>

    <label>Número de Horas:</label>
    <input type="text" name="number_of_hours" required>
    <br>

    <label>Total alumnos:</label>
    <input type="text" name="total_students" required>
    <br>

    <label>Total personal docente:</label>
    <input type="text" name="total_teaching_staff" required>
    <br>

    <label>Total personal administrativo:</label>
    <input type="text" name="total_administrative_staff" required>
    <br>

    <label>Certificado a otorgar:</label>
    <input type="text" name="certificate" required>
    <br>

    <button type="submit">
        Enviar
    </button>
</form>

<a href="{{ route('process_program', ['program' => $program->id]) }}">Atras</a>
