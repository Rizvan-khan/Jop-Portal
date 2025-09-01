<?php

namespace App\Http\Controllers\Employer\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employer;
use Illuminate\Support\Facades\Hash;

class EmployerAuthController extends Controller
{
    public function showEmployerRegister()
    {
        return view('employer.auth.register');
    }

      public function showEmployerLogin()
    {
        return view('employer.auth.login');
    }

 public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employers',
            'password' => 'required|min:6',
        ]);

        Employer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('employer.auth.login')->with('success', 'Employer registered successfully!');
    }

   public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (auth()->guard('employer')->attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('employer.dashboard');
    }

    return back()->withErrors([
        'email' => 'Invalid credentials.',
    ]);
}

public function logout(Request $request)
{
    Auth::guard('employer')->logout();

    // Session invalidate + regenerateToken => security ke liye
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('employer.auth.login');
}



}
