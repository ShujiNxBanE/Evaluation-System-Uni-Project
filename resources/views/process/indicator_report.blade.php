<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informe de Resultados del Indicador</title>
    <script src="{{ asset('css/tailwindCss.js') }}"></script>
    <link rel="icon" href="{{ asset('portafolio.png') }}" type="image/png">
</head>
<body class="bg-white text-black min-h-screen flex flex-col justify-center">
    <header class="flex justify-start items-center p-4">
        <button type="button" class="flex items-center text-black"
            onclick="window.location.href='{{ route('process_category', ['program' => $program->id, 'category' => $category->id]) }}'">
            <img src="{{ asset('resources/flecha-izquierda-azul.png')}}" alt="flecha-izquierda-azul" class="w-8 h-auto mr-2">
            <span>Atrás</span>
        </button>
        <x-user_logout />
    </header>

    <div class="container mx-auto p-4 max-w-4xl bg-gray-100 text-black rounded-lg shadow-lg my-8">
        <div class="mb-4">
            <h1 class="text-2xl">Categoría: {{ $category->name }}</h1>
            <p class="text-justify">{{ $evaluation->description }}</p>
        </div>

        <form action="{{ route('process_create_new_report', ['program' => $program->id, 'category' => $category->id, 'evaluation' => $evaluation->id]) }}" method="GET">
            @csrf
            <div class="overflow-x-auto">
                <table class="w-full text-sm bg-gray-100 rounded-lg">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 text-left bg-gray-300">Puntaje</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2 px-4 bg-gray-200">
                                <label class="block">
                                    <input type="radio" name="score" value="0" class="mr-2"
                                    {{ isset($report) && $report->score === 0 ? 'checked' : '' }}/>
                                    <span class="font-semibold">No observado [0]</span> <br>
                                    <span class="ml-6 text-gray-600">El administrador no observa ningún indicador de la norma de calidad evaluada.</span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 bg-gray-200">
                                <label class="block">
                                    <input type="radio" name="score" value="1" class="mr-2"
                                    {{ isset($report) && $report->score === 1 ? 'checked' : '' }}/>
                                    <span class="font-semibold">Escasamente observado [1]</span> <br>
                                    <span class="ml-6 text-gray-600">El administrador ha identificado una mínima presencia de la norma de calidad evaluada. Esta área todavía necesita muchas mejoras.</span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 bg-gray-200">
                                <label class="block">
                                    <input type="radio" name="score" value="2" class="mr-2"
                                    {{ isset($report) && $report->score === 2 ? 'checked' : '' }}/>
                                    <span class="font-semibold">Implementación moderada [2]</span> <br>
                                    <span class="ml-6 text-gray-600">El administrador ha identificado una implementación moderada de la norma de calidad. Esta área todavía necesita ciertas mejoras.</span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 bg-gray-200">
                                <label class="block">
                                    <input type="radio" name="score" value="3" class="mr-2"
                                    {{ isset($report) && $report->score === 3 ? 'checked' : '' }}/>
                                    <span class="font-semibold">Cumple satisfactoriamente con el criterio [3]</span> <br>
                                    <span class="ml-6 text-gray-600">El administrador ha determinado que la norma de calidad se está implementando satisfactoriamente y no hay necesidad de mejora en esta área.</span>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                <label for="comments" class="block mb-2">Comentarios:</label>
                <textarea id="comments" name="comments" rows="4" class="w-full p-2 bg-gray-200 text-black rounded-md border border-gray-400" placeholder="Escribe tus comentarios aquí..." maxlength="500">{{ isset($report) ? $report->comments : '' }}</textarea>
            </div>

            <div class="mt-4">
                <label for="suggestions" class="block mb-2">Sugerencias:</label>
                <textarea id="suggestions" name="suggestions" rows="4" class="w-full p-2 bg-gray-200 text-black rounded-md border border-gray-400" placeholder="Escribe tus sugerencias aquí..." maxlength="500">{{ isset($report) ? $report->suggestions : '' }}</textarea>
            </div>

            <div class="flex justify-center mt-6">
                <button type="submit" class="text-white py-2 px-4 bg-blue-600 hover:bg-blue-500 rounded-md border border-gray-300">Guardar</button>
            </div>
        </form>
    </div>
</body>
</html>
