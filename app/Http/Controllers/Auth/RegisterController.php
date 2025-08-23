<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20|unique:users,mobile',
        ]);

        // Set default password for all users
        $defaultPassword = 'Reset@123';

        $user = User::create([
            'name' => $validatedData['name'],
            'mobile' => $validatedData['mobile'],
            'password' => Hash::make($defaultPassword),
            'city' => 'Not specified', // Default value for city as it's NOT NULL
        ]);

        Auth::login($user);

        return redirect()->route('quiz.start')->with('success', 'Registration successful! Welcome to Swadeshi Abhiyan Quiz!');
    }
}
