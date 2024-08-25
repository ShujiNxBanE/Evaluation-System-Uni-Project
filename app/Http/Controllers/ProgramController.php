<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Institutional_Data;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::orderBy('id', 'desc')->get();
        return view('create_program.index', compact('programs'));
    }

    public function create()
    {
        return view('create_program.create');
    }

    public function store(Request $request)
    {
        $program = new Program();

        $program->name = $request->name;
        $program->description = $request->description;
        $program->user_id = Auth::user()->id;

        $program->save();

        Institutional_Data::create([
            'name' => '',
            'country' => '',
            'creation_year' => 0,
            'institution_character' => '',
            'program_edition' => 0,
            'web_adresss' => '',
            'postal_address' => '',
            'recognition_resolution' => '',
            'start_date' => '2024-09-02',
            'end_date' => '2024-09-02',
            'number_of_hours' => 0,
            'total_students' => 0,
            'total_teaching_staff' => 0,
            'total_administrative_staff' => 0,
            'certificate' => '',
            'program_id' => $program->id,
        ]);


        $categories = Category::all();
        $program->categories()->attach($categories->pluck('id'));

        return redirect()->route('programs');
    }

    public function show($program)
    {
        $program = Program::with('institutional_data')->findOrFail($program);
        return view('create_program.show', compact('program'));
    }

    public function edit($program)
    {
        $program = Program::find($program);
        return view('create_program.edit', compact('program'));
    }

    public function update(Request $request, $program)
    {
        $program = Program::find($program);

        $program->name = $request->name;
        $program->description = $request->description;
        $program->user_id = Auth::user()->id;

        $program->save();
        return redirect()->route('show_program_details', ['program' => $program->id]);
    }

    public function destroy($program)
    {
        $program = Program::find($program);
        $program->delete();
        return redirect()->route('programs');
    }
}
