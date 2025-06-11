<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function showLoginForm() {
        if(Session::has('loginId')) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }
   public function login(Request $request){
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string'
    ]);

    $credentials = User::where('email', $request->email)->first();

    if ($credentials && Hash::check($request->password, $credentials->password)) {
        Auth::login($credentials);
        Session::put('loginId', $credentials->id);
        Session::regenerate();
        return redirect()->route('dashboard')->with('success', 'Logged in successfully');
    }

    return back()->with('error', 'Invalid credentials');
}

public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login')->with('success', 'Logged out successfully');
}

}