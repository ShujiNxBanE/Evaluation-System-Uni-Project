<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario de Datos Institucionales</title>
    <script src="{{ asset('css/tailwindCss.js') }}"></script>
    <link rel="icon" href="{{ asset('portafolio.png') }}" type="image/png">
</head>
<body class="bg-gray-100 text-gray-900">
    <!-- Botón de Atrás -->
    <div class="absolute top-4 left-4 z-10">
        <button type="button"
            onclick="window.location.href='{{ route('process_program', ['program' => $program->id]) }}'"
            class="bg-gray-300 hover:bg-gray-200 text-gray-900 px-4 py-2 rounded-md text-sm flex items-center">
            <img src="{{ asset('resources/flecha-izquierda-azul.png') }}" alt="Atrás" class="w-5 h-auto">
            <span class="ml-2">Atrás</span>
        </button>
    </div>

    <!-- User Logout Component -->
    <x-user_logout class="absolute top-4 right-4 z-10"/>

    <!-- Main Content -->
    <div class="flex justify-center items-center min-h-screen px-4">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md mt-24 mb-8">
            <h2 class="text-xl font-semibold mb-4 text-center">Actualizar Datos Institucionales</h2>
            <form action="{{ route('process_update_institutional_data', ['program' => $program->id]) }}" method="GET">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre de la Institución:</label>
                    <input type="text" name="name" id="name" value="{{ $institutional_data->name }}" required maxlength="255"
                        class="mt-1 block w-full bg-gray-100 text-gray-900 border border-gray-300 rounded-md py-2 px-3">
                </div>

                <div class="mb-4">
                    <label for="country" class="block text-sm font-medium text-gray-700">País:</label>
                    <input type="text" name="country" id="country" value="{{ $institutional_data->country }}" required maxlength="255"
                        class="mt-1 block w-full bg-gray-100 text-gray-900 border border-gray-300 rounded-md py-2 px-3">
                </div>

                <div class="mb-4">
                    <label for="creation_year" class="block text-sm font-medium text-gray-700">Año de creación:</label>
                    <input type="number" min="0" inputmode="numeric" name="creation_year" id="creation_year" value="{{ $institutional_data->creation_year }}" required maxlength="4"
                        class="mt-1 block w-full bg-gray-100 text-gray-900 border border-gray-300 rounded-md py-2 px-3">
                </div>

                <div class="mb-4">
                    <label for="institution_character" class="block text-sm font-medium text-gray-700">Carácter de la Institución:</label>
                    <input type="text" name="institution_character" id="institution_character" value="{{ $institutional_data->institution_character }}" required maxlength="255"
                        class="mt-1 block w-full bg-gray-100 text-gray-900 border border-gray-300 rounded-md py-2 px-3">
                </div>

                <div class="mb-4">
                    <label for="program_edition" class="block text-sm font-medium text-gray-700">Ediciones del programa:</label>
                    <input type="number" min="0" inputmode="numeric" name="program_edition" id="program_edition" value="{{ $institutional_data->program_edition }}" required maxlength="10"
                        class="mt-1 block w-full bg-gray-100 text-gray-900 border border-gray-300 rounded-md py-2 px-3">
                </div>

                <div class="mb-4">
                    <label for="web_address" class="block text-sm font-medium text-gray-700">Dirección web:</label>
                    <input type="text" name="web_address" id="web_address" value="{{ $institutional_data->web_address }}" required placeholder="example.com" maxlength="255"
                        class="mt-1 block w-full bg-gray-100 text-gray-900 border border-gray-300 rounded-md py-2 px-3">
                </div>

                <div class="mb-4">
                    <label for="postal_address" class="block text-sm font-medium text-gray-700">Dirección postal:</label>
                    <input type="text" name="postal_address" id="postal_address" value="{{ $institutional_data->postal_address }}" required placeholder="1234" maxlength="255"
                        class="mt-1 block w-full bg-gray-100 text-gray-900 border border-gray-300 rounded-md py-2 px-3">
                </div>

                <div class="mb-4">
                    <label for="recognition_resolution" class="block text-sm font-medium text-gray-700">Resolución de reconocimiento:</label>
                    <input type="text" name="recognition_resolution" id="recognition_resolution" value="{{ $institutional_data->recognition_resolution }}" required maxlength="255"
                        class="mt-1 block w-full bg-gray-100 text-gray-900 border border-gray-300 rounded-md py-2 px-3">
                </div>

                <div class="mb-4">
                    <label for="current_edition" class="block text-sm font-medium text-gray-700">Edición actual:</label>
                    <input type="number" min="0" inputmode="numeric" name="current_edition" id="current_edition" value="{{ $institutional_data->current_edition }}" required maxlength="10"
                        class="mt-1 block w-full bg-gray-100 text-gray-900 border border-gray-300 rounded-md py-2 px-3">
                </div>

                <div class="mb-4">
                    <label for="start_date" class="block text-sm font-medium text-gray-700">Fecha de inicio:</label>
                    <input type="date" id="start_date" name="start_date" value="{{ $institutional_data->start_date }}" required placeholder="2024-01-24"
                        class="mt-1 block w-full bg-gray-100 text-gray-900 border border-gray-300 rounded-md py-2 px-3">
                </div>

                <div class="mb-4">
                    <label for="end_date" class="block text-sm font-medium text-gray-700">Fecha de culminación:</label>
                    <input type="date" id="end_date" name="end_date" value="{{ $institutional_data->end_date }}" required placeholder="2024-12-24"
                        class="mt-1 block w-full bg-gray-100 text-gray-900 border border-gray-300 rounded-md py-2 px-3">
                </div>

                <div class="mb-4">
                    <label for="number_of_hours" class="block text-sm font-medium text-gray-700">Número de Horas:</label>
                    <input type="number" min="0" inputmode="numeric" name="number_of_hours" id="number_of_hours" value="{{ $institutional_data->number_of_hours }}" required maxlength="10"
                        class="mt-1 block w-full bg-gray-100 text-gray-900 border border-gray-300 rounded-md py-2 px-3">
                </div>

                <div class="mb-4">
                    <label for="total_students" class="block text-sm font-medium text-gray-700">Total alumnos:</label>
                    <input type="number" min="0" inputmode="numeric" name="total_students" id="total_students" value="{{ $institutional_data->total_students }}" required maxlength="10"
                        class="mt-1 block w-full bg-gray-100 text-gray-900 border border-gray-300 rounded-md py-2 px-3">
                </div>

                <div class="mb-4">
                    <label for="total_teaching_staff" class="block text-sm font-medium text-gray-700">Total personal docente:</label>
                    <input type="number" min="0" inputmode="numeric" name="total_teaching_staff" id="total_teaching_staff" value="{{ $institutional_data->total_teaching_staff }}" required maxlength="10"
                        class="mt-1 block w-full bg-gray-100 text-gray-900 border border-gray-300 rounded-md py-2 px-3">
                </div>

                <div class="mb-4">
                    <label for="total_administrative_staff" class="block text-sm font-medium text-gray-700">Total personal administrativo:</label>
                    <input type="number" min="0" inputmode="numeric" name="total_administrative_staff" id="total_administrative_staff" value="{{ $institutional_data->total_administrative_staff }}" required maxlength="10"
                        class="mt-1 block w-full bg-gray-100 text-gray-900 border border-gray-300 rounded-md py-2 px-3">
                </div>

                <div class="mb-4">
                    <label for="certificate" class="block text-sm font-medium text-gray-700">Certificado a otorgar:</label>
                    <input type="text" name="certificate" id="certificate" value="{{ $institutional_data->certificate }}" required maxlength="255"
                        class="mt-1 block w-full bg-gray-100 text-gray-900 border border-gray-300 rounded-md py-2 px-3">
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-400 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
