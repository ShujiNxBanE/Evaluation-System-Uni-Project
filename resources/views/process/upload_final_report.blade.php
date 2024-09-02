<x-proceso-layout>
    <x-script_confirmDelete />
    <div class="container">
        <a href="{{ route('process_program', ['program' => $program->id]) }}" class="text-xl">Atras</a>
        <h2 class="text-center text-2xl mb-3">
            INFORME FINAL
        </h2>

        <h2 class="text-center text-xl mb-3">
            Estimado evaluador en este apartado ingresar el informe final de la evaluación del programa.
        </h2>

        <table class="table table-fixed text-sm">
            <thead>
                <tr>
                    <th colspan="2" class="text-center">
                        DOCUMENTO INFORME FINAL
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="1">
                        <p class="text-justify">
                            Informe de la autoevaluación
                    </td>
                    <td colspan="1">
                        @if ($program->final_report_path == null)
                            <div class="flex justify-center">
                                <form action="{{ route('process_store_final_report', ['program' => $program->id]) }}" enctype="multipart/form-data" method="POST">
                                    @method('POST')
                                    @csrf
                                    <input type="file" name="final_report_path" required>
                                    <button class="border-2 border-gray-700 p-2 bg-gray-300 rounded-md text-black ml-2"
                                        type="submit">Subir Informe</button>
                                </form>
                            </div>
                        @else
                            <div class="flex justify-center">
                                <form action="{{ route('process_destroy_final_report', ['program' => $program->id]) }}"
                                    onsubmit="confirmDeletion(event, name = 'el informe final')">
                                    @method('GET')
                                    @csrf
                                    <input type="text" name="final_report_path" value="{{ $program->final_report_path }}">
                                    <a href="">Descargar informe final</a>
                                    <button class="border-2 border-gray-700 p-2 bg-gray-300 rounded-md text-black ml-2"
                                    type="submit">Eliminar informe final</button>
                                </form>
                            </div>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</x-proceso-layout>
