<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminModel;

class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $admin = AdminModel::where('username', $credentials['username'])->first();
        
        // Periksa password dalam format teks biasa (TIDAK AMAN)
        if ($admin && $credentials['password'] === $admin->password) {
            Auth::guard('admin')->login($admin);
            return redirect()->route('admin.index')->with('success', 'Login berhasil.');
        }

        return back()->withErrors([
            'username' => 'Kredensial yang diberikan tidak sesuai.',
        ]);
    }
}


