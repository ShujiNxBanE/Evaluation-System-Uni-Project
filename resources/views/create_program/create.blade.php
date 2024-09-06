<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Programa</title>
    <script src="{{ asset('css/tailwindCss.js') }}"></script>
    <link rel="icon" href="{{ asset('portafolio.png') }}" type="image/png">
</head>
<body class="bg-gray-800 text-gray-100">
    <div class="container mx-auto px-4 py-6">
        <!-- Barra de navegación con el botón de atrás y el logout -->
        <div class="flex items-center mb-4">
            <a href="{{ route('programs') }}" class="flex items-center text-gray-300 hover:text-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="ml-2 text-lg">Atrás</span>
            </a>
            <x-user_logout class="ml-auto" />
        </div>

        <h1 class="text-2xl font-bold mb-6">Creando un nuevo programa</h1>

        <form action="{{ route('create_new_program') }}" method="GET" class="bg-gray-900 p-6 rounded-lg shadow-lg">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-lg font-medium mb-2">Nombre del programa:</label>
                <input type="text" id="name" name="name" placeholder="nombre" maxlength="255" class="w-full px-3 py-2 bg-gray-700 text-gray-300 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-lg font-medium mb-2">Descripción del programa:</label>
                <textarea id="description" name="description" cols="30" rows="4" maxlength="255" class="w-full px-3 py-2 bg-gray-700 text-gray-300 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>
            <div class="mb-4">
                <label for="user_id" class="block text-lg font-medium mb-2">Seleccione al usuario que desee asignarle el programa:</label>
                <p class="text-sm text-gray-400 mb-2">Nota: Si no desea asignar el programa aún no seleccione ninguno.</p>
                <select id="user_id" name="user_id" class="w-full px-3 py-2 bg-gray-700 text-gray-300 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="{{ Auth::user()->role_id }}">Seleccione un usuario</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Crear</button>
        </form>
    </div>
</body>
</html>
