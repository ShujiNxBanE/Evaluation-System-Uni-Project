<a href="{{ route('programs') }}">Volver a los programas</a>
<a href="{{ route('create_reports') }}">Crear reportes</a>
<ul> 
    @foreach ($reports as $report)
        <li>
            <h3>Numero de reporte: {{ $report->id }}</h3>
            <a href="{{ route('show_report_details', ['report' => $report->id]) }}">Detalles</a>
        </li>
    @endforeach
</ul>



