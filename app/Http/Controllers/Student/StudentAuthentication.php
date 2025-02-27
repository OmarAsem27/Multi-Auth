<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class StudentAuthentication extends Controller
{


    public function create()
    {
        return view('student.login-student');
    }

    public function authenticate()
    {
        $attributes = request()->validate([
            'phone' => ['required'],
            'password' => ['required']
        ]);
        if (!Auth::guard('student')->attempt($attributes)) {
            return back()->withErrors([
                'phone' => 'Sorry, those credentials do not match.',
            ]);
        }

        request()->session()->regenerate();

        return redirect()->route('student.dashboard');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('student.login');
    }
}
