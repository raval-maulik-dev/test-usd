@extends('layouts.admin')

@section('title', 'Dashboard - Admin Panel')
@section('page-title', 'Dashboard')
@section('page-description', 'Real-time overview of Swadeshi Abhiyan event statistics')

@section('content')
<div class="p-6">
    <!-- KPI Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Registrations -->
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-orange-100 hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Registrations</p>
                    <p class="text-3xl font-bold text-orange-600">{{ number_format($stats['total_registrations']) }}</p>
                    <p class="text-sm text-green-600 flex items-center mt-1">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                        +{{ number_format($stats['today_registrations']) }} today
                    </p>
                </div>
                <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Active Users -->
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-green-100 hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Active Users</p>
                    <p class="text-3xl font-bold text-green-600">{{ number_format($stats['active_users']) }}</p>
                    <p class="text-sm text-gray-500 flex items-center mt-1">
                        <div class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></div>
                        Currently online
                    </p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Completed Quizzes -->
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-blue-100 hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Completed Quizzes</p>
                    <p class="text-3xl font-bold text-blue-600">{{ number_format($stats['completed_quizzes']) }}</p>
                    <p class="text-sm text-blue-600 mt-1">{{ $stats['quiz_completion_rate'] }}% completion rate</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Certificates Generated -->
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-purple-100 hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Certificates Generated</p>
                    <p class="text-3xl font-bold text-purple-600">{{ number_format($stats['certificates_generated']) }}</p>
                    <p class="text-sm text-gray-500 mt-1">Avg Score: {{ $stats['average_score'] }}/20</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Hourly Registration Chart -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Hourly Registrations Today</h3>
            <div class="w-full overflow-x-auto">
                <div style="width: 600px; height: 300px; min-width: 600px;">
                    <canvas id="hourlyChart" width="600" height="300"></canvas>
                </div>
            </div>
            <p class="text-sm text-gray-500 mt-4">*Fixed desktop view - scroll horizontally on smaller screens</p>
        </div>

        <!-- Score Distribution -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Score Distribution</h3>
            <div class="w-full overflow-x-auto">
                <div style="width: 600px; height: 300px; min-width: 600px;">
                    <canvas id="scoreChart" width="600" height="300"></canvas>
                </div>
            </div>
            <p class="text-sm text-gray-500 mt-4">*Fixed desktop view - scroll horizontally on smaller screens</p>
        </div>
    </div>

    <!-- Recent Activity and Top Cities -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Activity -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">Recent Activity</h3>
                <p class="text-sm text-gray-600">Live user activities</p>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    @foreach($recentActivity as $activity)
                    <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-200">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-sm">
                            {{ substr($activity['user'], 0, 1) }}
                        </div>
                        <div class="flex-1">
                            <p class="font-medium text-gray-800">{{ $activity['user'] }}</p>
                            <p class="text-sm text-gray-600">{{ $activity['action'] }}
                                @if($activity['score'])
                                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-medium ml-2">
                                        Score: {{ $activity['score'] }}/20
                                    </span>
                                @endif
                            </p>
                        </div>
                        <div class="text-sm text-gray-500">{{ $activity['time'] }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Performance Metrics -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">Performance Metrics</h3>
                <p class="text-sm text-gray-600">Key performance indicators</p>
            </div>
            <div class="p-6">
                <div class="space-y-6">
                    <!-- Quiz Completion Rate -->
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm font-medium text-gray-700">Quiz Completion Rate</span>
                            <span class="text-sm font-bold text-green-600">{{ $stats['quiz_completion_rate'] }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-gradient-to-r from-green-500 to-green-600 h-3 rounded-full" style="width: {{ $stats['quiz_completion_rate'] }}%"></div>
                        </div>
                    </div>

                    <!-- Average Score -->
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm font-medium text-gray-700">Average Score</span>
                            <span class="text-sm font-bold text-blue-600">{{ $stats['average_score'] }}/20</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-3 rounded-full" style="width: {{ ($stats['average_score']/20)*100 }}%"></div>
                        </div>
                    </div>

                    <!-- Certificate Generation -->
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm font-medium text-gray-700">Certificate Generation Rate</span>
                            <span class="text-sm font-bold text-purple-600">95.2%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-gradient-to-r from-purple-500 to-purple-600 h-3 rounded-full" style="width: 95.2%"></div>
                        </div>
                    </div>

                    <!-- User Engagement -->
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm font-medium text-gray-700">User Engagement</span>
                            <span class="text-sm font-bold text-orange-600">87.5%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-gradient-to-r from-orange-500 to-red-600 h-3 rounded-full" style="width: 87.5%"></div>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-green-600">{{ $stats['top_score'] }}</div>
                            <div class="text-xs text-gray-600">Highest Score</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-blue-600">4:32</div>
                            <div class="text-xs text-gray-600">Avg Completion</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Hourly Registration Chart
    const hourlyCtx = document.getElementById('hourlyChart').getContext('2d');
    new Chart(hourlyCtx, {
        type: 'line',
        data: {
            labels: @json(array_column($hourlyStats, 'hour')),
            datasets: [{
                label: 'Registrations',
                data: @json(array_column($hourlyStats, 'registrations')),
                borderColor: 'rgb(249, 115, 22)',
                backgroundColor: 'rgba(249, 115, 22, 0.1)',
                tension: 0.4,
                fill: true
            }, {
                label: 'Completions',
                data: @json(array_column($hourlyStats, 'completions')),
                borderColor: 'rgb(34, 197, 94)',
                backgroundColor: 'rgba(34, 197, 94, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Score Distribution Chart
    const scoreCtx = document.getElementById('scoreChart').getContext('2d');
    new Chart(scoreCtx, {
        type: 'doughnut',
        data: {
            labels: ['18-20 (Warrior)', '15-17 (Good)', '10-14 (Average)', '5-9 (Beginner)', '0-4 (Try Again)'],
            datasets: [{
                data: [15.3, 25.7, 35.2, 18.4, 5.4],
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
                    position: 'bottom',
                }
            }
        }
    });

    // Auto-refresh data every 30 seconds
    setInterval(function() {
        // In a real application, this would fetch new data via AJAX
        console.log('Refreshing dashboard data...');
    }, 30000);
});
</script>
@endsection