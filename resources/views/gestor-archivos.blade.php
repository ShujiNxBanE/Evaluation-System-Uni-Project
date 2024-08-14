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
            onclick="window.location.href='{{ url('/app/proceso/estructuraPrograma') }}'">
            <img src="{{ asset('resources/flecha-izquierda-azul.png')}}" alt="flecha-izquierda-azul"
                class="w-8 h-auto float-left">
        </button>
        <h1>Gestor de Archivos</h1>
    </header>
    <div class="content">
        <div class="shadow-md p-4 rounded-xl bg-blue-700 text-left text-justify text-base">
            <h1>AT. CATEGORÍA APOYO TECNOLÓGICO</h1>
            <p>AT1. Se ha implementado un plan operativo documentado sobre tecnologías que incluye medidas de seguridad electrónicas (p. ej., protección de contraseñas, cifrado, exámenes en línea o supervisión segura etc.) para garantizar las normas de calidad de acuerdo a la normativa internacional.</p>
        </div>
        <header class="gestor text-center bg-gray-900 mt-5">
            Registrar Archivos
        </header>
        <div class="p-4 bg-blue-700 text-justify text-md">
            <table class="m-auto">
                <td>
                    <h1 class="text-center text-black">Descripción</h1>
                    <textarea name="Descripcion" id="" cols="60" rows="5" class="text-black pl-1 pr-1"></textarea>
                </td>
                <td>
                    <input type="file" name="" id="" class="ml-10 text-black">
                </td>
                <td>
                    <button type="button" class="border-gray-900 border-2 bg-gray-300 p-1 text-sm rounded-md text-black">Subir</button>
                </td>
            </table>
        </div>

        <header class="gestor text-center bg-gray-900 mt-5">
            Lista de Archivos
        </header>
        <div class="shadow-md p-4 rounded-b-xl bg-blue-700 text-left text-justify text-md">
            <table class="table-fixed">
                <thead>
                    <th colspan="1">Estado</th>
                    <th colspan="3">Descripción</th>
                    <th colspan="1">Descargar</th>
                    <th colspan="1">Opciones</th>
                </thead>
                <td colspan="1">
                    <h1>Estado</h1>
                </td>
                <td colspan="3">
                    <h1>Estado</h1>
                </td>
                <td colspan="1">
                    <h1>Estado</h1>
                </td>
                <td colspan="1">
                    <h1>Estado</h1>
                </td>
            </table>
        </div>
    </div>
</body>
</html>
