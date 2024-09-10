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
<body class="bg-gray-100 text-gray-900 min-h-screen p-4">
    <div class="container mx-auto p-4 max-w-4xl">
        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('admin_show_program', ['program' => $program->id]) }}" class="text-lg bg-gray-200 hover:bg-gray-300 text-gray-900 py-2 px-4 rounded absolute left-4 top-4">Atrás</a>
            <div class="absolute right-4 top-4">
                <x-user_logout />
            </div>
        </div>
        <div class="bg-white text-gray-900 rounded-lg shadow-lg p-4 mt-12">
            <h2 class="text-center text-2xl mb-3">INFORME FINAL</h2>
            <div class="overflow-x-auto">
                <table class="w-full table-auto text-sm bg-gray-50 rounded-lg">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 text-center bg-gray-200 text-gray-900" colspan="2">DOCUMENTO INFORME FINAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2 px-4 text-justify bg-gray-100 text-gray-900">
                                Informe de la autoevaluación
                            </td>
                            <td class="py-2 px-4 bg-gray-100 text-gray-900">
                                <div class="flex justify-center items-center space-x-2">
                                    <input type="text" name="final_report_path" value="{{ $program->final_report_path }}" class="bg-gray-200 text-gray-900 p-2 rounded-md w-full md:w-auto">
                                    <button class="border-2 border-gray-300 p-2 bg-gray-200 rounded-md text-gray-900" type="submit">
                                        <a href="{{ route('downloadFinalReport', ['filename' => $program->final_report_path]) }}">
                                            Descargar informe final
                                        </a>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
