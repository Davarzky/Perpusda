<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user(); // Fetch the authenticated admin
        return view('pages.admin.index', compact('admin'));
    }

    // Handle the profile update
    public function update(Request $request)
    {
        // Get the authenticated admin
        $admin = Auth::guard('admin')->user();

        // Validate form input
        $validatedData = $request->validate([
            'username' => 'required|unique:admins,username,' . $admin->id . '|max:255',
            'current_password' => 'required_with:password',
            'password' => 'nullable|min:6|confirmed', // Confirmed ensures the password matches with password_confirmation
        ]);

        // Check if current password is correct when trying to change the password
        if ($request->filled('current_password')) {
            if (!Hash::check($request->current_password, $admin->password)) {
                // Return error if current password doesn't match
                return back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
            }

            // If the new password is entered, hash it and update the password field
            if ($request->filled('password')) {
                $validatedData['password'] = Hash::make($request->password);
            }
        }

        // Update the admin record with validated data (username and password if changed)
        $admin->update($validatedData);

        // Redirect back to the profile page with a success message
        return redirect()->route('admin.index')->with('success', 'Profile updated successfully.');
    }
}
