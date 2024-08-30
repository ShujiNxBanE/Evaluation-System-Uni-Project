<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
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
        $program->created_at = now();
        $program->updated_at = now();
        $program->save();

        $categories = Category::all();
        $program->categories()->attach($categories->pluck('id'));

        return redirect()->route('programs');
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
        return redirect()->route('programs');
    }

    public function destroy($program)
    {
        $program = Program::find($program);
        $program->delete();
        return redirect()->route('programs');
    }
}
