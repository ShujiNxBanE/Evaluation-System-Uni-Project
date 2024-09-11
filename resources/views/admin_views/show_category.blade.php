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
<body class="bg-gray-100 text-gray-900">

    <!-- Navbar -->
    <nav class="bg-white shadow-lg sticky top-0 z-50 border-b border-gray-200">
        <div class="max-w-full mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-12">
                <!-- Botón Volver a Programas -->
                <div class="flex-shrink-0">
                    <a href="{{ route('admin_show_program', ['program' => $program->id]) }}"
                        class="text-gray-900 px-3 py-1 rounded-md text-sm sm:text-base font-medium bg-gray-200 hover:bg-gray-300 transition duration-200">
                        Atrás
                    </a>
                </div>

                <!-- User Logout -->
                <div class="flex-shrink-0 flex items-center space-x-2 sm:space-x-3 pr-2">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 bg-gray-300 rounded-full flex items-center justify-center border border-gray-400">
                        <img src="{{ asset('resources/usuario.png') }}" alt="user" class="w-5 h-5 sm:w-6 sm:h-6 rounded-full">
                    </div>
                    <span class="text-xs sm:text-base text-gray-900">{{ Auth::user()->name }}</span>
                    <form id="logout-form" action="{{ route('logoutUser') }}" method="POST" class="flex-shrink-0">
                        @csrf
                        <button type="submit" class="bg-gray-200 hover:bg-gray-300 text-gray-900 text-xs py-1 px-2 sm:text-sm sm:py-1 sm:px-2 rounded-md transition duration-200">
                            Cerrar Sesión
                        </button>
                    </form>
                </div>
                <!-- Botón para menú en móvil -->
                <div class="sm:hidden">
                    <button id="mobile-menu-button" class="text-gray-500 hover:bg-gray-200 p-2 rounded-md">
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
            <div class="flex flex-col space-y-1 px-4 py-2">
                <a href="#institutional_data" class="text-gray-700 hover:bg-gray-100 hover:text-gray-900 px-3 py-1 rounded-md text-sm font-medium">Datos Institucionales</a>
                <a href="#categories" class="text-gray-700 hover:bg-gray-100 hover:text-gray-900 px-3 py-1 rounded-md text-sm font-medium">Categorías</a>
                <a href="{{ route('process_upload_final_report', ['program' => $program->id]) }}" class="text-gray-700 hover:bg-gray-100 hover:text-gray-900 px-3 py-1 rounded-md text-sm font-medium">Subir Informe Final</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-full mx-auto mt-4 px-4 sm:px-6 lg:px-8">

        <span class="text-gray-900 text-lg sm:text-xl font-semibold">REGISTRO DE EVALUACIÓN</span>
        <!-- Nombre del Programa -->
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-semibold mb-4 text-gray-900">Categoría: {{ $category->name }}</h2>

        <!-- Evaluaciones -->
        <div class="bg-white p-4 rounded-lg shadow-md mb-8">
            <h3 class="text-xl sm:text-2xl font-semibold mb-2 text-gray-900">Evaluaciones del Programa</h3>
            @php
                $counter = 1;
            @endphp
            @foreach ($evaluations as $evaluation)
                <div class="mb-4">
                    <p class="text-lg text-gray-900">{{ $counter }} - {{ $evaluation->description }}</p>
                    @php
                        $counter++;
                    @endphp
                    <div class="mt-2 flex flex-col sm:flex-row sm:space-x-4 space-y-2 sm:space-y-0">
                        <a href="{{ route('admin_show_evidences', ['program' => $program->id, 'category' => $category->id, 'evaluation' => $evaluation->id]) }}"
                            class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-1 px-3 rounded inline-block">
                            Ver Evidencias
                        </a>
                        @if (isset($reports[$evaluation->id]))
                            <a href="{{ route('admin_show_report', ['program' => $program->id, 'category' => $category->id, 'evaluation' => $evaluation->id, 'report' => $reports[$evaluation->id]->id]) }}"
                                class="bg-yellow-600 hover:bg-yellow-500 text-white font-bold py-1 px-3 rounded inline-block">
                                Ver Reporte
                            </a>
                        @else
                            <span class="text-red-600">Aún no hay reporte</span>
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
