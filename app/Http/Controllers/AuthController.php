<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('auth.login'); // Tampilkan form login
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard'); // Redirect ke dashboard jika login sukses
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    public function logout()
{
    // Logout user
    Auth::logout();

    // Redirect ke halaman login
    return redirect()->route('login')->with('success', 'Anda berhasil logout.');
}
}
