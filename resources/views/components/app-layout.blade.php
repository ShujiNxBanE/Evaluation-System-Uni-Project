<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/nav.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen">

    <header class="header">
        <a href="{{ route('portfolio_index') }}" class="logo">Portafolio Electr&oacute;nico | Tarjeta de puntuaci&oacute;n</a>
        <input class="menu-btn" type="checkbox" id="menu-btn" />
        <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
        <ul class="menu">
          <li><a href="{{ route('portfolio_index') }}">Garantia</a></li>
          <li><a href="{{ route('structure') }}">Estructura</a></li>
          <li><a href="{{ route('ponderation') }}">Ponderacion</a></li>
          <li><a href="{{ route('considerations') }}">Consideraciones</a></li>
          <li>
            @if(Auth::user()->role_id == 1)
                <a href="{{ route('programs') }}">Ver Programas</a>
            @else
                <a href="{{ route('process_index') }}">Iniciar Proceso</a>
            @endif
        </li>
          <li>
            <form id="logout-form" action="{{ route('logoutUser') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
          </li>
        </ul>
    </header>

    <main class="main-content flex-grow">

        {{ $slot }}

    </main>

    <footer class="bg-white mt-3">
        <div class="container mx-auto px-4 py-4 flex flex-wrap justify-between items-center text-sm">
          <span class="text-gray-600">&copy; 2024 Mi Sitio Web</span>
          <span class="text-gray-600">Política de Privacidad</span>
          <span class="text-gray-600">Términos de Servicio</span>
        </div>
    </footer>

</body>
</html>
