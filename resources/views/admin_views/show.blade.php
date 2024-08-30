<h2>
    Nombre del programa: {{ $program->name }} <br>
    <span>Evaluador: {{ $evaluator }}</span>
</h2>

<h3>
    @if ($institutional_data == null)
        Aun no hay datos institucionales.
    @else
        Nombre de institucion: {{ $institutional_data->name }}
        <br>
        Año de creacion: {{ $institutional_data->creation_year }}
    @endif
</h3>

<h3>
    Categorias del programa
</h3>
<ul>
    @foreach ($program->categories as $category)
        <li>
            <a href="{{ route('admin_show_category', ['program' => $program->id, 'category' => $category->id]) }}">
                {{ $category->name }}
            </a>
            | {{ $category->number_of_evaluations }} | Puntaje total: {{ $category->total_score }} / {{ $category->max_score }}
        </li>
    @endforeach
</ul>

<h2>Puntajes totales</h2>
<p>Puntaje Total: {{ $totalScore }}</p>
<p>Puntaje Máximo: {{ $totalMaxScore }}</p>
<p>Total de indicadores: {{ $totalEvaluations }}</p>

<h3>Tabla de equivalencias de aprobación</h3>
<table>
    <thead>
        <tr>
            <th>CUMPLIMIENTO NUMÉRICO</th>
            <th>CALIFICACIÓN</th>
        </tr>
    </thead>
    <tbody>
        @php
            $previousScore = null;
        @endphp

        @foreach ($intervalScores as $index => $score)
        <tr>
            <td>
                @if ($previousScore === null)
                    {{ ceil($score) }} puntos
                @elseif ($index === array_key_last($intervalScores))
                    {{ ceil($previousScore - 1) }} o menos
                @else
                    {{ ceil($score) }} - {{ ceil($previousScore - 1) }}
                @endif
            </td>
            <td>{{ $evaluationCategories[$index] }}</td>
            @php
                $previousScore = $score;
            @endphp
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('programs')}}">Volver a los programas</a>
