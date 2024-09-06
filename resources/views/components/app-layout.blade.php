<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Portafolio Electrónico | Tarjeta de Puntuación')</title>
    <script src="{{ asset('css/tailwindCss.js') }}"></script>
    <link rel="icon" href="{{ asset('portafolio.png') }}" type="image/png">
</head>
<body class="bg-gray-900 text-gray-100 flex flex-col min-h-screen">

    <!-- Header -->
    <header class="bg-gray-800 text-gray-100 p-4 shadow-md relative">
        <div class="container mx-auto flex flex-wrap items-center justify-between">
            <a href="{{ route('portfolio_index') }}" class="text-lg font-semibold hover:text-green-300 mb-2 md:mb-0">
                Tarjeta de Puntuación
            </a>
            <nav class="hidden md:flex items-center space-x-4 flex-wrap">
                <a href="{{ route('portfolio_index') }}" class="px-4 py-2 rounded bg-green-700 hover:bg-green-800 text-white font-medium transition duration-200">Garantía</a>
                <a href="{{ route('structure') }}" class="px-4 py-2 rounded bg-green-700 hover:bg-green-800 text-white font-medium transition duration-200">Estructura</a>
                <a href="{{ route('ponderation') }}" class="px-4 py-2 rounded bg-green-700 hover:bg-green-800 text-white font-medium transition duration-200">Ponderación</a>
                <a href="{{ route('considerations') }}" class="px-4 py-2 rounded bg-green-700 hover:bg-green-800 text-white font-medium transition duration-200">Consideraciones</a>
                    @if(Auth::user()->role_id == 1)
                    <a href="{{ route('programs') }}" class="px-4 py-2 rounded bg-green-700 hover:bg-green-800 text-white font-medium transition duration-200">
                        Ver Programas
                    </a>
                    @else
                    <a href="{{ route('process_index') }}" class="px-4 py-2 rounded bg-green-700 hover:bg-green-800 text-white font-medium transition duration-200">
                        Iniciar Proceso
                    </a>
                    @endif
                <!-- Nombre del Usuario -->
                <span class="text-gray-300 mx-4 text-sm hidden md:block">Hola, {{ Auth::user()->name }}</span>
                <!-- Botón de cierre de sesión -->
                <form id="logout-form" action="{{ route('logoutUser') }}" method="POST" class="flex-shrink-0">
                    @csrf
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-md transition duration-200 text-sm">
                        Cerrar Sesión
                    </button>
                </form>
            </nav>
            <!-- Botón del menú para dispositivos móviles -->
            <button class="md:hidden text-white focus:outline-none" id="menu-button">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        <!-- Menú desplegable para móviles -->
        <nav class="md:hidden mt-4 space-y-2 hidden" id="mobile-menu">
            <a href="{{ route('portfolio_index') }}" class="block px-4 py-2 rounded bg-green-700 hover:bg-green-800 text-white font-medium transition duration-200">Garantía</a>
            <a href="{{ route('structure') }}" class="block px-4 py-2 rounded bg-green-700 hover:bg-green-800 text-white font-medium transition duration-200">Estructura</a>
            <a href="{{ route('ponderation') }}" class="block px-4 py-2 rounded bg-green-700 hover:bg-green-800 text-white font-medium transition duration-200">Ponderación</a>
            <a href="{{ route('considerations') }}" class="block px-4 py-2 rounded bg-green-700 hover:bg-green-800 text-white font-medium transition duration-200">Consideraciones</a>
            <a href="{{ route('programs') }}" class="block px-4 py-2 rounded bg-green-700 hover:bg-green-800 text-white font-medium transition duration-200">
                @if(Auth::user()->role_id == 1)
                    Ver Programas
                @else
                    Iniciar Proceso
                @endif
            </a>
            <form id="logout-form" action="{{ route('logoutUser') }}" method="POST" class="mt-2">
                @csrf
                <button type="submit" class="block w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-md transition duration-200 text-sm">
                    Cerrar Sesión
                </button>
            </form>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="flex-grow p-6">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-100 p-4 mt-3">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center text-sm">
            <span>&copy; 2024 Potafolio Electrónico</span>
            <div class="flex space-x-4 mt-2 md:mt-0">
                <a href="#" class="hover:text-green-300">Política de Privacidad</a>
                <a href="#" class="hover:text-green-300">Términos de Servicio</a>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('menu-button').addEventListener('click', function () {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
