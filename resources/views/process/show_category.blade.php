<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Evaluaciones del Programa</title>
    <script src="{{ asset('css/tailwindCss.js') }}"></script>
    <link rel="icon" href="{{ asset('portafolio.png') }}" type="image/png">
</head>
<body class="bg-white text-gray-900">

    <!-- Navbar -->
    <nav class="bg-gray-200 shadow-lg sticky top-0 z-50">
        <div class="max-w-full mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-12">
                <!-- Botón Volver a Programas -->
                <div class="flex-shrink-0">
                    <a href="{{ route('process_program', ['program' => $program->id]) }}"
                        class="text-gray-900 px-3 py-1 rounded-md text-sm sm:text-base font-medium bg-gray-300 hover:bg-gray-400 transition duration-200">
                        Atrás
                    </a>
                </div>

                <!-- User Logout -->
                <div class="flex-shrink-0 flex items-center space-x-2 sm:space-x-3">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 bg-gray-300 rounded-full flex items-center justify-center border border-gray-500">
                        <img src="{{ asset('resources/usuario.png') }}" alt="user" class="w-5 h-5 sm:w-6 sm:h-6 rounded-full">
                    </div>
                    <span class="text-xs sm:text-base">{{ Auth::user()->name }}</span>
                    <form id="logout-form" action="{{ route('logoutUser') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-600 hover:bg-red-500 text-white text-xs py-1 px-2 sm:text-sm sm:py-1 sm:px-2 rounded-md transition duration-200">
                            Cerrar Sesión
                        </button>
                    </form>
                </div>
                <!-- Botón para menú en móvil -->
                <div class="sm:hidden">
                    <button id="mobile-menu-button" class="text-gray-900 hover:bg-gray-400 p-2 rounded-md">
                        <!-- Icono de menú -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Menú móvil -->
        <div id="mobile-menu" class="sm:hidden hidden bg-gray-200">
            <div class="flex flex-col space-y-1 px-4 py-2">
                <a href="#institutional_data" class="text-gray-900 hover:bg-gray-300 hover:text-gray-900 px-3 py-1 rounded-md text-sm font-medium">Datos Institucionales</a>
                <a href="#categories" class="text-gray-900 hover:bg-gray-300 hover:text-gray-900 px-3 py-1 rounded-md text-sm font-medium">Categorías</a>
                <a href="{{ route('process_upload_final_report', ['program' => $program->id]) }}" class="text-gray-900 hover:bg-gray-300 hover:text-gray-900 px-3 py-1 rounded-md text-sm font-medium">Subir Informe Final</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-full mx-auto mt-4 px-4 sm:px-6 lg:px-8">

        <span class="text-gray-900 text-lg sm:text-xl font-semibold">REGISTRO DE EVALUACIÓN</span>
        <!-- Nombre del Programa -->
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-semibold mb-4">Categoría: {{ $category->name }}</h2>

        <!-- Evaluaciones -->
        <div class="bg-gray-100 p-4 rounded-lg shadow-md mb-8">
            <h3 class="text-xl sm:text-2xl font-semibold mb-2">Evaluaciones del Programa</h3>
            @php
                $counter = 1;
            @endphp
            @foreach ($evaluations as $evaluation)
                <div class="mb-4">
                    <p class="text-lg">{{ $counter }} - {{ $evaluation->description }}</p>
                    @php
                        $counter++;
                    @endphp
                    <div class="mt-2 flex flex-col sm:flex-row sm:space-x-4 space-y-2 sm:space-y-0">
                        <a href="{{ route('process_create_evidence', ['program' => $program->id, 'category' => $category->id, 'evaluation' => $evaluation->id]) }}"
                            class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-1 px-3 rounded inline-block">
                            Subir Evidencias
                        </a>
                        @if (isset($reports[$evaluation->id]))
                            <a href="{{ route('process_edit_report', ['program' => $program->id, 'category' => $category->id, 'evaluation' => $evaluation->id, 'report' => $reports[$evaluation->id]->id]) }}"
                                class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded inline-block">
                                Modificar Reporte
                            </a>
                        @else
                            <a href="{{ route('process_create_report', ['program' => $program->id, 'category' => $category->id, 'evaluation' => $evaluation->id]) }}"
                                class="bg-green-700 hover:bg-green-600 text-white font-bold py-1 px-3 rounded inline-block">
                                Realizar Reporte
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
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
