@extends('layouts.app')

@section('title', 'Leaderboard - Swadeshi Abhiyan')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-orange-50 via-white to-green-50 py-12 px-4">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-12">
            <div class="w-24 h-24 bg-gradient-to-r from-yellow-400 to-yellow-600 rounded-full flex items-center justify-center mx-auto mb-6 shadow-2xl">
                <span class="text-white font-bold text-3xl">🏆</span>
            </div>
            <h1 class="text-3xl md:text-5xl font-bold text-gray-800 mb-4">Leaderboard</h1>
            <p class="text-lg text-gray-600">Top performers in Swadeshi Abhiyan Quiz</p>
        </div>

        <!-- Top 3 Winners -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            @foreach($leaderboard as $index => $participant)
                @if($index < 3)
                <div class="bg-white rounded-3xl shadow-2xl border border-{{ $index == 0 ? 'yellow' : ($index == 1 ? 'gray' : 'orange') }}-200 overflow-hidden {{ $index == 0 ? 'transform scale-105' : '' }}">
                    <div class="bg-gradient-to-r from-{{ $index == 0 ? 'yellow' : ($index == 1 ? 'gray' : 'orange') }}-400 to-{{ $index == 0 ? 'yellow' : ($index == 1 ? 'gray' : 'orange') }}-600 p-6 text-center text-white">
                        <div class="text-4xl mb-2">
                            @if($index == 0) 🥇
                            @elseif($index == 1) 🥈
                            @else 🥉
                            @endif
                        </div>
                        <div class="text-2xl font-bold">#{{ $participant['rank'] }}</div>
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $participant['name'] }}</h3>
                        <p class="text-gray-600 mb-4">{{ $participant['city'] }}</p>
                        <div class="bg-gradient-to-r from-green-50 to-green-100 rounded-xl p-4 border border-green-200">
                            <div class="text-2xl font-bold text-green-600">{{ $participant['score'] }}/20</div>
                            <div class="text-sm text-green-700">Score</div>
                        </div>
                        <div class="mt-4 bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl p-3 border border-blue-200">
                            <div class="text-lg font-bold text-blue-600">{{ $participant['time'] }}</div>
                            <div class="text-xs text-blue-700">Completion Time</div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>

        <!-- Full Leaderboard -->
        <div class="bg-white rounded-3xl shadow-2xl border border-orange-100 overflow-hidden">
            <div class="bg-gradient-to-r from-orange-500 to-red-600 p-6">
                <h2 class="text-2xl font-bold text-white text-center">Daily Top 10</h2>
                <p class="text-orange-100 text-center">Updated in real-time</p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Rank</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Name</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">City</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Score</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Time</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Badge</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($leaderboard as $participant)
                        <tr class="hover:bg-gray-50 transition-colors duration-200 {{ $participant['rank'] <= 3 ? 'bg-yellow-50' : '' }}">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-gradient-to-r from-{{ $participant['rank'] == 1 ? 'yellow' : ($participant['rank'] == 2 ? 'gray' : ($participant['rank'] == 3 ? 'orange' : 'blue')) }}-400 to-{{ $participant['rank'] == 1 ? 'yellow' : ($participant['rank'] == 2 ? 'gray' : ($participant['rank'] == 3 ? 'orange' : 'blue')) }}-600 rounded-full flex items-center justify-center text-white font-bold text-sm">
                                        {{ $participant['rank'] }}
                                    </div>
                                    @if($participant['rank'] <= 3)
                                        <span class="ml-2 text-lg">
                                            @if($participant['rank'] == 1) 🥇
                                            @elseif($participant['rank'] == 2) 🥈
                                            @else 🥉
                                            @endif
                                        </span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-semibold text-gray-800">{{ $participant['name'] }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-gray-600">{{ $participant['city'] }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="bg-gradient-to-r from-green-100 to-green-200 px-3 py-1 rounded-full">
                                        <span class="text-green-700 font-bold">{{ $participant['score'] }}/20</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-blue-600 font-medium">{{ $participant['time'] }}</span>
                            </td>
                            <td class="px-6 py-4">
                                @if($participant['score'] >= 18)
                                    <span class="bg-gradient-to-r from-green-100 to-green-200 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">🏆 Warrior</span>
                                @elseif($participant['score'] >= 10)
                                    <span class="bg-gradient-to-r from-blue-100 to-blue-200 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">⭐ Good</span>
                                @else
                                    <span class="bg-gradient-to-r from-orange-100 to-orange-200 text-orange-700 px-3 py-1 rounded-full text-sm font-semibold">💪 Beginner</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Take Quiz Button -->
        <div class="mt-12 text-center">
            <a href="{{ route('register') }}" class="inline-block bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                🚀 Take Quiz & Join Leaderboard
            </a>
        </div>

        <!-- Stats -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-orange-100 text-center">
                <div class="text-3xl font-bold text-orange-600">72,485</div>
                <div class="text-sm text-gray-600">Total Participants</div>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-green-100 text-center">
                <div class="text-3xl font-bold text-green-600">68,392</div>
                <div class="text-sm text-gray-600">Completed Quizzes</div>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-blue-100 text-center">
                <div class="text-3xl font-bold text-blue-600">14.7</div>
                <div class="text-sm text-gray-600">Average Score</div>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-purple-100 text-center">
                <div class="text-3xl font-bold text-purple-600">20</div>
                <div class="text-sm text-gray-600">Highest Score</div>
            </div>
        </div>
    </div>
</div>
@endsection