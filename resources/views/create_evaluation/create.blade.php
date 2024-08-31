<a href="{{ route('evaluations')}}">Volver a las evaluaciones</a>

<form action="{{ route('create_new_evaluation')}}">
    @method('GET')
    @csrf

    <label>Description:</label>
    <textarea name="description" cols="30" rows="4" maxlength="1000"></textarea>
    <br>
    <select name="category_id" class="form-control" required>

        <option value="">Seleccione la Categoria</option>

        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach

    </select>
    <button type="submit">
        Crear
    </button>
</form>
