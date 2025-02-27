<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserAuthentication extends Controller
{
    public function create()
    {
        return view('user.login-user');
    }

    public function authenticate()
    {
        $attributes = request()->validate([
            'phone' => ['required'],
            'password' => ['required']
        ]);
        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'phone' => 'Sorry, those credentials do not match'
            ]);
        }

        request()->session()->regenerate();

        return redirect()->route('user.dashboard');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('user.login');
    }
}
