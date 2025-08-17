<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class PasswordController extends Controller
{
    //
    public function showChangePasswordForm()
    {
        return view('auth.change-password');
    }


    public function updatePassword(Request $request)
    {
        // Validation
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Current password check
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'বর্তমান পাসওয়ার্ড সঠিক নয়']);
        }

        // Update password
        Auth::user()->update([
            'password' => Hash::make($request->password),
        ]);

        //return redirect()->route('profile')->with('success', 'পাসওয়ার্ড সফলভাবে পরিবর্তন করা হয়েছে');

        return Redirect::route('profile')->with('success', 'Your Password has been reset.');
    }
}
