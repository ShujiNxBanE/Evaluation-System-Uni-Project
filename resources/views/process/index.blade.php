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
        <h3 class="text-center ">Lista de tus programas</h3>
        <p class="text-center text-white ">Estimado evaluador, a continuación seleccione el programa a evaluar.</p>
    </div>

    <table class="table-fill">
        <thead>
            <th class="text-center" colspan="2">Selección del Programa</th>
        </thead>
        <tbody class="table-hover">
            @foreach ($programs as $program)
            <tr onclick="window.location.href='{{ route('process_program', ['program' => $program->id]) }}'">
                <td class="text-left">{{ $program->name}}</td>
                <td class="text-left">{{ $program->has_institutional_data ? 'Revisado' : 'No Revisado' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
