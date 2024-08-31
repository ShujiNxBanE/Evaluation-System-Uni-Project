<div class="inline-flex items-center bg-white mt-3 mr-3 rounded-xl space-x-4 w-auto h-auto justify-end float-right">
    <img src="{{ asset('resources/usuario.png') }}" alt="user" class="w-12 h-auto">
    <span class="inline text-base">{{ Auth::user()->name }} </span>
    <form id="logout-form" action="{{ route('logoutUser') }}" method="POST">
        @csrf
        <button class="inline bg-white hover:bg-red-300 p-3 rounded-md ..." >
            Cerrar Sesión
        </button>
    </form>
</div>
