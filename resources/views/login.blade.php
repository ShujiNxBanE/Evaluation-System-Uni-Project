<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portafolio Electrónico</title>
    <link rel="icon" href="{{ asset('portafolio.png') }}" type="image/png">
    <script src="{{ asset('css/tailwindCss.js') }}"></script>
</head>
<body class="bg-white text-gray-900 flex flex-col min-h-screen">
    <!-- Header -->
    <header class="bg-blue-500 text-white p-4 shadow-md">
        <div class="container mx-auto flex items-center justify-between">
            <img src="{{ asset('resources/logo_caled.gif') }}" alt="CALED" class="w-16 h-auto">
            <p class="text-xl font-semibold">Instituto Latinoamericano y del Caribe de Calidad en Educación Superior a Distancia</p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center">
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
            <h3 class="text-2xl font-bold mb-6 text-center text-gray-900">Bienvenido!</h3>

            <form action="{{ route('loginUser') }}" method="GET">
                @csrf
                @if($errors->has('login_error'))
                    <div class="mb-4 bg-red-100 text-red-800 p-3 rounded-md">
                        {{ $errors->first('login_error') }}
                    </div>
                @endif

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email" class="mt-1 block w-full px-3 py-2 bg-gray-200 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm text-gray-900" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                    <input type="password" name="password" id="password" placeholder="Contraseña" class="mt-1 block w-full px-3 py-2 bg-gray-200 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm text-gray-900" required>
                </div>

                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Enviar
                </button>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-blue-500 text-white text-center p-4 mt-5">
        <p>CALED</p>
        <p>Contacto: info_caled@utpl.edu.ec</p>
        <p>Teléfono: 593 - 73701444, ext: 2238</p>
        <p>&copy; 2016</p>
    </footer>
</body>
</html>
