<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informe de Resultados del Indicador</title>
    <link rel="stylesheet" href="{{ asset('css/gestor-archivos.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header class="gestor text-center text-2xl">
        <button type="button" class="float-left"
            onclick="window.location.href='{{ route('admin_show_category', ['program' => $program->id, 'category' => $category->id]) }}'">
            <img src="{{ asset('resources/flecha-izquierda-azul.png')}}" alt="flecha-izquierda-azul"
                class="w-8 h-auto float-left">
        </button>
        <h1>Informe de Resultados del Indicador</h1>
    </header>
    <div class="content">
        <div class="shadow-md p-4 rounded-xl bg-blue-700 text-left text-justify text-base">
            <h1>{{ $category->name }}</h1>
            <p>{{ $evaluation->description }}</p>
        </div>
        <div class="p-4">
            <table class="min-w-full border border-zinc-300">
                <thead>
                    <tr>
                        <th class="border border-zinc-300 text-left p-2">Puntaje</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach([0 => 'No observado <br> El administrador no observa ningún indicador de la norma de calidad evaluada.',
                            1 => 'Escasamente observado <br> El administrador ha identificado una mínima presencia de la norma de calidad evaluada. Esta área todavía necesita muchas mejoras.',
                            2 => 'Implementación moderada <br> El administrador ha identificado una implementación moderada de la norma de calidad. Esta área todavía necesita ciertas mejoras.',
                            3 => 'Cumple satisfactoriamente con el criterio <br> El administrador ha determinado que la norma de calidad se está implementando satisfactoriamente y no hay necesidad de mejora en esta área.'] as $value => $label)
                    <tr>
                        <td class="border border-zinc-300 p-2">
                            <label class="flex items-center">
                                <input type="radio" name="score" value="{{ $value }}" class="mr-2" {{ $report->score == $value ? 'checked' : '' }} />
                                [{{ $value }}] {!! $label !!}
                            </label>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4 text-base">
                <label for="comments" class="block mb-2">Comentarios:</label>
                <textarea id="comments" name="comments" rows="4" class="w-full border border-zinc-300 p-2 text-black">{{ $report->comments }}</textarea>
            </div>

            <div class="mt-4 text-base">
                <label for="suggestions" class="block mb-2">Sugerencias:</label>
                <textarea id="suggestions" name="suggestions" rows="4" class="w-full border border-zinc-300 p-2 text-black">{{ $report->suggestions }}</textarea>
            </div>
        </div>
    </div>
</body>
</html>
