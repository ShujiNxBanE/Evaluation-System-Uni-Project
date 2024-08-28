<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Institutional_Data;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProcessController extends Controller
{
    public function index()
    {
        $programs = Program::where('user_id', Auth::user()->id)
                   ->orderBy('created_at', 'desc')
                   ->get();

        return view('process.index', compact('programs'));
    }

    public function show($program)
    {
        $program = Program::with('categories')->findOrFail($program);
        $institutional_data = Institutional_Data::where('program_id', $program->id)->first();
        return view('process.show', compact('program', 'institutional_data'));
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
        $evaluations = Evaluation::where('category_id', $category)->get();
        $program = Program::find($program);
        return view('process.show_category', compact('evaluations', 'program'));
    }
}
