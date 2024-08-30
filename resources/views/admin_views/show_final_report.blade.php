<x-proceso-layout>
    <div class="container">
        <a href="{{ route('admin_show_program', ['program' => $program->id]) }}" class="text-xl">Atras</a>
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
                        <div class="flex justify-center">
                            <input type="text" name="final_report_path" value="{{ $program->final_report_path }}">
                            <button class="border-2 border-gray-700 p-2 bg-gray-300 rounded-md text-black ml-2"
                                type="submit">Descargar informe final</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</x-proceso-layout>
