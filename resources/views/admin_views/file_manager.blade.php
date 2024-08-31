<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
        <h1>Gestor de Archivos</h1>
    </header>
    <div class="content">
        <div class="shadow-md p-4 rounded-xl bg-blue-700 text-left text-justify text-base">
            <h1>{{ $category->name }}</h1>
            <p> {{ $evaluation->description }}</p>
        </div>

        <header class="gestor text-center bg-gray-900 mt-5">
            Lista de Archivos
        </header>
        <div class="shadow-md p-4 rounded-b-xl bg-blue-700 text-left text-justify text-md">
            <table class="table-fixed w-full">
                <thead>
                    <tr>
                        <th colspan="1">Estado</th>
                        <th colspan="3">Descripción</th>
                        <th colspan="1">Descargar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($evidences as $evidence)
                        <tr>
                            <td colspan="1">
                                <h1>{{ $evidence->state }}</h1>
                            </td>
                            <td colspan="3">
                                <h1>{{ $evidence->description }}</h1>
                            </td>
                            <td colspan="1">
                                <h1>{{ $evidence->file_url }}</h1>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
