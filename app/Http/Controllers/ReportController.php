<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::orderBy('id','desc')->paginate(5);
        return view('create_report.index', compact('reports'));
    }

    public function create()
    {
        return view('create_report.create');
    }

    public function store(Request $request)
    {
        $report = new Report();
        $report->score = 55;
        $report->comments = $request->comments;
        $report->suggestions = $request->suggestions;
        $report->save();

        return redirect()->route('reports');
    }

    public function show($report)
    {
        $report = Report::find($report);
        return view('create_report.show',compact('report'));
    }

    public function edit($report)
    {
        $report = Report::find($report);
        return view('create_report.edit',compact('report'));
    }

    public function update(Request $request, $report)
    {
        $report = Report::find($report);
        $report->comments = $request->comments;
        $report->suggestions = $request->suggestions;
        $report->save();

        return redirect()->route('show_report_details', ['report' => $report->id]);
    }

    public function destroy($report)
    {
        $report = Report::find($report);
        $report->delete();
        return redirect()->route('reports');
    }
}
