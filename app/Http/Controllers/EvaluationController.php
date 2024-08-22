<?php

namespace App\Http\Controllers;

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
        return view('create_evaluation.create');
    }

    public function store(Request $request)
    {
        $evaluation = new Evaluation();
        $evaluation->description = $request->description;
        $evaluation->category_id = 12;
        $evaluation->save();

        return redirect()->route('evaluations');
    }

    public function show($evaluation)
    {
        $evaluation = Evaluation::find($evaluation);
        return view('create_evaluation.show',compact('evaluation'));
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
