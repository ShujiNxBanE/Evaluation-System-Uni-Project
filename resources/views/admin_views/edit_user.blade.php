<h3>Actualizando usuario</h3>
<form action="{{ route('admin_store_user', ['user' => $user->id]) }}">
    @method('GET')
    @csrf
    <label>Nombre del usuario:</label>
    <input type="text" name="name" value="{{ $user->name }}" maxlength="255"> <br>
    <label>Email del usuario:</label>
    <input type="text" name="email" value="{{ $user->email }}" maxlength="255"> <br>
    <label>Contraseña del usuario:</label>
    <input type="text" name="password" placeholder="Nueva contraseña" required maxlength="255"> <br>

    <button type="submit">Actualizar</button>
</form>

<a href="{{ route('admin_show_users')}}">Atras</a>
