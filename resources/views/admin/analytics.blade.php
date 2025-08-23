@extends('layouts.admin')

@section('title', 'Analytics - Admin Panel')
@section('page-title', 'Analytics')
@section('page-description', 'Detailed insights and performance metrics')

@section('content')
<div class="p-6">
    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-blue-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Participants</p>
                    <p class="text-3xl font-bold text-blue-600">72,485</p>
                    <p class="text-sm text-green-600 mt-1">↗ +12.5% vs last week</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-lg border border-green-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Completion Rate</p>
                    <p class="text-3xl font-bold text-green-600">94.3%</p>
                    <p class="text-sm text-green-600 mt-1">↗ +2.1% improvement</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-lg border border-orange-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Average Score</p>
                    <p class="text-3xl font-bold text-orange-600">14.7</p>
                    <p class="text-sm text-orange-600 mt-1">Out of 20</p>
                </div>
                <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-lg border border-purple-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Engagement Rate</p>
                    <p class="text-3xl font-bold text-purple-600">87.5%</p>
                    <p class="text-sm text-purple-600 mt-1">Social shares</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Demographics Chart -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Age Demographics</h3>
            <div class="w-full overflow-x-auto">
                <div style="width: 600px; height: 300px; min-width: 600px;">
                    <canvas id="ageChart" width="600" height="300"></canvas>
                </div>
            </div>
            <p class="text-sm text-gray-500 mt-4">*Fixed desktop view - scroll horizontally on smaller screens</p>
        </div>

        <!-- Score Distribution -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Score Distribution</h3>
            <div class="w-full overflow-x-auto">
                <div style="width: 600px; height: 300px; min-width: 600px;">
                    <canvas id="scoreDistChart" width="600" height="300"></canvas>
                </div>
            </div>
            <p class="text-sm text-gray-500 mt-4">*Fixed desktop view - scroll horizontally on smaller screens</p>
        </div>
    </div>

    <!-- City-wise Performance -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 mb-8">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">City-wise Performance</h3>
            <p class="text-sm text-gray-600">Top performing cities in the quiz</p>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($analytics['demographics']['cities'] as $city => $percentage)
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-6 border border-gray-200">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="font-semibold text-gray-800">{{ $city }}</h4>
                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">{{ $percentage }}%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 mb-2">
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-2 rounded-full" style="width: {{ $percentage }}%"></div>
                    </div>
                    <div class="flex justify-between text-sm text-gray-600">
                        <span>{{ round(72485 * $percentage / 100) }} participants</span>
                        <span>Avg: {{ rand(13, 16) }}/20</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Performance Metrics -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Time Analysis -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">Time Analysis</h3>
                <p class="text-sm text-gray-600">Quiz completion time statistics</p>
            </div>
            <div class="p-6">
                <div class="space-y-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-medium text-gray-800">Average Completion Time</p>
                            <p class="text-sm text-gray-600">Overall quiz duration</p>
                        </div>
                        <div class="text-2xl font-bold text-blue-600">{{ $analytics['performance']['time_analysis']['average_time'] }}</div>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-medium text-gray-800">Fastest Completion</p>
                            <p class="text-sm text-gray-600">Record time</p>
                        </div>
                        <div class="text-2xl font-bold text-green-600">{{ $analytics['performance']['time_analysis']['fastest_completion'] }}</div>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-medium text-gray-800">Slowest Completion</p>
                            <p class="text-sm text-gray-600">Maximum time taken</p>
                        </div>
                        <div class="text-2xl font-bold text-orange-600">{{ $analytics['performance']['time_analysis']['slowest_completion'] }}</div>
                    </div>
                </div>

                <!-- Time Distribution -->
                <div class="mt-8">
                    <h4 class="font-medium text-gray-800 mb-4">Time Distribution</h4>
                    <div class="space-y-3">
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-gray-600">Under 3 minutes</span>
                                <span class="text-green-600 font-medium">15.2%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: 15.2%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-gray-600">3-5 minutes</span>
                                <span class="text-blue-600 font-medium">42.8%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-blue-500 h-2 rounded-full" style="width: 42.8%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-gray-600">5-7 minutes</span>
                                <span class="text-orange-600 font-medium">28.5%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-orange-500 h-2 rounded-full" style="width: 28.5%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-gray-600">Over 7 minutes</span>
                                <span class="text-red-600 font-medium">13.5%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-red-500 h-2 rounded-full" style="width: 13.5%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gender Analytics -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">Gender Analytics</h3>
                <p class="text-sm text-gray-600">Participation by gender</p>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-2 gap-6 mb-8">
                    <div class="text-center">
                        <div class="w-20 h-20 bg-gradient-to-r from-blue-400 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-white text-2xl">♂</span>
                        </div>
                        <div class="text-2xl font-bold text-blue-600">{{ $analytics['demographics']['gender']['Male'] }}%</div>
                        <div class="text-sm text-gray-600">Male</div>
                        <div class="text-xs text-gray-500 mt-1">{{ round(72485 * $analytics['demographics']['gender']['Male'] / 100) }} participants</div>
                    </div>
                    <div class="text-center">
                        <div class="w-20 h-20 bg-gradient-to-r from-pink-400 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-white text-2xl">♀</span>
                        </div>
                        <div class="text-2xl font-bold text-pink-600">{{ $analytics['demographics']['gender']['Female'] }}%</div>
                        <div class="text-sm text-gray-600">Female</div>
                        <div class="text-xs text-gray-500 mt-1">{{ round(72485 * $analytics['demographics']['gender']['Female'] / 100) }} participants</div>
                    </div>
                </div>

                <!-- Performance by Gender -->
                <div>
                    <h4 class="font-medium text-gray-800 mb-4">Performance Comparison</h4>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between text-sm mb-2">
                                <span class="text-gray-600">Male Average Score</span>
                                <span class="text-blue-600 font-medium">14.9/20</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="bg-blue-500 h-3 rounded-full" style="width: 74.5%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-2">
                                <span class="text-gray-600">Female Average Score</span>
                                <span class="text-pink-600 font-medium">14.4/20</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="bg-pink-500 h-3 rounded-full" style="width: 72%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Engagement Stats -->
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <h4 class="font-medium text-gray-800 mb-4">Engagement Metrics</h4>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center p-4 bg-blue-50 rounded-xl">
                            <div class="text-lg font-bold text-blue-600">92.3%</div>
                            <div class="text-xs text-blue-700">Male Completion</div>
                        </div>
                        <div class="text-center p-4 bg-pink-50 rounded-xl">
                            <div class="text-lg font-bold text-pink-600">96.8%</div>
                            <div class="text-xs text-pink-700">Female Completion</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Age Demographics Chart
    const ageCtx = document.getElementById('ageChart').getContext('2d');
    new Chart(ageCtx, {
        type: 'doughnut',
        data: {
            labels: @json(array_keys($analytics['demographics']['age_groups'])),
            datasets: [{
                data: @json(array_values($analytics['demographics']['age_groups'])),
                backgroundColor: [
                    '#3B82F6',
                    '#10B981',
                    '#F59E0B',
                    '#EF4444'
                ]
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

    // Score Distribution Chart
    const scoreCtx = document.getElementById('scoreDistChart').getContext('2d');
    new Chart(scoreCtx, {
        type: 'bar',
        data: {
            labels: @json(array_keys($analytics['performance']['score_distribution'])),
            datasets: [{
                label: 'Percentage',
                data: @json(array_values($analytics['performance']['score_distribution'])),
                backgroundColor: [
                    '#10B981',
                    '#3B82F6',
                    '#F59E0B',
                    '#EF4444',
                    '#6B7280'
                ]
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    max: 40
                }
            }
        }
    });
});
</script>
@endsection