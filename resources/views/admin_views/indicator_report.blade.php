<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informe de Resultados del Indicador</title>
    <script src="{{ asset('css/tailwindCss.js') }}"></script>
    <link rel="icon" href="{{ asset('portafolio.png') }}" type="image/png">
    <style>
        .custom-radio:checked {
            accent-color: #1d4ed8; /* Tailwind's blue-900 */
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen flex flex-col justify-center">
    <header class="flex justify-between items-center p-4">
        <button type="button" class="flex items-center"
            onclick="window.location.href='{{ route('admin_show_category', ['program' => $program->id, 'category' => $category->id]) }}'">
            <img src="{{ asset('resources/flecha-izquierda-azul.png')}}" alt="flecha-izquierda-azul" class="w-8 h-auto">
        </button>
        <x-user_logout />
    </header>

    <div class="container mx-auto p-4 max-w-4xl text-gray-900 rounded-lg shadow-lg bg-white mt-4">
        <div class="mb-4 p-4 bg-gray-200 rounded-lg">
            <h1 class="text-2xl">{{ $category->name }}</h1>
            <p class="text-justify">{{ $evaluation->description }}</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm bg-gray-100 rounded-lg">
                <thead>
                    <tr>
                        <th class="py-2 px-4 text-left bg-gray-200">Puntaje</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach([0 => 'No observado <br> El administrador no observa ningún indicador de la norma de calidad evaluada.',
                                1 => 'Escasamente observado <br> El administrador ha identificado una mínima presencia de la norma de calidad evaluada. Esta área todavía necesita muchas mejoras.',
                                2 => 'Implementación moderada <br> El administrador ha identificado una implementación moderada de la norma de calidad. Esta área todavía necesita ciertas mejoras.',
                                3 => 'Cumple satisfactoriamente con el criterio <br> El administrador ha determinado que la norma de calidad se está implementando satisfactoriamente y no hay necesidad de mejora en esta área.'] as $value => $label)
                    <tr>
                        <td class="py-2 px-4 bg-gray-200">
                            <label class="flex items-center">
                                <input type="radio" name="score" value="{{ $value }}" class="mr-2 custom-radio" {{ $report->score == $value ? 'checked' : '' }} disabled />
                                <span class="{{ $report->score == $value ? 'font-semibold text-blue-600' : '' }}">
                                    [{{ $value }}] {!! $label !!}
                                </span>
                            </label>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <label for="comments" class="block mb-2">Comentarios:</label>
            <textarea id="comments" name="comments" rows="4" class="w-full p-2 bg-gray-200 text-gray-900 rounded-md border border-gray-300" readonly>{{ $report->comments }}</textarea>
        </div>

        <div class="mt-4">
            <label for="suggestions" class="block mb-2">Sugerencias:</label>
            <textarea id="suggestions" name="suggestions" rows="4" class="w-full p-2 bg-gray-200 text-gray-900 rounded-md border border-gray-300" readonly>{{ $report->suggestions }}</textarea>
        </div>
    </div>
</body>
</html>
