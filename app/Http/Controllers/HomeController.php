<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome()
    {
        $stats = [
            'total_participants' => 72485,
            'quizzes_completed' => 68392,
            'certificates_generated' => 65128,
            'top_score' => 20,
            'average_score' => 14.7
        ];

        $languages = [
            'en' => 'English',
            'hi' => 'हिंदी',
            'gu' => 'ગુજરાતી'
        ];

        return view('welcome', compact('stats', 'languages'));
    }

    public function register()
    {
        return view('register');
    }

    public function processRegistration(Request $request)
    {
        // Simulate registration process
        $userData = [
            'id' => 'SA' . rand(100000, 999999),
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'age' => $request->age,
            'gender' => $request->gender,
            'city' => $request->city,
            'registered_at' => now()
        ];

        session(['user_data' => $userData]);
        return redirect()->route('quiz.start');
    }

    public function leaderboard()
    {
        $leaderboard = [
            ['rank' => 1, 'name' => 'Rajesh Patel', 'city' => 'Mehsana', 'score' => 20, 'time' => '2:45'],
            ['rank' => 2, 'name' => 'Priya Sharma', 'city' => 'Ahmedabad', 'score' => 19, 'time' => '3:12'],
            ['rank' => 3, 'name' => 'Amit Kumar', 'city' => 'Surat', 'score' => 19, 'time' => '3:28'],
            ['rank' => 4, 'name' => 'Neha Joshi', 'city' => 'Vadodara', 'score' => 18, 'time' => '2:56'],
            ['rank' => 5, 'name' => 'Kiran Patel', 'city' => 'Rajkot', 'score' => 18, 'time' => '3:45'],
            ['rank' => 6, 'name' => 'Ravi Desai', 'city' => 'Gandhinagar', 'score' => 17, 'time' => '4:12'],
            ['rank' => 7, 'name' => 'Meera Shah', 'city' => 'Bhavnagar', 'score' => 17, 'time' => '4:23'],
            ['rank' => 8, 'name' => 'Vikram Singh', 'city' => 'Jamnagar', 'score' => 16, 'time' => '3:34'],
            ['rank' => 9, 'name' => 'Anjali Trivedi', 'city' => 'Anand', 'score' => 16, 'time' => '4:56'],
            ['rank' => 10, 'name' => 'Harish Patel', 'city' => 'Mehsana', 'score' => 15, 'time' => '5:12']
        ];

        return view('leaderboard', compact('leaderboard'));
    }

    public function luckyDraw()
    {
        $prizes = [
            ['prize' => 'Smartphone', 'winner' => 'Rajesh Patel', 'city' => 'Mehsana'],
            ['prize' => 'Tablet', 'winner' => 'Priya Sharma', 'city' => 'Ahmedabad'],
            ['prize' => 'Smart Watch', 'winner' => 'Amit Kumar', 'city' => 'Surat'],
            ['prize' => 'Earphones', 'winner' => 'Neha Joshi', 'city' => 'Vadodara'],
            ['prize' => 'Power Bank', 'winner' => 'Kiran Patel', 'city' => 'Rajkot']
        ];

        return view('lucky-draw', compact('prizes'));
    }

    public function setLanguage($locale)
    {
        session(['locale' => $locale]);
        return redirect()->back();
    }
}