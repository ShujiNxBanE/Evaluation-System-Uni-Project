<?php

namespace App\Http\Controllers;

use App\Models\Evidence;
use App\Models\Institutional_Data;
use App\Models\Program;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $programs = Program::orderBy('id', 'desc')->get();
        return view('admin_views.index', compact('programs'));
    }

    public function show($program)
    {
        $program = Program::with('categories.evaluations')->findOrFail($program);
        $institutional_data = Institutional_Data::where('program_id', $program->id)->first();
        $evaluator = $program->user ? $program->user->name : 'No asignado';

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

        return view('admin_views.show', compact(
                    'program', 'institutional_data',
                    'totalScore', 'totalMaxScore',
                    'totalEvaluations', 'intervalScores',
                    'evaluationCategories', 'evaluator'));
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

    public function show_final_report($program)
    {
        $program = Program::find($program);
        return view('admin_views.show_final_report', compact('program'));
    }

    public function show_users()
    {
        $users = User::where('id', '!=', 1)->orderBy('id', 'desc')->get();
        return view('admin_views.users', compact('users'));
    }

    public function edit_user($user)
    {
        $user = User::find($user);
        return view('admin_views.edit_user', compact('user'));
    }

    public function update_user(Request $request, $user)
    {
        $user = User::find($user);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->updated_at = now();
        $user->save();

        return redirect()->route('admin_show_users');
    }

    public function destroy_user($user)
    {
        $user = User::findOrFail($user);

        $programs = Program::where('user_id', $user->id)->get();

        foreach ($programs as $program) {
            $program->user_id = 1;
            $program->save();
        }
        $user->delete();
        return redirect()->route('admin_show_users');
    }
}
