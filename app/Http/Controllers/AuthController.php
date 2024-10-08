<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function register(Request $request)
    {
        $user = new User([
            'name' => $request->firstName . ' ' . $request->lastName,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => 2
        ]);

        $user->save();

        return redirect()->route('create_user');
    }

    function login(Request $request)
    {
        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return redirect()->route('login')->withErrors([
                'login_error' => 'Las credenciales proporcionadas no son correctas.',
            ]);;
        }

        \auth()->user()->tokens()->delete();
        \auth()->user()->createToken('token')->plainTextToken;

        return redirect()->route('portfolio_index');
    }

    function logout()
    {
        \auth()->user()->tokens()->delete();
        auth()->logout();
        return redirect()->route('login');
    }
}
