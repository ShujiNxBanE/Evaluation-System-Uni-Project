<x-script_confirmDelete />
<ul>
    @foreach ($users as $user)
    <hr>
        <li>
            <span>Id del usuario: {{ $user->id }}</span> <br>
            <span>Nombre del usuario: {{ $user->name }}</span> <br>
            <span>Email del usuario: {{ $user->email }}</span> <br>
            <span>Fecha de creación del usuario: {{ $user->created_at }}</span> <br>
            <a href="{{ route('admin_edit_user', ['user' => $user->id]) }}">Editar Usuario</a>
            <form action="{{ route('admin_destroy_user', ['user' => $user->id]) }}" method="POST"
                onsubmit="confirmDeletion(event, name = 'este usuario')">
                @method('DELETE')
                @csrf
                <button type="submit">Eliminar Usuario</button>
            </form>
        </li>
    @endforeach
</ul>

<a href="{{ route('programs') }}">Volver a los programas</a>
