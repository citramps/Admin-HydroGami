<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin;

class ProfileController extends Controller
{
    // Menampilkan profil
    public function show()
    {
        $admin = Auth::user();
        $role = $admin->role;
        return view('profile.show', compact('admin', 'role'));
    }

    // Menampilkan halaman edit profil
    public function edit()
    {
        $admin = Auth::user();
        $role = $admin->role;
        return view('profile.edit', compact('admin', 'role'));
    }

    // Menyimpan perubahan profil
    public function update(Request $request)
    {
        $admin = Auth::user();

        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admin,email,' . $admin->id_admin . ',id_admin',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update username, email, foto_profil
        $admin->username = $request->username;
        $admin->email = $request->email;

        if ($request->hasFile('foto_profil')) {
            if ($admin->foto_profil) {
                Storage::delete('public/' . $admin->foto_profil);
            }

            $path = $request->file('foto_profil')->store('profile_pics', 'public');
            $admin->foto_profil = $path;
        }

        $admin->save();

        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $admin = Auth::user();

        if (!Hash::check($request->current_password, $admin->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Password saat ini salah.']);
        }

        $admin->password = Hash::make($request->new_password);
        $admin->save();

        return redirect()->route('profile.edit')->with('success', 'Password berhasil diperbarui!');
    }


}
