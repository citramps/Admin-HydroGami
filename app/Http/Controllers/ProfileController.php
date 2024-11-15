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
        // Pastikan hanya pengguna yang sudah login yang bisa mengakses halaman ini
        $this->middleware('auth');
    }

    public function show()
    {
        $user = Auth::user();
        $role = $user->role; // Ambil role dari user yang sedang login

        return view('profile.show', compact('user', 'role'));
    }

    public function edit()
    {
        $user = Auth::user();
        $role = $user->role; // Ambil role dari user yang sedang login

        return view('profile.edit', compact('user', 'role'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input yang diberikan oleh user
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'current_password' => 'required_with:new_password|string|min:8',
            'new_password' => 'nullable|string|min:8|confirmed',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Cek apakah ada gambar profil baru yang diupload
        if ($request->hasFile('profile_image')) {
            // Hapus gambar lama jika ada
            if ($user->profile_image) {
                $oldImagePath = public_path('storage/profile_images/' . $user->profile_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Hapus gambar lama
                }
            }

            // Upload gambar baru
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
            $user->profile_image = basename($imagePath);  // Menyimpan nama file gambar
        }

        // Update nama jika ada perubahan
        if ($request->filled('name') && $user->name !== $request->input('name')) {
            $user->name = $request->input('name');
        }

        // Update email jika ada perubahan
        if ($request->filled('email') && $user->email !== $request->input('email')) {
            $user->email = $request->input('email');
        }

        // Verifikasi dan update password jika diberikan
        if ($request->filled('new_password')) {
            if (!Hash::check($request->input('current_password'), $user->password)) {
                return back()->withErrors(['current_password' => 'Password saat ini tidak cocok.']);
            }

            if ($request->input('new_password') !== $request->input('new_password_confirmation')) {
                return back()->withErrors(['new_password' => 'Konfirmasi password tidak sesuai dengan password baru.']);
            }
    
            // Update password
            $user->password = Hash::make($request->input('new_password'));
        }

        // Simpan perubahan data pengguna
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
}
