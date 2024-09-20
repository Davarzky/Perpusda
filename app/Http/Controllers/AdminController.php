<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Tampilkan halaman profil
    public function index()
    {
        // Mendapatkan data admin yang sedang login
        $admin = Auth::guard('admin')->user();
        return view('pages.admin.index', compact('admin'));
    }

    // Tangani pembaruan profil
    public function update(Request $request)
    {
        // Mendapatkan admin yang sedang login
        $admin = Auth::guard('admin')->user();

        // Validasi input dari form
        $validatedData = $request->validate([
            'username' => 'required|unique:admins,username,' . $admin->id . '|max:255',
            'current_password' => 'required_with:password',
            'password' => 'nullable|min:6|confirmed', // Memastikan password baru dikonfirmasi
        ]);

        // Cek apakah password lama benar jika password baru diisi
        if ($request->filled('current_password')) {
            if ($request->current_password !== $admin->password) {
                // Jika password lama salah, berikan pesan error
                return back()->withErrors(['current_password' => 'Password lama yang Anda masukkan salah.']);
            }

            // Jika password baru diisi, simpan password baru tanpa hashing
            if ($request->filled('password')) {
                $validatedData['password'] = $request->password;
            }
        }

        // $admin->update($validatedData);

        // Redirect kembali ke halaman profil dengan pesan sukses
        return redirect()->route('admin.index')->with('success', 'Profil berhasil diperbarui.');
    }
}
