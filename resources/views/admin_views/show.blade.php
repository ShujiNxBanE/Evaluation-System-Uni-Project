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
<body class="bg-white text-black">

    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-full mx-auto px-2 sm:px-4 lg:px-6">
            <div class="relative flex items-center justify-between h-10">
                <!-- Botón Volver a Programas -->
                <div class="flex-shrink-0">
                    <button onclick="window.location.href='{{ route('programs') }}'"
                        class="text-black px-2 py-1 rounded-md text-xs sm:text-sm font-medium hover:bg-gray-300 transition duration-200">
                        Volver a Programas
                    </button>
                </div>
                <!-- Menú de Navegación -->
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="hidden sm:flex sm:space-x-1">
                        <a href="#institutional_data" class="text-black hover:bg-gray-300 hover:text-black px-2 py-1 rounded-md text-xs sm:text-sm">Datos Institucionales</a>
                        <a href="#categories" class="text-black hover:bg-gray-300 hover:text-black px-2 py-1 rounded-md text-xs sm:text-sm">Categorías</a>
                        @if ($program->final_report_path)
                            <a href="{{ route('admin_show_final_report', ['program' => $program->id]) }}" class="text-black hover:bg-gray-300 hover:text-black px-2 py-1 rounded-md text-xs sm:text-sm">Ver Informe Final</a>
                        @else
                            <span class="text-gray-500 px-2 py-1 rounded-md text-xs sm:text-sm">Aun no hay informe final</span>
                        @endif
                    </div>
                </div>

                <!-- User Logout -->
                <div class="flex-shrink-0 flex items-center space-x-1 pr-2">
                    <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center border border-gray-700">
                        <img src="{{ asset('resources/usuario.png') }}" alt="user" class="w-5 h-5 rounded-full">
                    </div>
                    <span class="text-xs">{{ Auth::user()->name }}</span>
                    <form id="logout-form" action="{{ route('logoutUser') }}" method="POST" class="flex-shrink-0">
                        @csrf
                        <button type="submit" class="bg-red-600 hover:bg-red-500 text-white text-xs py-1 px-2 rounded-md transition duration-200">Cerrar Sesión</button>
                    </form>
                </div>
                <!-- Botón para menú en móvil -->
                <div class="sm:hidden">
                    <button id="mobile-menu-button" class="text-gray-300 hover:bg-gray-700 p-2 rounded-md">
                        <!-- Icono de menú -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Menú móvil -->
        <div id="mobile-menu" class="sm:hidden hidden bg-white">
            <div class="flex flex-col space-y-1 px-2 py-1">
                <a href="#institutional_data" class="text-black hover:bg-gray-300 hover:text-white px-2 py-1 rounded-md text-xs">Datos Institucionales</a>
                <a href="#categories" class="text-black hover:bg-gray-300 hover:text-white px-2 py-1 rounded-md text-xs">Categorías</a>
                @if ($program->final_report_path)
                    <a href="{{ route('admin_show_final_report', ['program' => $program->id]) }}" class="text-black hover:bg-gray-300 hover:text-white px-2 py-1 rounded-md text-xs">Ver Informe Final</a>
                @else
                    <span class="text-gray-400 px-2 py-1 rounded-md text-xs">Aun no hay informe final</span>
                @endif
            </div>
        </div>
    </nav>

    <div class="max-w-full mx-auto mt-2 px-2 sm:px-4 lg:px-6">
        <!-- Nombre del Programa -->
        <h2 class="text-xl sm:text-2xl font-semibold mb-2">
            Nombre del programa: {{ $program->name }} <br>
            <span class="text-xl text-blue-500">Evaluador: {{ $evaluator }}</span>
        </h2>

        <!-- Datos Institucionales -->
        <div id="institutional_data" class="mb-4 max-w-3xl mx-auto">
            <h3 class="text-lg sm:text-xl font-semibold mb-2">Datos Institucionales del Programa</h3>
            @if ($institutional_data == null)
                <p class="text-gray-700 mb-2">Aun no hay datos institucionales.</p>
            @else
                <div class="bg-gray-100 p-4 rounded-lg shadow-md">
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
                    <div class="flex flex-col sm:flex-row mb-2 items-center">
                        <span class="font-bold w-full sm:w-1/2 text-xs text-gray-700">{{ $label }}:</span>
                        <input type="text" class="pl-2 bg-gray-200 text-gray-800 w-full sm:w-1/2 rounded-md text-xs" value="{{ $value }}" disabled>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Categorías del Programa -->
        <div id="categories" class="mb-4 max-w-3xl mx-auto">
            <h3 class="text-lg sm:text-xl font-semibold mb-2">Categorías del programa</h3>

            <button
            class="bg-blue-500 text-white px-4 py-2 rounded mb-2"
            onclick="openModal()"
            >
                Escala de Valoración
            </button>

            <x-modal />

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg shadow-md divide-y divide-gray-200 border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200 text-gray-800 border-b border-gray-300">
                            <th class="py-2 px-2 text-left text-xs border-r border-gray-300">Categoría</th>
                            <th class="py-2 px-2 text-left text-xs border-r border-gray-300">Número de Indicadores</th>
                            <th class="py-2 px-2 text-left text-xs border-r border-gray-300">Puntaje Total</th>
                            <th class="py-2 px-2 text-left text-xs ">Puntaje Máximo</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-xs sm:text-sm">
                        @foreach ($program->categories as $category)
                        <tr class="hover:bg-gray-200 transition duration-200 border-b border-gray-300">
                            <td class="py-2 px-2 border-r border-gray-300">
                                <a href="{{ route('admin_show_category', ['program' => $program->id, 'category' => $category->id]) }}"
                                class="text-blue-500 hover:underline">
                                    {{ $category->name }}
                                </a>
                            </td>
                            <td class="py-2 px-2 border-r border-gray-300">{{ $category->number_of_evaluations }}</td>
                            <td class="py-2 px-2 border-r border-gray-300">{{ $category->total_score }}</td>
                            <td class="py-2 px-2">{{ $category->max_score }}</td>
                        </tr>
                        @endforeach
                        <!-- Fila de Totales -->
                        <tr class="bg-gray-100 text-gray-800 font-semibold">
                            <td class="py-2 px-2 border-r border-gray-300">Totales</td>
                            <td class="py-2 px-2 border-r border-gray-300">{{ $totalEvaluations }}</td>
                            <td class="py-2 px-2 border-r border-gray-300">{{ $totalScore }}</td>
                            <td class="py-2 px-2">{{ $totalMaxScore }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tabla de Equivalencias de Aprobación -->
        <div id="approval_table" class="mb-4 max-w-3xl mx-auto">
            <h3 class="text-lg sm:text-xl font-semibold mb-2">Tabla de Equivalencias de Aprobación</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg shadow-md divide-y divide-gray-200">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700 border-b border-gray-300">
                            <th class="py-2 px-2 text-left text-xs border-t border-l border-r border-gray-300">Cumplimiento Numérico</th>
                            <th class="py-2 px-2 text-left text-xs border-t border-l border-r border-gray-300">Calificación</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800 text-xs">
                        @php
                            $previousScore = null;
                        @endphp

                        @foreach ($intervalScores as $index => $score)
                        <tr class="border-b border-gray-300">
                            <td class="py-2 px-2 border-l border-r border-gray-300">
                                @if ($previousScore === null)
                                    {{ ceil($score) }} puntos
                                @elseif ($index === array_key_last($intervalScores))
                                    {{ ceil($previousScore - 1) }} o menos
                                @else
                                    {{ ceil($score) }} - {{ ceil($previousScore - 1) }}
                                @endif
                            </td>
                            <td class="py-2 px-2 border-r border-gray-300">{{ $evaluationCategories[$index] }}</td>
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
