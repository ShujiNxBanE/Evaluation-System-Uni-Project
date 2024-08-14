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

    <button onclick="window.location.href='{{ url('/app') }}'"
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
        <tr>
            <td class="text-left"
            onclick="window.location.href='{{ url('/app/proceso/datosInstitucionales') }}'">Programa 1</td>
            <td class="text-left"
            onclick="window.location.href='{{ url('/app/proceso/datosInstitucionales') }}'">Evaluaciones realizadas: 1 / 9</td>
        </tr>
        <tr>
            <td class="text-left">Programa 2</td>
            <td class="text-left">Evaluaciones realizadas: 2 / 9</td>
        </tr>
        </tbody>
    </table>
</body>
</html>
