<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Evaluación</title>
    <script src="{{ asset('css/tailwindCss.js') }}"></script>
    <link rel="icon" href="{{ asset('portafolio.png') }}" type="image/png">
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="container mx-auto px-4 py-6">
        <!-- Barra de navegación con el botón de atrás y el logout -->
        <div class="flex items-center mb-6">
            <a href="{{ route('show_evaluation_details', ['evaluation' => $evaluation->id]) }}" class="flex items-center text-gray-700 hover:text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="ml-2 text-lg">Volver a los detalles</span>
            </a>
            <x-user_logout class="ml-auto" />
        </div>

        <h2 class="text-2xl font-bold mb-6">Actualizar Indicador</h2>

        <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
            <form action="{{ route('update_evaluation', ['evaluation' => $evaluation->id]) }}" method="GET">
                @csrf
                <div class="mb-4">
                    <label for="description" class="block text-lg font-medium mb-2">Descripción:</label>
                    <textarea id="description" name="description" cols="30" rows="4" maxlength="1000" class="w-full px-3 py-2 bg-gray-200 text-gray-900 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $evaluation->description }}</textarea>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    Actualizar
                </button>
            </form>
        </div>
    </div>
</body>
</html>
