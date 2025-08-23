@extends('layouts.admin')

@section('title', 'Users Management - Admin Panel')
@section('page-title', 'Users Management')
@section('page-description', 'Manage registered users and their quiz performance')

@section('content')
<div class="p-6">
    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6">
        <div class="flex items-center space-x-4 mb-4 sm:mb-0">
            <!-- Search -->
            <div class="relative">
                <input type="text" placeholder="Search users..." 
                       class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
            
            <!-- Filters -->
            <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                <option>All Status</option>
                <option>Completed</option>
                <option>Registered</option>
                <option>In Progress</option>
            </select>
        </div>
        
        <div class="flex items-center space-x-4">
            <!-- Export Button -->
            <button class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-6 py-2 rounded-lg font-medium transition-all duration-300 shadow-md hover:shadow-lg flex items-center space-x-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <span>Export CSV</span>
            </button>
            
            <!-- Refresh Button -->
            <button class="bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 px-4 py-2 rounded-lg font-medium transition-all duration-300 flex items-center space-x-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                <span>Refresh</span>
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-blue-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Users</p>
                    <p class="text-3xl font-bold text-blue-600">{{ count($users) }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-lg border border-green-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Completed</p>
                    <p class="text-3xl font-bold text-green-600">{{ collect($users)->where('status', 'Completed')->count() }}</p>
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
                    <p class="text-3xl font-bold text-orange-600">{{ collect($users)->whereNotNull('score')->avg('score') ? round(collect($users)->whereNotNull('score')->avg('score'), 1) : 0 }}</p>
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
                    <p class="text-sm font-medium text-gray-600">Top Score</p>
                    <p class="text-3xl font-bold text-purple-600">{{ collect($users)->max('score') ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3l14 9-14 9V3z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Users Table -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h3 class="text-lg font-semibold text-gray-800">Registered Users</h3>
            <p class="text-sm text-gray-600">Complete list of event participants</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">User ID</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Name</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Contact</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">City</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Score</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Status</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($users as $user)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-gradient-to-r from-orange-400 to-red-500 rounded-full flex items-center justify-center text-white font-bold text-sm mr-3">
                                    {{ substr($user['name'], 0, 1) }}
                                </div>
                                <span class="font-medium text-gray-800">{{ $user['id'] }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-semibold text-gray-800">{{ $user['name'] }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-600">{{ $user['email'] }}</div>
                            <div class="text-sm text-gray-500">{{ $user['mobile'] }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-gray-700">{{ $user['city'] }}</span>
                        </td>
                        <td class="px-6 py-4">
                            @if($user['score'])
                                <div class="flex items-center">
                                    <div class="bg-gradient-to-r from-{{ $user['score'] >= 18 ? 'green' : ($user['score'] >= 10 ? 'blue' : 'orange') }}-100 to-{{ $user['score'] >= 18 ? 'green' : ($user['score'] >= 10 ? 'blue' : 'orange') }}-200 px-3 py-1 rounded-full">
                                        <span class="text-{{ $user['score'] >= 18 ? 'green' : ($user['score'] >= 10 ? 'blue' : 'orange') }}-700 font-bold text-sm">{{ $user['score'] }}/20</span>
                                    </div>
                                </div>
                            @else
                                <span class="text-gray-400 text-sm">Not attempted</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($user['status'] == 'Completed')
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">✓ Completed</span>
                            @else
                                <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm font-medium">⏳ Registered</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-2">
                                <button class="text-blue-600 hover:text-blue-800 font-medium text-sm">View</button>
                                <button class="text-green-600 hover:text-green-800 font-medium text-sm">Certificate</button>
                                <button class="text-red-600 hover:text-red-800 font-medium text-sm">Delete</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
            <div class="flex items-center justify-between">
                <div class="text-sm text-gray-600">
                    Showing 1 to {{ count($users) }} of {{ count($users) }} entries
                </div>
                <div class="flex items-center space-x-2">
                    <button class="px-3 py-1 border border-gray-300 rounded text-sm text-gray-600 hover:bg-gray-100">Previous</button>
                    <button class="px-3 py-1 bg-orange-500 text-white rounded text-sm">1</button>
                    <button class="px-3 py-1 border border-gray-300 rounded text-sm text-gray-600 hover:bg-gray-100">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Search functionality
    $('input[placeholder="Search users..."]').on('keyup', function() {
        const searchTerm = $(this).val().toLowerCase();
        $('tbody tr').each(function() {
            const text = $(this).text().toLowerCase();
            $(this).toggle(text.includes(searchTerm));
        });
    });

    // Export CSV functionality
    $('button:contains("Export CSV")').click(function() {
        alert('CSV export functionality would be implemented here with server-side processing.');
    });

    // Refresh data
    $('button:contains("Refresh")').click(function() {
        location.reload();
    });
});
</script>
@endsection