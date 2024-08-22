<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <button onclick="window.location.href='{{ route('portfolio_index') }}'"
    class=" border-gray-500 p-2 mt-2 ml-2 rounded-lg bg-black shadow-xl text-white"
    >
    Atras
    </button>

    <div class="table-title">
        <h3 class="text-center ">Lista de programas</h3>
        <button class="border-2 border-black rounded-xl p-1 bg-gray-300">
            <a href="{{ route('create_programs')}}">Nuevo Programa</a>
        </button>
        <button class="border-2 border-black rounded-xl p-1 bg-gray-300">
            <a href="{{ route('categories')}}">Categorias</a>
        </button>
    </div>

    <table class="table-fill">
        <thead>
            <th class="text-center" colspan="2">Nombre Programa</th>
            <th class="text-center" colspan="2">Acciones</th>
        </thead>
        <tbody class="table-hover">

            @foreach ($programs as $program)
                <tr>
                    <td class="text-left" colspan="2"> {{ $program->name }} </td>
                    <td class="" colspan="2">
                        <button type="button">
                            <a href="{{ route('show_program_details', ['program' => $program->id])}}">
                                <img src="{{asset('resources/details.png')}}" alt="details" class="w-12 h-auto">
                            </a>
                        </button>
                        <button type="button">
                            <a href="{{ route('edit_program', ['program' => $program->id]) }}">
                                <img src="{{asset('resources/edit.png')}}" alt="edit" class="w-12 h-auto">
                            </a>
                        </button>
                        <form action="{{ route('destroy_program', ['program' => $program->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit">
                                <img src="{{asset('resources/delete.png')}}" alt="delete" class="w-12 h-auto">
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>
</html>
