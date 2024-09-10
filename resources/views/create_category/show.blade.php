<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Categoría</title>
    <script src="{{ asset('css/tailwindCss.js') }}"></script>
    <link rel="icon" href="{{ asset('portafolio.png') }}" type="image/png">
    <x-script_confirmDelete />
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="container mx-auto px-4 py-6">
        <!-- Barra de navegación con el botón de atrás y el logout -->
        <div class="flex items-center mb-6">
            <a href="{{ route('categories') }}" class="flex items-center text-gray-700 hover:text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="ml-2 text-lg">Volver a las Categorías</span>
            </a>
            <x-user_logout class="ml-auto" />
        </div>

        <h3 class="text-2xl font-bold mb-4">Nombre de la categoría: {{ $category->name }}</h3>
        <p class="mb-4 text-gray-700">Descripción: {{ $category->description }}</p>

        <div class="flex space-x-4 mb-6">
            <a href="{{ route('edit_category', ['category' => $category->id]) }}" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400">
                Editar Categoría
            </a>
            <form action="{{ route('destroy_category', ['category' => $category->id]) }}" method="POST" onsubmit="confirmDeletion(event, name = 'esta categoría')">
                @method('DELETE')
                @csrf
                <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400">
                    Eliminar Categoría
                </button>
            </form>
        </div>

        <h3 class="text-xl font-semibold mb-4">Indicadores</h3>

        @foreach ($category->evaluations as $evaluation)
            <div class="bg-white p-4 rounded-lg shadow-md border border-gray-300 mb-4">
                <h3 class="text-base font-bold">Número de indicador: {{ $evaluation->id }}</h3>
                <p class="text-gray-700">Descripción: {{ $evaluation->description }}</p>
            </div>
        @endforeach
    </div>
</body>
</html>
