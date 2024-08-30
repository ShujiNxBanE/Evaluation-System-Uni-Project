<?php

namespace App\Http\Controllers;

use App\Models\Evidence;
use App\Models\Institutional_Data;
use App\Models\Program;
use App\Models\Report;

class AdminController extends Controller
{
    public function index()
    {
        $programs = Program::orderBy('id', 'desc')->get();
        return view('admin_views.index', compact('programs'));
    }

    public function show($program)
    {
        $program = Program::with('categories')->findOrFail($program);
        $institutional_data = Institutional_Data::where('program_id', $program->id)->first();

        $totalScore = 0;
        $totalMaxScore = 0;

        foreach ($program->categories as $category) {
            $category->total_score = Report::where('program_id', $program->id)
                                            ->whereHas('evaluation', function ($query) use ($category) {
                                                $query->where('category_id', $category->id);
                                            })
                                            ->sum('score');

            $numberOfEvaluations = $category->evaluations->count();
            $category->max_score = $numberOfEvaluations * 3;

            $totalScore += $category->total_score;

            $totalMaxScore += $category->max_score;
        }

        return view('admin_views.show', compact('program', 'institutional_data', 'totalScore', 'totalMaxScore'));
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

        return view('admin_views.show_category', compact('evaluations', 'program', 'category', 'reports'));
    }

    public function show_evidences($program, $category, $evaluation)
    {
        $program = Program::findOrFail($program);

        $category = $program->categories()->where('id', $category)->firstOrFail();

        $evaluation = $category->evaluations()->where('id', $evaluation)->firstOrFail();

        $evidences = Evidence::where('evaluation_id', $evaluation->id)
                            ->where('program_id', $program->id)
                            ->get();

        return view('admin_views.file_manager' , compact('program', 'category', 'evaluation', 'evidences'));
    }

    public function show_report($program, $category, $evaluation, $report)
    {
        $program = Program::findOrFail($program);
        $category = $program->categories()->where('id', $category)->firstOrFail();
        $evaluation = $category->evaluations()->where('id', $evaluation)->firstOrFail();
        $report = $evaluation->report()->where('id', $report)->firstOrFail();

        return view('admin_views.indicator_report', compact('program', 'category', 'evaluation', 'report'));
    }
}
