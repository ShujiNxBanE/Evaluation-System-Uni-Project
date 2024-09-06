<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Programas</title>
    <script src="{{ asset('css/tailwindCss.js') }}"></script>
    <link rel="icon" href="{{ asset('portafolio.png') }}" type="image/png">
</head>
<body class="bg-gray-900 text-gray-100">

    <!-- Back Button -->
    <button onclick="window.location.href='{{ route('portfolio_index') }}'"
    class="border border-gray-600 p-2 mt-4 ml-4 rounded-lg bg-gray-800 shadow-lg text-white hover:bg-gray-700 transition duration-200">
        Atrás
    </button>

    <!-- User Logout Component -->
    <x-user_logout />

    <!-- Table Title -->
    <div class="text-center mt-8 mb-6">
        <h3 class="text-xl font-semibold mb-2">Lista de tus programas</h3>
        <p class="text-gray-400">Estimado evaluador, a continuación seleccione el programa a evaluar.</p>
    </div>

    <!-- Table -->
    <div class="max-w-4xl mx-auto px-4">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-800 rounded-lg shadow-md">
                <thead>
                    <tr class="w-full bg-gray-700 text-gray-300">
                        <th class="py-2 px-4 text-left">Nombre del Programa</th>
                        <th class="py-2 px-4 text-left">Estado</th>
                    </tr>
                </thead>
                <tbody class="text-gray-200">
                    @foreach ($programs as $program)
                    <tr onclick="window.location.href='{{ route('process_program', ['program' => $program->id]) }}'"
                        class="cursor-pointer hover:bg-gray-700 transition duration-200">
                        <td class="py-2 px-4">{{ $program->name }}</td>
                        <td class="py-2 px-4">{{ $program->has_institutional_data ? 'Revisado' : 'No Revisado' }}</td>
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
