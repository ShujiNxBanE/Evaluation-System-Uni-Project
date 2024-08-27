<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Institutional_Data;
use App\Models\Program;
use App\Models\User;
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
        $users = User::all();
        return view('create_program.create', compact('users'));
    }

    public function store(Request $request)
    {
        $program = new Program();

        $program->name = $request->name;
        $program->description = $request->description;
        $program->user_id = $request->user_id;

        $program->save();

        $categories = Category::all();
        $program->categories()->attach($categories->pluck('id'));

        return redirect()->route('programs');
    }

    public function show($program)
    {
        $program = Program::with('institutional_data', 'categories')->findOrFail($program);
        return view('create_program.show', compact('program'));
    }

    public function edit($program)
    {
        $program = Program::find($program);
        $users = User::all();
        return view('create_program.edit', compact('program', 'users'));
    }

    public function update(Request $request, $program)
    {
        $program = Program::find($program);

        $program->name = $request->name;
        $program->description = $request->description;
        $program->user_id = $request->user_id;

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
