<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe Final</title>
    <script src="{{ asset('css/tailwindCss.js') }}"></script>
    <link rel="icon" href="{{ asset('portafolio.png') }}" type="image/png">
    <x-script_confirmDelete />
</head>
<body class="bg-gray-900 text-white min-h-screen p-4">
    <!-- Header with Back Button -->
    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('process_program', ['program' => $program->id]) }}" class="text-lg bg-gray-700 hover:bg-gray-600 text-white py-2 px-4 rounded">Atras</a>
        <!-- Logout Button -->
        <x-user_logout />
    </div>

    <!-- Main Content -->
    <div class="container mx-auto max-w-4xl bg-gray-800 p-6 rounded-lg shadow-lg">
        <h2 class="text-center text-2xl mb-3">INFORME FINAL</h2>
        <h2 class="text-center text-xl mb-6">Estimado evaluador en este apartado ingresar el informe final de la evaluación del programa.</h2>

        <div class="overflow-x-auto">
            <table class="w-full table-auto text-sm">
                <thead>
                    <tr>
                        <th class="py-2 px-4 text-center bg-gray-700">DOCUMENTO INFORME FINAL</th>
                        <th class="py-2 px-4 text-center bg-gray-700"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4 text-justify bg-gray-800">Informe de la autoevaluación</td>
                        <td class="py-2 px-4 bg-gray-800">
                            @if ($program->final_report_path == null)
                                <div class="flex flex-col items-center md:flex-row md:justify-start">
                                    <form action="{{ route('process_store_final_report', ['program' => $program->id]) }}" enctype="multipart/form-data" method="POST" class="flex flex-col md:flex-row items-center md:items-start">
                                        @csrf
                                        <input type="file" name="final_report_path" class="p-2 bg-gray-700 text-white rounded mb-2 md:mb-0 md:mr-2" required>
                                        <button class="border-2 border-gray-700 p-2 bg-gray-600 rounded-md text-white" type="submit">Subir Informe</button>
                                    </form>
                                </div>
                            @else
                                <div class="flex flex-col items-center">
                                    <form action="{{ route('process_destroy_final_report', ['program' => $program->id]) }}" onsubmit="confirmDeletion(event, name = 'el informe final')" class="flex flex-col items-center">
                                        @csrf
                                        @method('GET')
                                        <input type="text" name="final_report_path" value="{{ $program->final_report_path }}" class="bg-gray-700 text-white p-2 rounded mb-2 w-full">
                                        <a href="{{ $program->final_report_path }}" class="text-blue-400 underline mb-2 w-full text-center">Descargar informe final</a>
                                        <button class="border-2 border-gray-700 p-2 bg-gray-600 rounded-md text-white w-full" type="submit">Eliminar informe final</button>
                                    </form>
                                </div>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
