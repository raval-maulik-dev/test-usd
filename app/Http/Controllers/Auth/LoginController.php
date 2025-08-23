<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string',
            'mobile' => 'required|string',
        ]);

        $user = \App\Models\User::where('name', $credentials['name'])
                                 ->where('mobile', $credentials['mobile'])
                                 ->first();

        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended(route('quiz.start'));
        }

        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('name', 'mobile'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
