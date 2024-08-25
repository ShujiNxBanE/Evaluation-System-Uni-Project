<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Evidence;
use Illuminate\Http\Request;

class EvidenceController extends Controller
{
    public function index()
    {
        $evidences = Evidence::orderBy('id','desc')->paginate(5);
        return view('create_evidence.index', compact('evidences'));
    }

    public function create()
    {
        return view('create_evidence.create');
    }

    public function store(Request $request)
    {
        $evidence = new Evidence();
        $evidence->description = $request->description;
        $evidence->evaluation_id = 1;
        $evidence->state = true;
        $evidence->file_url = 'no hay todavia xd';
        $evidence->save();

        return redirect()->route('evidences');
    }

    public function show($evidence)
    {
        $evidence = Evidence::find($evidence);
        return view('create_evidence.show',compact('evidence'));
    }

    public function edit($evidence)
    {
        $evidence = Evidence::find($evidence);
        return view('create_evidence.edit',compact('evidence'));
    }

    public function update(Request $request, $evidence)
    {
        $evidence = Evidence::find($evidence);
        $evidence->description = $request->description;
        $evidence->save();

        return redirect()->route('show_evidence_details', ['evidence' => $evidence->id]);
    }

    public function destroy($evidence)
    {
        $evidence = Evidence::find($evidence);
        $evidence->delete();
        return redirect()->route('evidences');
    }

    public function showByEvaluation(Evaluation $evaluation)
    {
        $evidences = $evaluation->evidences;

        return view('create_evidence.index', compact('evaluation', 'evidences'));
    }
}
