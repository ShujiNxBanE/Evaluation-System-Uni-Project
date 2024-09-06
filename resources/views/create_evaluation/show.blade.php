<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Indicador</title>
    <script src="{{ asset('css/tailwindCss.js') }}"></script>
    <link rel="icon" href="{{ asset('portafolio.png') }}" type="image/png">
    <x-script_confirmDelete />
</head>
<body class="bg-gray-800 text-gray-100">
    <div class="container mx-auto px-4 py-6">
        <!-- Barra de navegación con el botón de atrás y el logout -->
        <div class="flex items-center mb-6">
            <a href="{{ route('evaluations') }}" class="flex items-center text-gray-300 hover:text-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="ml-2 text-lg">Volver a los Indicadores</span>
            </a>
            <x-user_logout class="ml-auto" />
        </div>

        <h2 class="text-2xl font-bold mb-6">Detalles del Indicador</h2>

        <p class="mb-4">Descripción: {{ $evaluation->description }}</p>

        <div class="flex space-x-4 mb-6">
            <a href="{{ route('edit_evaluation', ['evaluation' => $evaluation->id]) }}" class="bg-yellow-800 text-white py-2 px-4 rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500">Editar Indicador</a>

            <form action="{{ route('destroy_evaluation', ['evaluation' => $evaluation->id]) }}" method="POST" onsubmit="confirmDeletion(event, name = 'este indicador')" class="flex items-center">
                @method('DELETE')
                @csrf
                <button type="submit" class="bg-red-800 text-white py-2 px-4 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                    Eliminar Indicador
                </button>
            </form>
        </div>
    </div>
</body>
</html>
