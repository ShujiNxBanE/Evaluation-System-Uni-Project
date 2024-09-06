<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestor de Archivos</title>
    <script src="{{ asset('css/tailwindCss.js') }}"></script>
    <link rel="icon" href="{{ asset('portafolio.png') }}" type="image/png">
</head>
<body class="bg-gray-900 text-gray-100">

    <!-- Navbar -->
    <nav class="bg-gray-800 shadow-lg sticky top-0 z-50">
        <div class="max-w-full mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-12">
                <!-- Botón Volver a Categoría -->
                <div class="flex-shrink-0">
                    <button type="button"
                        onclick="window.location.href='{{ route('admin_show_category', ['program' => $program->id, 'category' => $category->id]) }}'"
                        class="text-white px-3 py-1 rounded-md text-sm sm:text-base font-medium bg-gray-700 hover:bg-gray-600 transition duration-200 flex items-center">
                        <img src="{{ asset('resources/flecha-izquierda-azul.png') }}" alt="flecha-izquierda-azul" class="w-6 h-auto">
                        <span class="ml-2">Atrás</span>
                    </button>
                </div>

                <!-- User Logout -->
                <div class="flex-shrink-0 flex items-center space-x-2 sm:space-x-3 pr-2">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 bg-gray-500 rounded-full flex items-center justify-center border border-gray-700">
                        <img src="{{ asset('resources/usuario.png') }}" alt="user" class="w-5 h-5 sm:w-6 sm:h-6 rounded-full">
                    </div>
                    <span class="text-xs sm:text-base">{{ Auth::user()->name }}</span>
                    <form id="logout-form" action="{{ route('logoutUser') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-gray-700 hover:bg-gray-600 text-white text-xs py-1 px-2 sm:text-sm sm:py-1 sm:px-2 rounded-md transition duration-200">
                            Cerrar Sesión
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-full mx-auto mt-4 px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <header class="bg-gray-900 text-white text-center py-3 rounded-md mb-4">
            <h1 class="text-xl sm:text-2xl font-semibold">Gestor de Archivos</h1>
        </header>

        <!-- Category and Evaluation Description -->
        <div class="bg-blue-900 p-4 rounded-lg shadow-md mb-8">
            <h1 class="text-xl sm:text-2xl font-semibold mb-2">Categoría: {{ $category->name }}</h1>
            <p class="text-base sm:text-lg">{{ $evaluation->description }}</p>
        </div>

        <!-- File List -->
        <header class="bg-gray-900 text-white text-center py-2 rounded-md mb-4">
            <h2 class="text-lg sm:text-xl font-semibold">Lista de Archivos</h2>
        </header>
        <div class="bg-blue-900 p-4 rounded-lg shadow-md">
            <table class="table-auto w-full text-left border-collapse">
                <thead>
                    <tr class="bg-blue-800 text-white">
                        <th class="px-4 py-2">Descripción</th>
                        <th class="px-4 py-2">Descargar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($evidences as $evidence)
                        <tr class="border-b border-blue-700">
                            <td class="px-4 py-2">{{ $evidence->description }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ asset('storage/evidences/' . $evidence->file_url) }}" class="text-blue-300 hover:text-blue-100" download>Descargar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $evidences->links() }}
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
