<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthentication extends Controller
{


    public function create()
    {
        return view('admin.login-admin');
    }

    public function authenticate()
    {
        $attributes = request()->validate([
            'phone' => ['required'],
            'password' => ['required']
        ]);
        if (!Auth::guard('admin')->attempt($attributes)) {
            return back()->withErrors([
                'phone' => 'Sorry, those credentials do not match.',
            ]);
        }

        request()->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }


}
