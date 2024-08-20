<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <button onclick="window.location.href='{{ route('portfolio_index') }}'"
    class=" border-gray-500 p-2 mt-2 ml-2 rounded-lg bg-black shadow-xl text-white"
    >
    Atras
    </button>

    <div class="table-title">
        <h3 class="text-center ">Crear Programa</h3>
        <button class="border-2 border-black rounded-xl p-1 bg-gray-300">Nuevo Programa</button>
    </div>

    <table class="table-fill">
        <thead>
            <th class="text-center" colspan="2">Nombre Programa</th>
            <th class="text-center" colspan="2">Acciones</th>
        </thead>
        <tbody class="table-hover">
        <tr>
            <td class="text-left" colspan="2">Programa 1</td>
            <td class="" colspan="2">
                <button type="button">
                    <img src="{{asset('resources/editar.png')}}" alt="editar" class="w-12 h-auto">
                </button>
                <button type="button">
                    <img src="{{asset('resources/eliminar.png')}}" alt="eliminar" class="w-12 h-auto">
                </button>
            </td>
        </tr>
        </tbody>
    </table>
</body>
</html>
