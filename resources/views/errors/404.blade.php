@extends('layouts.app')

@section('title', '404 - Page Not Found')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-orange-50 via-white to-green-50 flex items-center justify-center px-4">
    <div class="text-center max-w-2xl mx-auto">
        <!-- 404 Icon -->
        <div class="mb-8">
            <div class="w-32 h-32 tricolor-gradient rounded-full flex items-center justify-center mx-auto mb-6 shadow-2xl">
                <span class="text-gray-800 font-bold text-4xl">404</span>
            </div>
        </div>

        <!-- Error Content -->
        <h1 class="text-4xl md:text-6xl font-bold text-gray-800 mb-4">Page Not Found</h1>
        <h2 class="text-2xl md:text-3xl font-semibold text-gray-600 mb-6">Oops! This page doesn't exist</h2>
        <p class="text-lg text-gray-500 mb-8 leading-relaxed">
            The page you're looking for might have been moved, deleted, or doesn't exist. 
            Let's get you back to the Swadeshi Abhiyan quiz!
        </p>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
            <a href="/" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Back to Home
            </a>
            <a href="{{ route('register') }}" class="inline-flex items-center px-6 py-3 bg-white border border-orange-300 hover:bg-orange-50 text-orange-700 rounded-xl font-semibold transition-all duration-300 shadow-md hover:shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Take Quiz
            </a>
        </div>

        <!-- Popular Links -->
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 border border-orange-200">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Popular Pages</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <a href="/" class="text-center p-3 hover:bg-orange-50 rounded-lg transition-colors">
                    <div class="text-2xl mb-2">🏠</div>
                    <span class="text-sm text-gray-600">Home</span>
                </a>
                <a href="{{ route('leaderboard') }}" class="text-center p-3 hover:bg-orange-50 rounded-lg transition-colors">
                    <div class="text-2xl mb-2">🏆</div>
                    <span class="text-sm text-gray-600">Leaderboard</span>
                </a>
                <a href="{{ route('register') }}" class="text-center p-3 hover:bg-orange-50 rounded-lg transition-colors">
                    <div class="text-2xl mb-2">📝</div>
                    <span class="text-sm text-gray-600">Register</span>
                </a>
                <a href="{{ route('admin.login') }}" class="text-center p-3 hover:bg-orange-50 rounded-lg transition-colors">
                    <div class="text-2xl mb-2">⚙️</div>
                    <span class="text-sm text-gray-600">Admin</span>
                </a>
            </div>
        </div>
    </div>
</div>

<style>
.tricolor-gradient {
    background: linear-gradient(to right, #FF9933 33.33%, #FFFFFF 33.33%, #FFFFFF 66.66%, #138808 66.66%);
}
</style>
@endsection