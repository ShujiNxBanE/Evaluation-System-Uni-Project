<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Evidence;
use App\Models\Institutional_Data;
use App\Models\Program;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\PdfToText\Pdf;

class ProcessController extends Controller
{
    public function index()
    {
        $programs = Program::where('user_id', Auth::user()->id)
                   ->orderBy('created_at', 'desc')
                   ->get();

        foreach ($programs as $program) {
            $program->has_institutional_data = Institutional_Data::where('program_id', $program->id)->exists();
        }

        return view('process.index', compact('programs'));
    }

    public function show($program)
    {
        $program = Program::with('categories.evaluations')->findOrFail($program);
        $institutional_data = Institutional_Data::where('program_id', $program->id)->first();

        $totalScore = 0;
        $totalMaxScore = 0;
        $totalEvaluations = 0;

        foreach ($program->categories as $category) {
            $category->total_score = Report::where('program_id', $program->id)
                                            ->whereHas('evaluation', function ($query) use ($category) {
                                                $query->where('category_id', $category->id);
                                            })
                                            ->sum('score');

            $category->number_of_evaluations = $category->evaluations->count();
            $category->max_score = $category->number_of_evaluations * 3;

            $totalScore += $category->total_score;
            $totalMaxScore += $category->max_score;

            $totalEvaluations += $category->number_of_evaluations;
        }

        $intervals = [100, 90, 80, 70, 60, 0];
        $intervalScores = [];
        foreach ($intervals as $percentage) {
            $intervalScores[] = ($percentage / 100) * $totalMaxScore;
        }

        rsort($intervalScores);

        $evaluationCategories = [
            'Puntuación totalmente satisfactoria',
            'Ejemplar (o muy satisfactoria)',
            'Aceptable (satisfactoria, se recomiendan mejoras moderadas)',
            'Marginal (Poco satisfactoria, se necesitan mejoras considerables en múltiples áreas)',
            'Inadecuado (No satisfactorio, muchas áreas a lo largo del programa necesitan mejoras considerables)',
            'Inaceptable (nada satisfecho)',
        ];

        return view('process.show', compact(
                    'program', 'institutional_data',
                    'totalScore', 'totalMaxScore',
                    'totalEvaluations', 'intervalScores',
                    'evaluationCategories'));
    }

    public function create_institutional_data($program)
    {
        $program = Program::find($program);
        return view('process.create_institutional_data', compact('program'));
    }

    public function store_institutional_data(Request $request, $program)
    {

        $institutional_data = new Institutional_Data();
        $institutional_data->name = $request->name;
        $institutional_data->country = $request->country;
        $institutional_data->creation_year = $request->creation_year;
        $institutional_data->institution_character = $request->institution_character;
        $institutional_data->program_edition = $request->program_edition;
        $institutional_data->web_address = $request->web_address;
        $institutional_data->postal_address = $request->postal_address;
        $institutional_data->recognition_resolution = $request->recognition_resolution;
        $institutional_data->current_edition = $request->current_edition;
        $institutional_data->start_date = $request->start_date;
        $institutional_data->end_date = $request->end_date;
        $institutional_data->number_of_hours = $request->number_of_hours;
        $institutional_data->total_students = $request->total_students;
        $institutional_data->total_teaching_staff = $request->total_teaching_staff;
        $institutional_data->total_administrative_staff = $request->total_administrative_staff;
        $institutional_data->certificate = $request->certificate;
        $institutional_data->program_id = $program;
        $institutional_data->save();

        return redirect()->route('process_program', ['program' => $program]);
    }

    public function edit_institutional_data($program)
    {
        $program = Program::find($program);
        $institutional_data = Institutional_Data::where('program_id', $program->id)->first();
        return view('process.edit_institutional_data', compact('program', 'institutional_data'));
    }

    public function update_institutional_data(Request $request, $program)
    {
        $program = Program::find($program);
        $institutional_data = Institutional_Data::where('program_id', $program->id)->first();
        $institutional_data->name = $request->name;
        $institutional_data->country = $request->country;
        $institutional_data->creation_year = $request->creation_year;
        $institutional_data->institution_character = $request->institution_character;
        $institutional_data->program_edition = $request->program_edition;
        $institutional_data->web_address = $request->web_address;
        $institutional_data->postal_address = $request->postal_address;
        $institutional_data->recognition_resolution = $request->recognition_resolution;
        $institutional_data->current_edition = $request->current_edition;
        $institutional_data->start_date = $request->start_date;
        $institutional_data->end_date = $request->end_date;
        $institutional_data->number_of_hours = $request->number_of_hours;
        $institutional_data->total_students = $request->total_students;
        $institutional_data->total_teaching_staff = $request->total_teaching_staff;
        $institutional_data->total_administrative_staff = $request->total_administrative_staff;
        $institutional_data->certificate = $request->certificate;
        $institutional_data->program_id = $program->id;
        $institutional_data->save();

        return redirect()->route('process_program', ['program' => $program->id]);
    }

    public function show_category($program, $category)
    {
        $program = Program::findOrFail($program);
        $category = $program->categories()->where('id', $category)->firstOrFail();
        $evaluations = $category->evaluations;
        $reports = Report::whereIn('evaluation_id', $evaluations->pluck('id'))
                         ->where('program_id', $program->id)
                         ->get()
                         ->keyBy('evaluation_id');

        return view('process.show_category', compact('evaluations', 'program', 'category', 'reports'));
    }


    public function create_evidence($program, $category, $evaluation)
    {
        $program = Program::findOrFail($program);

        $category = $program->categories()->where('id', $category)->firstOrFail();

        $evaluation = $category->evaluations()->where('id', $evaluation)->firstOrFail();

        $evidences = Evidence::where('evaluation_id', $evaluation->id)
            ->where('program_id', $program->id)
            ->orderBy('created_at', 'desc') // Ordenar por fecha de creación en orden descendente
            ->paginate(4);

        return view('process.file_manager' , compact('program', 'category', 'evaluation', 'evidences'));
    }

