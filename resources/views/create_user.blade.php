<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de Usuario</title>
    <script src="{{ asset('css/tailwindCss.js') }}"></script>
    <link rel="icon" href="{{ asset('portafolio.png') }}" type="image/png">
</head>
<body class="bg-gray-800 text-gray-100">
    <div class="container mx-auto px-4 py-8">
        <!-- Barra de navegación con el botón de atrás y el logout -->
        <div class="flex items-center justify-between mb-6">
            <a href="{{ route('programs') }}" class="text-gray-300 hover:text-gray-100 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="ml-2">Atrás</span>
            </a>
            <x-user_logout />
        </div>

        <form action="{{ route('createUser') }}" method="GET" class="bg-gray-900 p-6 rounded-lg shadow-lg">
            @csrf
            <p class="text-2xl font-bold mb-4">Creando nuevo usuario</p>

            <div class="flex flex-col sm:flex-row gap-4 mb-4">
                <label class="flex flex-col flex-1">
                    <span class="text-lg font-medium mb-2">Nombre</span>
                    <input required placeholder="Nombre" type="text" name="firstName" maxlength="128" class="px-3 py-2 bg-gray-700 text-gray-300 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </label>

                <label class="flex flex-col flex-1">
                    <span class="text-lg font-medium mb-2">Apellido</span>
                    <input required placeholder="Apellido" type="text" name="lastName" maxlength="127" class="px-3 py-2 bg-gray-700 text-gray-300 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </label>
            </div>

            <label class="flex flex-col mb-4">
                <span class="text-lg font-medium mb-2">Email</span>
                <input required placeholder="Email" type="email" name="email" maxlength="255" class="px-3 py-2 bg-gray-700 text-gray-300 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </label>

            <label class="flex flex-col mb-4">
                <span class="text-lg font-medium mb-2">Contraseña</span>
                <input required placeholder="Contraseña" type="password" name="password" maxlength="255" class="px-3 py-2 bg-gray-700 text-gray-300 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </label>

            <label class="flex flex-col mb-4">
                <span class="text-lg font-medium mb-2">Confirmar Contraseña</span>
                <input required placeholder="Confirmar Contraseña" type="password" class="px-3 py-2 bg-gray-700 text-gray-300 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </label>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Enviar</button>

        </form>
    </div>
</body>
</html>
