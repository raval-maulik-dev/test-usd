<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Main Website Routes
Route::get('/', [HomeController::class, 'welcome'])->name('home');

// Authentication Routes
Route::middleware('guest')->group(function () {
    // Registration Routes
    Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register.process');
    
    // Login Routes
    Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);
});

// Logout Route
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/quiz', [QuizController::class, 'start'])->name('quiz.start');
    Route::get('/api/quiz/questions', [QuizController::class, 'getQuestions'])->name('api.quiz.questions');
    Route::post('/quiz/answer', [QuizController::class, 'submitAnswer'])->name('quiz.answer');
    Route::get('/quiz/results', [QuizController::class, 'results'])->name('quiz.results');
    Route::get('/certificate/{id}', [QuizController::class, 'certificate'])->name('certificate');
});
Route::get('/leaderboard', [HomeController::class, 'leaderboard'])->name('leaderboard');
Route::get('/lucky-draw', [HomeController::class, 'luckyDraw'])->name('lucky.draw');

// Language Routes
Route::get('/lang/{locale}', [HomeController::class, 'setLanguage'])->name('language.switch');

// Admin Authentication Routes
Route::middleware('guest:admin')->group(function () {
    Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
});

Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin Panel Routes
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::get('/admin/questions', [AdminController::class, 'questions'])->name('admin.questions');
Route::get('/admin/analytics', [AdminController::class, 'analytics'])->name('admin.analytics');
Route::get('/admin/leaderboard', [AdminController::class, 'adminLeaderboard'])->name('admin.leaderboard');
Route::get('/admin/certificates', [AdminController::class, 'certificates'])->name('admin.certificates');
Route::get('/admin/lucky-draw', [AdminController::class, 'adminLuckyDraw'])->name('admin.lucky.draw');
Route::get('/admin/notifications', [AdminController::class, 'notifications'])->name('admin.notifications');
Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');
Route::get('/admin/exports', [AdminController::class, 'exports'])->name('admin.exports');

// API Routes for Quiz Functionality
Route::get('/api/quiz/question/{id}', [QuizController::class, 'getQuestion'])->name('api.quiz.question');
Route::post('/api/quiz/submit', [QuizController::class, 'submitQuiz'])->name('api.quiz.submit');
