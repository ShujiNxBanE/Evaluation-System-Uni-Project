<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Programas</title>
    <script src="{{ asset('css/tailwindCss.js') }}"></script>
    <link rel="icon" href="{{ asset('portafolio.png') }}" type="image/png">
    <x-script_confirmDelete />
    <style>
        .clickable-row {
            cursor: pointer;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Back Button -->
    <button onclick="window.location.href='{{ route('portfolio_index') }}'"
        class="border border-gray-300 p-2 mt-4 ml-4 rounded-lg bg-white shadow-lg text-gray-900 hover:bg-gray-200 transition duration-200">
        Atrás
    </button>

    <!-- User Logout Component -->
    <x-user_logout />

    <!-- Table Title and Action Buttons -->
    <div class="text-center mt-8 mb-6 space-y-2">
        <h3 class="text-xl font-semibold mb-2">Lista de tus programas</h3>
        <div class="flex flex-wrap justify-center gap-2">
            <a href="{{ route('create_programs') }}"
                class="border-2 border-gray-300 rounded-xl p-2 bg-white text-gray-900 shadow-md hover:bg-gray-200 transition duration-200">
                Crear Programa
            </a>
            <a href="{{ route('create_user') }}"
                class="border-2 border-gray-300 rounded-xl p-2 bg-white text-gray-900 shadow-md hover:bg-gray-200 transition duration-200">
                Crear Usuario
            </a>
            <a href="{{ route('admin_show_users') }}"
                class="border-2 border-gray-300 rounded-xl p-2 bg-white text-gray-900 shadow-md hover:bg-gray-200 transition duration-200">
                Usuarios
            </a>
            <a href="{{ route('categories') }}"
                class="border-2 border-gray-300 rounded-xl p-2 bg-white text-gray-900 shadow-md hover:bg-gray-200 transition duration-200">
                Categorías
            </a>
            <a href="{{ route('evaluations') }}"
                class="border-2 border-gray-300 rounded-xl p-2 bg-white text-gray-900 shadow-md hover:bg-gray-200 transition duration-200">
                Indicadores
            </a>
        </div>
    </div>

    <!-- Table -->
    <div class="max-w-4xl mx-auto px-4">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-md border border-gray-300">
                <thead>
                    <tr class="bg-black text-white border-b border-gray-300">
                        <th class="py-2 px-4 text-left">Nombre del Programa</th>
                        <th class="py-2 px-4 text-left">Estado</th>
                        <th class="py-2 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-900">
                    @foreach ($programs as $program)
                    <tr class="clickable-row hover:bg-gray-100 transition duration-200 border-b border-gray-300" onclick="window.location.href='{{ route('admin_show_program', ['program' => $program->id]) }}'">
                        <td class="py-2 px-4">{{ $program->name }}</td>
                        <td class="py-2 px-4">{{ $program->has_institutional_data ? 'Revisado' : 'No Revisado' }}</td>
                        <td class="py-2 px-4 flex gap-2 justify-center">
                            <a href="{{ route('edit_program', ['program' => $program->id]) }}"
                                class="inline-block p-2 bg-blue-500 rounded-md hover:bg-blue-400 transition duration-200 text-white">
                                Editar
                            </a>
                            <form action="{{ route('destroy_program', ['program' => $program->id]) }}" method="POST" onsubmit="confirmDeletion(event, name = 'este programa')">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="inline-block p-2 bg-red-600 rounded-md hover:bg-red-500 transition duration-200 text-white" onclick="event.stopPropagation()">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $programs->links() }}
            </div>
        </div>
    </div>
</body>
</html>
