<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indicadores</title>
    <script src="{{ asset('css/tailwindCss.js') }}"></script>
    <link rel="icon" href="{{ asset('portafolio.png') }}" type="image/png">
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="container mx-auto px-4 py-6">
        <!-- Barra de navegación con el botón de atrás y el logout -->
        <div class="flex items-center mb-4">
            <a href="{{ route('programs') }}" class="flex items-center text-gray-600 hover:text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="ml-2 text-lg">Volver a los programas</span>
            </a>

            <x-user_logout class="ml-auto" />
        </div>

        <div class="mb-6 mt-8">
            <a href="{{ route('create_evaluations') }}" class="ml-4 bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400">Crear indicador</a>
        </div>

        <h2 class="text-2xl font-bold mb-4">Indicadores</h2>

        <ul class="space-y-4">
            @foreach ($evaluations as $evaluation)
                <li class="bg-white p-4 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-2">Número de indicador: {{ $evaluation->id }}</h3>
                    <a href="{{ route('show_evaluation_details', ['evaluation' => $evaluation->id]) }}" class="text-blue-600 hover:text-blue-500">Detalles</a>
                </li>
            @endforeach
        </ul>

        <!-- Paginación -->
        <div class="mt-6">
            {{ $evaluations->links('pagination::tailwind') }}
        </div>
    </div>
</body>
</html>
