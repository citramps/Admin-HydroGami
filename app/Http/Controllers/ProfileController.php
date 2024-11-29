<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $admin = Auth::user();  
        $role = $admin->role;   
        return view('profile.show', compact('admin', 'role'));
    }

    public function edit()
    {
        $admin = Auth::user();  
        $role = $admin->role;  
        return view('profile.edit', compact('admin', 'role'));
    }

    public function update(Request $request)
    {
        $admin = Auth::user();  

        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admin,email,' . $admin->id_admin. ',id_admin',
            'current_password' => 'required_with:new_password|string|min:8',
            'new_password' => 'nullable|string|min:8|confirmed',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto_profil')) {
            if ($admin->profile_image) {
                $oldImagePath = public_path('storage/foto_profil/' . $admin->foto_profil);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Hapus gambar lama
                }
            }

            // Upload gambar baru
            $imagePath = $request->file('foto_profil')->store('foto_profil', 'public');
            $admin->foto_profil = basename($imagePath);  // Menyimpan nama file gambar
        }

        if ($request->filled('username') && $admin->username !== $request->input('username')) {
            $admin->username = $request->input('username');
        }

        if ($request->filled('email') && $admin->email !== $request->input('email')) {
            $admin->email = $request->input('email');
        }

        // Verifikasi dan update password 
        if ($request->filled('new_password')) {
            if (!Hash::check($request->input('current_password'), $admin->password)) {
                return back()->withErrors(['current_password' => 'Password saat ini tidak cocok.']);
            }

            if ($request->input('new_password') !== $request->input('new_password_confirmation')) {
                return back()->withErrors(['new_password' => 'Konfirmasi password tidak sesuai dengan password baru.']);
            }

            $admin->password = Hash::make($request->input('new_password'));
        }

        $admin->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
}
