<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <script src="{{ asset('css/tailwindCss.js') }}"></script>
    <link rel="icon" href="{{ asset('portafolio.png') }}" type="image/png">
    <x-script_confirmDelete />
</head>
<body class="bg-gray-800 text-gray-100">
    <div class="container mx-auto px-4 py-10">
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

        <ul class="space-y-4">
            @foreach ($users as $user)
                <li class="bg-gray-900 p-4 rounded-lg shadow-lg">
                    <hr class="my-2 border-gray-600">
                    <p><span class="font-bold">Id del usuario:</span> {{ $user->id }}</p>
                    <p><span class="font-bold">Nombre del usuario:</span> {{ $user->name }}</p>
                    <p><span class="font-bold">Email del usuario:</span> {{ $user->email }}</p>
                    <p><span class="font-bold">Fecha de creación del usuario:</span> {{ $user->created_at }}</p>
                    <div class="mt-4 flex space-x-4">
                        <a href="{{ route('admin_edit_user', ['user' => $user->id]) }}" class="text-blue-500 hover:text-blue-400">Editar Usuario</a>
                        <form action="{{ route('admin_destroy_user', ['user' => $user->id]) }}" method="POST" onsubmit="confirmDeletion(event, '{{ $user->name }}')">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="text-red-500 hover:text-red-400">Eliminar Usuario</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</body>
</html>
