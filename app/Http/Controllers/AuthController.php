<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginAdminForm()
    {
        return view('login-admin');
    }

    public function showRegisterAdminForm()
    {
        return view('register-admin');
    }

    // Login
    public function loginAdmin(Request $request)
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
    public function registerAdmin(Request $request)
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
    public function logoutAdmin()
    {
        Auth::logout();
        return redirect()->route('login-admin');
    }


    // USER
    //Register User
    public function register(Request $req)
    {
        //Validate
        $rules = [
            'username' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|min:6',
            'poin' => 'nullable|integer',
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        // create new user in users table
        $user = User::create([
            'username' => $req->username,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'poin' => $request->poin ?? 0,
        ]);
        $token = $user->createToken('Personal Access Token')->plainTextToken;
        $response = ['user' => $user, 'token' => $token];
        return response()->json($response, 200);
    }

    // Fungsi login untuk pengguna
    public function login(Request $req)
    {
        // Validasi input
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Mencari pengguna berdasarkan email
        $user = User::where('email', $req->email)->first();

        if (!$user) {
            // Jika email tidak ditemukan
            return response()->json(['email' => 'Email tidak valid'], 400);
        }

        // Mengecek password
        if (!Hash::check($req->password, $user->password)) {
            // Jika password salah
            return response()->json(['password' => 'Password salah'], 400);
        }

        // Jika login berhasil
        $token = $user->createToken('Personal Access Token')->plainTextToken;
        $response = ['user' => $user, 'token' => $token];
        return response()->json($response, 200);
    }
}
