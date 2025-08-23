@extends('layouts.app')

@section('title', 'Quiz Results - Swadeshi Abhiyan')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-orange-50 via-white to-green-50 py-12 px-4">
    <div class="max-w-4xl mx-auto">
        <!-- Results Header -->
        <div class="text-center mb-12">
            <div class="w-24 h-24 tricolor-gradient rounded-full flex items-center justify-center mx-auto mb-6 flag-animation shadow-2xl">
                <span class="text-gray-800 font-bold text-3xl">🏆</span>
            </div>
            <h1 class="text-3xl md:text-5xl font-bold text-gray-800 mb-4">Quiz Results</h1>
            <p class="text-lg text-gray-600">Your Swadeshi knowledge assessment</p>
        </div>

        @if($results)
        <!-- Score Card -->
        <div class="bg-white rounded-3xl shadow-2xl border border-orange-100 overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-{{ $results['badge'] == 'warrior' ? 'green' : ($results['badge'] == 'good' ? 'blue' : 'orange') }}-500 to-{{ $results['badge'] == 'warrior' ? 'green' : ($results['badge'] == 'good' ? 'blue' : 'red') }}-600 p-8 text-center text-white">
                <div class="text-6xl font-bold mb-2">{{ $results['correct_answers'] }}/{{ $results['total_questions'] }}</div>
                <div class="text-xl mb-4">{{ $results['percentage'] }}% Correct</div>
                <div class="text-2xl font-bold">Score: {{ $results['score'] }} Points</div>
            </div>

            <div class="p-8">
                <!-- Badge -->
                <div class="text-center mb-8">
                    @if($results['badge'] == 'warrior')
                        <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-3xl">🏆</span>
                        </div>
                        <h2 class="text-3xl font-bold text-green-600 mb-2">Swadeshi Warrior!</h2>
                    @elseif($results['badge'] == 'good')
                        <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-3xl">⭐</span>
                        </div>
                        <h2 class="text-3xl font-bold text-blue-600 mb-2">Good Start!</h2>
                    @else
                        <div class="w-20 h-20 bg-gradient-to-r from-orange-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-3xl">💪</span>
                        </div>
                        <h2 class="text-3xl font-bold text-orange-600 mb-2">Keep Learning!</h2>
                    @endif
                    <p class="text-gray-600 text-lg">{{ $results['message'] }}</p>
                </div>

                <!-- Detailed Stats -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-6 text-center border border-green-200">
                        <div class="text-3xl font-bold text-green-600">{{ $results['correct_answers'] }}</div>
                        <div class="text-sm text-green-700">Correct Answers</div>
                    </div>
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 text-center border border-blue-200">
                        <div class="text-3xl font-bold text-blue-600">{{ $results['fast_answers'] }}</div>
                        <div class="text-sm text-blue-700">Fast Answers</div>
                    </div>
                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-6 text-center border border-purple-200">
                        <div class="text-3xl font-bold text-purple-600">{{ $results['total_time'] }}s</div>
                        <div class="text-sm text-purple-700">Total Time</div>
                    </div>
                    <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-6 text-center border border-orange-200">
                        <div class="text-3xl font-bold text-orange-600">{{ $results['score'] }}</div>
                        <div class="text-sm text-orange-700">Final Score</div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('certificate', ['id' => auth()->id()]) }}" class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-dark px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-center">
                        📜 Get Certificate
                    </a>
                    <a href="{{ route('leaderboard') }}" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-center">
                        🏆 View Leaderboard
                    </a>
                </div>
            </div>
        </div>

        <!-- Share Section -->
        <div class="bg-white rounded-3xl shadow-2xl border border-orange-100 p-8">
            <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Share Your Achievement</h3>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                <button class="flex flex-col items-center p-4 bg-gradient-to-br from-pink-50 to-pink-100 rounded-2xl border border-pink-200 hover:border-pink-400 transition-all duration-300 hover:scale-105">
                    <div class="text-3xl mb-2">📱</div>
                    <span class="text-pink-700 font-semibold">Instagram</span>
                </button>
                <button class="flex flex-col items-center p-4 bg-gradient-to-br from-green-50 to-green-100 rounded-2xl border border-green-200 hover:border-green-400 transition-all duration-300 hover:scale-105">
                    <div class="text-3xl mb-2">💬</div>
                    <span class="text-green-700 font-semibold">WhatsApp</span>
                </button>
                <button class="flex flex-col items-center p-4 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl border border-blue-200 hover:border-blue-400 transition-all duration-300 hover:scale-105">
                    <div class="text-3xl mb-2">📘</div>
                    <span class="text-blue-700 font-semibold">Facebook</span>
                </button>
                <button class="flex flex-col items-center p-4 bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl border border-gray-200 hover:border-gray-400 transition-all duration-300 hover:scale-105">
                    <div class="text-3xl mb-2">🐦</div>
                    <span class="text-gray-700 font-semibold">Twitter/X</span>
                </button>
            </div>

            <div class="text-center">
                <p class="text-gray-600 mb-4">Use these hashtags when sharing:</p>
                <div class="flex flex-wrap justify-center gap-2">
                    <span class="bg-orange-100 text-orange-700 px-4 py-2 rounded-full text-sm font-semibold">#SwadeshiAbhiyan</span>
                    <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">#VocalForLocal</span>
                    <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold">#MadeInIndia</span>
                    <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-semibold">#SwadeshiWarrior</span>
                </div>
            </div>
        </div>
        @endif

        <!-- Try Again -->
        <div class="mt-8 text-center">
            <a href="{{ route('home') }}" class="inline-flex items-center space-x-2 text-gray-600 hover:text-orange-600 font-medium transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span>Back to Home</span>
            </a>
        </div>
    </div>
</div>

<style>
.tricolor-gradient {
    background: linear-gradient(to right, #FF9933 33.33%, #FFFFFF 33.33%, #FFFFFF 66.66%, #138808 66.66%);
}
</style>
@endsection