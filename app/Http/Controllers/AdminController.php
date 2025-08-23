<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $stats = [
            'total_registrations' => 72485,
            'active_users' => 8943,
            'completed_quizzes' => 68392,
            'certificates_generated' => 65128,
            'average_score' => 14.7,
            'top_score' => 20,
            'quiz_completion_rate' => 94.3,
            'today_registrations' => 2847
        ];

        $recentActivity = [
            ['user' => 'Rajesh Patel', 'action' => 'Completed Quiz', 'score' => 20, 'time' => '2 mins ago'],
            ['user' => 'Priya Sharma', 'action' => 'Generated Certificate', 'score' => 19, 'time' => '5 mins ago'],
            ['user' => 'Amit Kumar', 'action' => 'Registered', 'score' => null, 'time' => '8 mins ago'],
            ['user' => 'Neha Joshi', 'action' => 'Completed Quiz', 'score' => 18, 'time' => '12 mins ago']
        ];

        $hourlyStats = [
            ['hour' => '00:00', 'registrations' => 45, 'completions' => 38],
            ['hour' => '01:00', 'registrations' => 32, 'completions' => 28],
            ['hour' => '02:00', 'registrations' => 28, 'completions' => 24],
            ['hour' => '03:00', 'registrations' => 15, 'completions' => 12],
            ['hour' => '04:00', 'registrations' => 8, 'completions' => 6],
            ['hour' => '05:00', 'registrations' => 12, 'completions' => 9],
            ['hour' => '06:00', 'registrations' => 89, 'completions' => 76],
            ['hour' => '07:00', 'registrations' => 156, 'completions' => 142],
            ['hour' => '08:00', 'registrations' => 234, 'completions' => 218],
            ['hour' => '09:00', 'registrations' => 312, 'completions' => 289],
            ['hour' => '10:00', 'registrations' => 398, 'completions' => 365],
            ['hour' => '11:00', 'registrations' => 445, 'completions' => 412]
        ];

        return view('admin.dashboard', compact('stats', 'recentActivity', 'hourlyStats'));
    }

    public function users()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $users = [
            ['id' => 'SA123456', 'name' => 'Rajesh Patel', 'email' => 'rajesh@email.com', 'mobile' => '9876543210', 'city' => 'Mehsana', 'score' => 20, 'status' => 'Completed'],
            ['id' => 'SA123457', 'name' => 'Priya Sharma', 'email' => 'priya@email.com', 'mobile' => '9876543211', 'city' => 'Ahmedabad', 'score' => 19, 'status' => 'Completed'],
            ['id' => 'SA123458', 'name' => 'Amit Kumar', 'email' => 'amit@email.com', 'mobile' => '9876543212', 'city' => 'Surat', 'score' => 19, 'status' => 'Completed'],
            ['id' => 'SA123459', 'name' => 'Neha Joshi', 'email' => 'neha@email.com', 'mobile' => '9876543213', 'city' => 'Vadodara', 'score' => 18, 'status' => 'Completed'],
            ['id' => 'SA123460', 'name' => 'Kiran Patel', 'email' => 'kiran@email.com', 'mobile' => '9876543214', 'city' => 'Rajkot', 'score' => null, 'status' => 'Registered']
        ];

        return view('admin.users', compact('users'));
    }

    public function questions()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $questions = [
            ['id' => 1, 'question' => 'Which of these is an Indian product?', 'category' => 'Tea/Beverages', 'difficulty' => 'Easy', 'status' => 'Active'],
            ['id' => 2, 'question' => 'Identify the Indian smartphone brand:', 'category' => 'Electronics', 'difficulty' => 'Medium', 'status' => 'Active'],
            ['id' => 3, 'question' => 'Which is the Indian clothing brand?', 'category' => 'Fashion', 'difficulty' => 'Easy', 'status' => 'Active'],
            ['id' => 4, 'question' => 'Select the Indian food product:', 'category' => 'Food', 'difficulty' => 'Easy', 'status' => 'Active'],
            ['id' => 5, 'question' => 'Which is the Indian automobile company?', 'category' => 'Automotive', 'difficulty' => 'Medium', 'status' => 'Active']
        ];

        return view('admin.questions', compact('questions'));
    }

    public function analytics()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $analytics = [
            'demographics' => [
                'age_groups' => [
                    '18-25' => 35.2,
                    '26-35' => 28.7,
                    '36-45' => 22.1,
                    '46-60' => 14.0
                ],
                'gender' => [
                    'Male' => 58.3,
                    'Female' => 41.7
                ],
                'cities' => [
                    'Mehsana' => 18.5,
                    'Ahmedabad' => 15.2,
                    'Surat' => 12.8,
                    'Vadodara' => 10.3,
                    'Rajkot' => 8.7,
                    'Others' => 34.5
                ]
            ],
            'performance' => [
                'score_distribution' => [
                    '18-20' => 15.3,
                    '15-17' => 25.7,
                    '10-14' => 35.2,
                    '5-9' => 18.4,
                    '0-4' => 5.4
                ],
                'time_analysis' => [
                    'average_time' => '4:32',
                    'fastest_completion' => '2:45',
                    'slowest_completion' => '8:23'
                ]
            ]
        ];

        return view('admin.analytics', compact('analytics'));
    }

    public function adminLeaderboard()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        return redirect()->route('admin.dashboard');
    }

    public function certificates()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        return redirect()->route('admin.dashboard');
    }

    public function adminLuckyDraw()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        return redirect()->route('admin.dashboard');
    }

    public function notifications()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        return redirect()->route('admin.dashboard');
    }

    public function settings()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        return redirect()->route('admin.dashboard');
    }

    public function exports()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        return redirect()->route('admin.dashboard');
    }
}