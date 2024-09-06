<div class="fixed top-4 right-4 p-2 bg-gray-800 text-gray-100 rounded-xl shadow-xl flex items-center space-x-2 md:space-x-4 lg:space-x-6">
    <!-- Contenedor de la Imagen -->
    <div class="w-10 h-10 bg-gray-500 rounded-full flex items-center justify-center border border-gray-700">
        <img src="{{ asset('resources/usuario.png') }}" alt="user" class="w-8 h-8 rounded-full">
    </div>
    <!-- Nombre del Usuario -->
    <span class="text-xs md:text-base">{{ Auth::user()->name }}</span>
    <!-- Botón de Cierre de Sesión -->
    <form id="logout-form" action="{{ route('logoutUser') }}" method="POST" class="flex-shrink-0">
        @csrf
        <button type="submit" class="bg-gray-700 hover:bg-gray-600 text-white text-xs py-1 px-2 md:text-sm md:py-2 md:px-4 rounded-md transition duration-200">
            Cerrar Sesión
        </button>
    </form>
</div>
