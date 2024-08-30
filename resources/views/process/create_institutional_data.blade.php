<form action="{{ route('process_create_new_institutional_data', ['program' => $program->id]) }}"
    id="dateForm">
    @method('GET')
    @csrf

    <label>Nombre de la Institución:</label>
    <input type="text" name="name" required maxlength="255">
    <br>

    <label>Pais:</label>
    <input type="text" name="country" required maxlength="255">
    <br>

    <label>Año de creacion:</label>
    <input type="number" min="0" inputmode="numeric" name="creation_year" required maxlength="4">
    <br>

    <label>Carácter de la Institución:</label>
    <input type="text" name="institution_character" required maxlength="255">
    <br>

    <label>Ediciones del programa:</label>
    <input type="number" min="0" inputmode="numeric" name="program_edition" required maxlength="10">
    <br>

    <label>Dirección web:</label>
    <input type="text" name="web_address" required placeholder="example.com" maxlength="255">
    <br>

    <label>Dirección postal:</label>
    <input type="text" name="postal_address" required placeholder="1234" maxlength="255">
    <br>

    <label>Resolución de reconocimiento:</label>
    <input type="text" name="recognition_resolution" required maxlength="255">
    <br>

    <label>Edición actual:</label>
    <input type="number" min="0" inputmode="numeric" name="current_edition" required maxlength="10">
    <br>

    <label>Fecha de inicio:</label>
    <input type="date" name="start_date" required placeholder="2024-01-24" id="start_date">
    <br>

    <label>Fecha de culminación:</label>
    <input type="date" name="end_date" required placeholder="2024-12-24" id="end_date">
    <br>

    <label>Número de Horas:</label>
    <input type="number" min="0" inputmode="numeric" name="number_of_hours" required maxlength="10">
    <br>

    <label>Total alumnos:</label>
    <input type="number" min="0" inputmode="numeric" name="total_students" required maxlength="10">
    <br>

    <label>Total personal docente:</label>
    <input type="number" min="0" inputmode="numeric" name="total_teaching_staff" required maxlength="10">
    <br>

    <label>Total personal administrativo:</label>
    <input type="number" min="0" inputmode="numeric" name="total_administrative_staff" required maxlength="10">
    <br>

    <label>Certificado a otorgar:</label>
    <input type="text" name="certificate" required maxlength="255">
    <br>

    <button type="submit">
        Enviar
    </button>
</form>
<x-validateDate />
<a href="{{ route('process_program', ['program' => $program->id]) }}">Atras</a>


