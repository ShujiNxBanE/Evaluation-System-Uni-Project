<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProcessController extends Controller
{
    public function index()
    {
        $programs = Program::where('user_id', Auth::user()->id)->get();
        return view('process.index', compact('programs'));
    }
}
