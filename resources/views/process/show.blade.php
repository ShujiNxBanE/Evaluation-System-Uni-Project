<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles del Programa</title>
    <script src="{{ asset('css/tailwindCss.js') }}"></script>
    <link rel="icon" href="{{ asset('portafolio.png') }}" type="image/png">
</head>
<body class="bg-white text-gray-800">

    <nav class="bg-gray-100 shadow-lg sticky top-0 z-50">
        <div class="max-w-full mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-12">
                <!-- Botón Volver a Programas -->
                <div class="flex-shrink-0">
                    <button onclick="window.location.href='{{ route('process_index') }}'"
                        class="text-gray-800 px-3 py-1 rounded-md text-sm sm:text-base font-medium hover:bg-gray-200 transition duration-200">
                        Volver a Programas
                    </button>
                </div>
                <!-- Menú de Navegación -->
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="hidden sm:flex sm:space-x-2 space-x-1">
                        <a href="#institutional_data"
                        class="text-gray-600 hover:bg-gray-200 hover:text-gray-900 px-2 py-1 rounded-md text-sm font-medium">
                        Datos Institucionales
                        </a>
                        <a href="#categories"
                        class="text-gray-600 hover:bg-gray-200 hover:text-gray-900 px-2 py-1 rounded-md text-sm font-medium">
                        Categorías
                        </a>
                        <a href="{{ route('process_upload_final_report', ['program' => $program->id]) }}"
                        class="text-gray-600 hover:bg-gray-200 hover:text-gray-900 px-2 py-1 rounded-md text-sm font-medium">
                        Subir Informe Final
                        </a>
                    </div>
                </div>
                <!-- User Logout -->
                <div class="flex-shrink-0 flex items-center space-x-2 sm:space-x-3 pr-2">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 bg-gray-300 rounded-full flex items-center justify-center border border-gray-500">
                        <img src="{{ asset('resources/usuario.png') }}" alt="user" class="w-5 h-5 sm:w-6 sm:h-6 rounded-full">
                    </div>
                    <span class="text-xs sm:text-base text-gray-800">{{ Auth::user()->name }}</span>
                    <form id="logout-form" action="{{ route('logoutUser') }}" method="POST" class="flex-shrink-0">
                        @csrf
                        <button type="submit" class="bg-red-600 hover:bg-red-500 text-white text-xs py-1 px-2 sm:text-sm sm:py-1 sm:px-2 rounded-md transition duration-200">
                            Cerrar Sesión
                        </button>
                    </form>
                </div>
                <!-- Botón para menú en móvil -->
                <div class="sm:hidden">
                    <button id="mobile-menu-button" class="text-gray-600 hover:bg-gray-200 p-2 rounded-md">
                        <!-- Icono de menú -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Menú móvil -->
        <div id="mobile-menu" class="sm:hidden hidden bg-gray-100">
            <div class="flex flex-col space-y-1 px-4 py-2">
                <a href="#institutional_data" class="text-gray-600 hover:bg-gray-200 hover:text-gray-900 px-3 py-1 rounded-md text-sm font-medium">Datos Institucionales</a>
                <a href="#categories" class="text-gray-600 hover:bg-gray-200 hover:text-gray-900 px-3 py-1 rounded-md text-sm font-medium">Categorías</a>
                <a href="{{ route('process_upload_final_report', ['program' => $program->id]) }}" class="text-gray-600 hover:bg-gray-200 hover:text-gray-900 px-3 py-1 rounded-md text-sm font-medium">Subir Informe Final</a>
            </div>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto mt-4 px-4 sm:px-6 lg:px-8">
        <!-- Nombre del Programa -->
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-semibold mb-4 text-gray-800">Nombre del programa: {{ $program->name }}</h2>

        <!-- Datos Institucionales -->
        <div id="institutional_data" class="mb-6">
            <h3 class="text-xl sm:text-2xl font-semibold mb-2 text-gray-700">Datos Institucionales del Programa</h3>
            @if ($institutional_data == null)
                <p class="text-gray-600 mb-4">Aún no hay datos institucionales.</p>
                <a href="{{ route('process_create_institutional_data', ['program' => $program->id]) }}"
                class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-1 px-3 rounded inline-block">
                    Llenar Datos Institucionales
                </a>
            @else
                <div class="bg-gray-100 p-3 rounded-lg shadow-md">
                    @foreach ([
                        'Nombre de institución' => $institutional_data->name,
                        'País' => $institutional_data->country,
                        'Año de creación' => $institutional_data->creation_year,
                        'Carácter de institución' => $institutional_data->institution_character,
                        'Ediciones del programa' => $institutional_data->program_edition,
                        'Dirección web' => $institutional_data->web_address,
                        'Dirección postal' => $institutional_data->postal_address,
                        'Resolución de reconocimiento' => $institutional_data->recognition_resolution,
                        'Edición actual' => $institutional_data->current_edition,
                        'Fecha de inicio' => $institutional_data->start_date,
                        'Fecha de culminación' => $institutional_data->end_date,
                        'Número de Horas' => $institutional_data->number_of_hours,
                        'Total alumnos' => $institutional_data->total_students,
                        'Total personal docente' => $institutional_data->total_teaching_staff,
                        'Total personal administrativo' => $institutional_data->total_administrative_staff,
                        'Certificado a otorgar' => $institutional_data->certificate
                    ] as $label => $value)
                    <div class="flex flex-col sm:flex-row mb-1 items-center">
                        <span class="font-bold w-full sm:w-1/3 text-gray-700">{{ $label }}:</span>
                        <input type="text" class="pl-1 bg-gray-200 text-gray-700 w-full sm:w-2/3 rounded-md" value="{{ $value }}" disabled>
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('process_edit_institutional_data', ['program' => $program->id]) }}"
                class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-1 px-3 rounded inline-block mt-2">
                    Modificar Datos Institucionales
                </a>
            @endif
        </div>

        <!-- Categorías del Programa -->
        <div id="categories" class="mb-6">
            <h3 class="text-xl sm:text-2xl font-semibold mb-2 text-gray-700">Categorías del programa</h3>

            <button
            class="bg-blue-500 text-white px-4 py-2 rounded mb-2"
            onclick="openModal()"
            >
                Escala de Valoración
            </button>

            <x-modal />

            <div class="overflow-x-auto">
                <table class="min-w-full bg-gray-100 rounded-lg shadow-md divide-y divide-gray-200 border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200 text-gray-800 border-b border-gray-300">
                            <th class="py-1 px-2 text-left text-xs sm:text-sm border-b border-gray-300">Categoría</th>
                            <th class="py-1 px-2 text-left text-xs sm:text-sm border-r border-gray-300">Número de Evaluaciones</th>
                            <th class="py-1 px-2 text-left text-xs sm:text-sm border-r border-gray-300">Puntaje Total</th>
                            <th class="py-1 px-2 text-left text-xs sm:text-sm">Puntaje Máximo</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-xs sm:text-sm">
                        @foreach ($program->categories as $category)
                        <tr class="hover:bg-gray-200 transition duration-200 border-b border-gray-300">
                            <td class="py-1 px-2 border-r border-gray-300">
                                <a href="{{ route('process_category', ['program' => $program->id, 'category' => $category->id]) }}"
                                class="text-blue-600 hover:underline">
                                {{ $category->name }}
                                </a>
                            </td>
                            <td class="py-1 px-2 border-r border-gray-300">{{ $category->number_of_evaluations }}</td>
                            <td class="py-1 px-2 border-r border-gray-300">{{ $category->total_score }}</td>
                            <td class="py-1 px-2">{{ $category->max_score }}</td>
                        </tr>
                        @endforeach
                        <!-- Fila de Totales -->
                        <tr class="bg-gray-200 text-gray-800 font-semibold border-t border-gray-300">
                            <td class="py-1 px-2 border-r border-gray-300">Totales</td>
                            <td class="py-1 px-2 border-r border-gray-300">{{ $totalEvaluations }}</td>
                            <td class="py-1 px-2 border-r border-gray-300">{{ $totalScore }}</td>
                            <td class="py-1 px-2">{{ $totalMaxScore }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tabla de Equivalencias de Aprobación -->
        <div id="approval_table" class="mb-8">
            <h3 class="text-xl sm:text-2xl font-semibold mb-2">Tabla de Equivalencias de Aprobación</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg shadow-md divide-y divide-gray-300 border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700 border-b border-gray-300">
                            <th class="py-1 px-2 text-left text-xs sm:text-sm border-r border-gray-300">Cumplimiento Numérico</th>
                            <th class="py-1 px-2 text-left text-xs sm:text-sm">Calificación</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-xs sm:text-sm">
                        @php
                            $previousScore = null;
                        @endphp

                        @foreach ($intervalScores as $index => $score)
                        <tr class="border-b border-gray-300">
                            <td class="py-1 px-2 border-r border-gray-300">
                                @if ($previousScore === null)
                                    {{ ceil($score) }} puntos
                                @elseif ($index === array_key_last($intervalScores))
                                    {{ ceil($previousScore - 1) }} o menos
                                @else
                                    {{ ceil($score) }} - {{ ceil($previousScore - 1) }}
                                @endif
                            </td>
                            <td class="py-1 px-2">{{ $evaluationCategories[$index] }}</td>
                            @php
                                $previousScore = $score;
                            @endphp
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        const button = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');

        button.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
