<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => "required|email",
            'password' => "required",
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('siswa')->with('success', 'Kamu Berhasil Login!');
        }

        return back()->withErrors(['auth_error' => 'Email atau Password Salah']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/')->with('success', 'kamu berhasil Logout!');
    }
}