    public function store_evidence(Request $request, $program, $category, $evaluation)
    {
        $request->validate([
            'file_url' => 'required|mimes:pdf|max:20480', // 20480 KB = 20 MB
        ]);

        $program = Program::findOrFail($program);
        $category = $program->categories()->where('id', $category)->firstOrFail();
        $evaluation = $category->evaluations()->where('id', $evaluation)->firstOrFail();

        $filePath = $request->file('file_url')->store('', 'local');

        $pdfPath = storage_path('app/evidences/' . $filePath);
        $pdfPath = str_replace('\\', '/', $pdfPath);

        $evidence = new Evidence();
        $evidence->description = $request->description;
        $evidence->file_url = $filePath;
        $evidence->state = 0;
        $evidence->evaluation_id = $evaluation->id;
        $evidence->program_id = $program->id;
        $evidence->created_at = now();
        $evidence->updated_at = now();
        $evidence->save();

        return redirect()->route('process_create_evidence',
            ['program' => $program->id, 'category' => $category->id, 'evaluation' => $evaluation->id]);
    }

    public function delete_evidence($program, $category, $evaluation, $evidence)
    {
        $program = Program::findOrFail($program);

        $category = $program->categories()->where('id', $category)->firstOrFail();

        $evaluation = $category->evaluations()->where('id', $evaluation)->firstOrFail();

        $evidence = Evidence::where('id', $evidence)
                            ->where('evaluation_id', $evaluation->id)
                            ->where('program_id', $program->id)
                            ->firstOrFail();

        if($evidence->file_url)
        {
            Storage::disk('local')->delete($evidence->file_url);
        }

        $evidence->delete();

        return redirect()->route('process_create_evidence',
            ['program' => $program->id, 'category' => $category->id, 'evaluation' => $evaluation->id]);
    }

    public function create_report($program, $category, $evaluation)
    {
        $program = Program::findOrFail($program);
        $category = $program->categories()->where('id', $category)->firstOrFail();
        $evaluation = $category->evaluations()->where('id', $evaluation)->firstOrFail();

        $report = Report::where('evaluation_id', $evaluation->id)
                        ->where('program_id', $program->id)
                        ->first();

        return view('process.indicator_report', compact('program', 'category', 'evaluation', 'report'));
    }


    public function store_report(Request $request, $program, $category, $evaluation)
    {
        $program = Program::findOrFail($program);
        $category = $program->categories()->where('id', $category)->firstOrFail();
        $evaluation = $category->evaluations()->where('id', $evaluation)->firstOrFail();

        $existingReport = Report::where('evaluation_id', $evaluation->id)
                                ->where('program_id', $program->id)
                                ->first();

        if ($existingReport) {
            return redirect()->back()->withErrors(['error' => 'Ya existe un reporte para esta evaluación.']);
        }

        $report = new Report();
        $report->score = $request->score;
        $report->comments = $request->comments;
        $report->suggestions = $request->suggestions;
        $report->evaluation_id = $evaluation->id;
        $report->program_id = $program->id;
        $report->created_at = now();
        $report->updated_at = now();
        $report->save();

        return redirect()->route('process_edit_report', [
            'program' => $program->id,
            'category' => $category,
            'evaluation' => $evaluation->id,
            'report' => $report->id
        ]);
    }

    public function edit_report($program, $category, $evaluation, $report)
    {
        $program = Program::findOrFail($program);
        $category = $program->categories()->where('id', $category)->firstOrFail();
        $evaluation = $category->evaluations()->where('id', $evaluation)->firstOrFail();
        $report = $evaluation->report()->where('id', $report)->firstOrFail();

        return view('process.indicator_report_edit', compact('program', 'category', 'evaluation', 'report'));
    }

    public function update_report(Request $request, $program, $category, $evaluation, $report)
    {
        $program = Program::findOrFail($program);
        $category = $program->categories()->where('id', $category)->firstOrFail();
        $evaluation = $category->evaluations()->where('id', $evaluation)->firstOrFail();
        $report = Report::where('evaluation_id', $evaluation->id)
                        ->where('program_id', $program->id)
                        ->where('id', $report)
                        ->firstOrFail();

        $report->score = $request->score;
        $report->comments = $request->comments;
        $report->suggestions = $request->suggestions;
        $report->updated_at = now();
        $report->save();

        return redirect()->route('process_edit_report', [
            'program' => $program->id,
            'category' => $category,
            'evaluation' => $evaluation->id,
            'report' => $report->id
        ]);
    }

    public function upload_final_report($program)
    {
        $program = Program::find($program);
        return view('process.upload_final_report', compact('program'));
    }

    public function store_final_report(Request $request, $program)
    {
        $request->validate([
            'final_report_path' => 'required|mimes:pdf|max:20480', // 20480 KB = 20 MB
        ]);

        $filePath = $request->file('final_report_path')->store('', 'reports');

        $pdfPath = storage_path('app/reports/' . $filePath);
        $pdfPath = str_replace('\\', '/', $pdfPath);

        $program = Program::find($program);
        $program->final_report_path = $filePath;
        $program->save();

        return redirect()->route('process_upload_final_report', ['program' => $program->id]);
    }

    public function destroy_final_report($program)
    {
        $program = Program::find($program);
        if($program->final_report_path)
        {
            Storage::disk('reports')->delete($program->final_report_path);
            $program->final_report_path = null;
        }
        $program->save();
        return redirect()->route('process_upload_final_report', ['program' => $program->id]);
    }
}
