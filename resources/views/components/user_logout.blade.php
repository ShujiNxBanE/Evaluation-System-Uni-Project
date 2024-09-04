<div class="fixed top-4 right-4 flex items-center bg-gray-800 text-gray-100 rounded-xl shadow-lg p-3 space-x-4">
    <img src="{{ asset('resources/usuario.png') }}" alt="user" class="w-12 h-auto rounded-full border border-gray-700">
    <span class="text-base">{{ Auth::user()->name }}</span>
    <form id="logout-form" action="{{ route('logoutUser') }}" method="POST" class="flex-shrink-0">
        @csrf
        <button type="submit" class="bg-gray-700 hover:bg-gray-600 text-white py-2 px-4 rounded-md transition duration-200">
            Cerrar Sesión
        </button>
    </form>
</div>
