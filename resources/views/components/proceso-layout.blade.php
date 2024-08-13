<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/procesoLayout.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <ul class="sidebar">
        <li onclick="window.location.href='{{ url('/app/proceso') }}'">
            <img src="{{ asset('resources/flecha-izquierda.png')}}" alt="flecha-izquierda"
            class="w-4 h-auto float-left mr-2">
            PROGRAMA EVALUACIÓN
        </li>
        <li onclick="window.location.href='{{ url('/app/proceso/datosInstitucionales') }}'">Datos institucionales</li>
        <li onclick="window.location.href='{{ url('/app/proceso/tarjetaDePuntuacion') }}'">
            <img src="{{ asset('resources/alfiler.png')}}" alt="alfiler"
            class="w-4 h-auto float-left mr-2">
            TARJETA DE PUNTUACIÓN
        </li>
        <li onclick="window.location.href='{{ url('/app/proceso/apoyoInstitucional') }}'">Apoyo Institucional</li>
        <li onclick="window.location.href='{{ url('/app/proceso/apoyoTecnologico') }}'">Apoyo Tecnológico</li>
        <li onclick="window.location.href='{{ url('/app/proceso/desarrolloDiseno') }}'">Desarrollo y diseño instruccional</li>
        <li onclick="window.location.href='{{ url('/app/proceso/estructuraPrograma') }}'">Estructura del programa en línea</li>
        <li onclick="window.location.href='{{ url('/app/proceso/ensenanzaAprendizaje') }}'">Enseñanza y aprendizaje</li>
        <li onclick="window.location.href='{{ url('/app/proceso/participacion') }}'">Participación social y estudiantil</li>
        <li onclick="window.location.href='{{ url('/app/proceso/apoyoDocente') }}'">Apoyo a los docentes</li>
        <li onclick="window.location.href='{{ url('/app/proceso/apoyoAlumno') }}'">Apoyo a los alumnos</li>
        <li onclick="window.location.href='{{ url('/app/proceso/evaluacionValoracion') }}'">Evaluación y valoración</li>
        <li onclick="window.location.href='{{ url('/app/proceso/informeFinal') }}'">
            <img src="{{ asset('resources/alfiler.png')}}" alt="alfiler"
            class="w-4 h-auto float-left mr-2"
            >
            INFORME FINAL DE LA EVALUACIÓN
        </li>
        <li onclick="window.location.href='{{ url('/app/proceso/puntuacion') }}'">Puntuación</li>
        <li onclick="window.location.href='{{ url('/app/proceso/subirInformeFinal') }}'">Subir Informe final</li>
    </ul>

      <input type="checkbox" id="sidebar-btn" class="sidebar-btn" checked/>
      <label for="sidebar-btn"></label>

      <div class="content">

        {{ $slot }}

      </div>
</body>
</html>
