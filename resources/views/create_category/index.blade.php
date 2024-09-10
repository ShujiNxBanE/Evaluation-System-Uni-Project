<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <script src="{{ asset('css/tailwindCss.js') }}"></script>
    <link rel="icon" href="{{ asset('portafolio.png') }}" type="image/png">
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="container mx-auto px-4 py-6">
        <!-- Barra de navegación con el botón de atrás y el logout -->
        <div class="flex items-center mb-6">
            <a href="{{ route('programs') }}" class="flex items-center text-gray-700 hover:text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="ml-2 text-lg">Volver a Programas</span>
            </a>
            <x-user_logout class="ml-auto" />
        </div>

        <div class="mb-6 mt-8">
            <a href="{{ route('create_categories') }}" class="inline-block bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400">
                Crear nueva categoría
            </a>
        </div>

        <ul class="space-y-4">
            @foreach ($categories as $category)
                <li class="bg-white p-4 rounded-lg shadow-md border border-gray-300">
                    <h3 class="text-base font-semibold">
                        <a href="{{ route('show_category_details', ['category' => $category->id]) }}" class="text-blue-600 hover:text-blue-500">
                            Nombre: {{ $category->name }}
                        </a>
                    </h3>
                </li>
            @endforeach
        </ul>

        <div class="mt-4">
            {{ $categories->links() }}
        </div>
    </div>
</body>
</html>
