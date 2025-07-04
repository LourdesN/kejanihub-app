<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit')->with('user', Auth::user());
    }

    public function update(Request $request)
    {
        $request->validate([
            'password' => 'nullable|string|min:8|confirmed',
        ]);
        $user = User::find(Auth::id());

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        $user->save();

        return back()->with('success-alert', 'Password updated successfully.');
    }
}
