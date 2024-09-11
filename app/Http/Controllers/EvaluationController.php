<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Evaluation;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index()
    {
        $evaluations = Evaluation::orderBy('id','desc')->paginate(5);
        return view('create_evaluation.index', compact('evaluations'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('create_evaluation.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $evaluation = new Evaluation();
        $evaluation->description = $request->description;
        $evaluation->category_id = $request->category_id;
        $evaluation->save();

        return redirect()->route('evaluations');
    }

    public function show($evaluation)
    {
        $evaluation = Evaluation::find($evaluation);
        // Verifica si la evaluación tiene evidencias
        $hasEvidences = $evaluation->evidences()->exists();
        // Pasa la evaluación y la variable booleana a la vista
        return view('create_evaluation.show', compact('evaluation', 'hasEvidences'));
    }

    public function edit($evaluation)
    {
        $evaluation = Evaluation::find($evaluation);
        return view('create_evaluation.edit',compact('evaluation'));
    }

    public function update(Request $request, $evaluation)
    {
        $evaluation = Evaluation::find($evaluation);
        $evaluation->description = $request->description;
        $evaluation->save();

        return redirect()->route('show_evaluation_details', ['evaluation' => $evaluation->id]);
    }

    public function destroy($evaluation)
    {
        $evaluation = Evaluation::find($evaluation);
        $evaluation->delete();
        return redirect()->route('evaluations');
    }
}
