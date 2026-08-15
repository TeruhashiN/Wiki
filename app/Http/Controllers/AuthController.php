<?php

namespace App\Http\Controllers;

use App\Models\BloomUser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLogin(): View
    {
        return view('auth.login');
    }

    /**
     * Handle a login attempt against the bloom_user table.
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $user = BloomUser::where('bloom_username', $credentials['username'])->first();

        // Passwords are stored in plain-text in this legacy table, so compare directly.
        if ($user && hash_equals((string) $user->bloom_password, $credentials['password'])) {
            Auth::guard('bloom')->login($user);
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()
            ->withErrors(['username' => 'The provided credentials do not match our records.'])
            ->onlyInput('username');
    }

    /**
     * Log the user out.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('bloom')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('dashboard');
    }

    /**
     * Show the change password form.
     */
    public function showChangePassword(): View
    {
        return view('auth.change-password');
    }

    /**
     * Update the user's password.
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user = Auth::guard('bloom')->user();

        if (! hash_equals((string) $user->bloom_password, $request->current_password)) {
            return back()->withErrors(['current_password' => 'The provided password does not match our records.']);
        }

        $user->bloom_password = $request->password;
        $user->save();

        return redirect()->route('account.settings')->with('status', 'Password updated successfully.');
    }
}
