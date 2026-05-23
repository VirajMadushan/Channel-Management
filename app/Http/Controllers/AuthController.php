<?php

// ══════════════════════════════════════════════════════════
// FILE: app/Http/Controllers/AuthController.php
// CREATE this new file
// ══════════════════════════════════════════════════════════

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ── Show login page ──────────────────────────────────
    public function showLogin()
    {
        // If already logged in, go to dashboard
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    // ── Handle login form submit ─────────────────────────
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'));
        }

        // Wrong credentials
        return back()
            ->withErrors(['email' => 'Invalid email or password. Please try again.'])
            ->withInput($request->only('email'));
    }

    // ── Logout ───────────────────────────────────────────
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
