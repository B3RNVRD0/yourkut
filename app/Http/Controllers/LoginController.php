<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'senha');

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['senha'], $user->senha)) {
            Auth::login($user);
            return redirect('/postagens');
        }
        return redirect()->back()->withErrors(['email' => 'Credenciais inválidas']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
