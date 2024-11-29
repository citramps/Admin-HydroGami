<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login-admin');
    }

    public function showRegisterForm()
    {
        return view('register-admin');
    }

    // Login
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard-admin');
    }

    return back()->withErrors([
        'email' => 'Email atau kata sandi salah.',
    ]);
}   

    // Register
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:admin',
            'email' => 'required|string|email|max:255|unique:admin',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $admin = Admin::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($admin);

        return redirect()->route('login-admin')->with('success', 'Registrasi berhasil! Silahkan login.');
    }    

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login-admin');
    }
}
