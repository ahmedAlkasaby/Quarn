<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->guard('admin')->attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return back()->with('error', __('site.login_error'));
    }

    public function logout()
    {
        auth()->guard('admin')->logout();

        return redirect()->route('login.show');
    }
}
