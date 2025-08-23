@extends('layouts.admin')

@section('title', 'Questions Management - Admin Panel')
@section('page-title', 'Questions Management')
@section('page-description', 'Manage quiz questions and their options')

@section('content')
<div class="p-6">
    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6">
        <div class="flex items-center space-x-4 mb-4 sm:mb-0">
            <!-- Search -->
            <div class="relative">
                <input type="text" placeholder="Search questions..." 
                       class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
            
            <!-- Category Filter -->
            <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                <option>All Categories</option>
                <option>Tea/Beverages</option>
                <option>Electronics</option>
                <option>Fashion</option>
                <option>Food</option>
                <option>Automotive</option>
            </select>
        </div>
        
        <div class="flex items-center space-x-4">
            <!-- Add Question Button -->
            <button class="bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white px-6 py-2 rounded-lg font-medium transition-all duration-300 shadow-md hover:shadow-lg flex items-center space-x-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                <span>Add Question</span>
            </button>
            
            <!-- Bulk Import -->
            <button class="bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 px-4 py-2 rounded-lg font-medium transition-all duration-300 flex items-center space-x-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                </svg>
                <span>Import</span>
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-blue-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Questions</p>
                    <p class="text-3xl font-bold text-blue-600">{{ count($questions) }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-lg border border-green-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Active Questions</p>
                    <p class="text-3xl font-bold text-green-600">{{ collect($questions)->where('status', 'Active')->count() }}</p>
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
                    <p class="text-sm font-medium text-gray-600">Categories</p>
                    <p class="text-3xl font-bold text-orange-600">5</p>
                </div>
                <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-lg border border-purple-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Avg Difficulty</p>
                    <p class="text-3xl font-bold text-purple-600">Medium</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Questions Table -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h3 class="text-lg font-semibold text-gray-800">Quiz Questions</h3>
            <p class="text-sm text-gray-600">Manage your quiz question bank</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">ID</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Question</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Category</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Difficulty</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Status</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($questions as $question)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4">
                            <div class="w-8 h-8 bg-gradient-to-r from-orange-400 to-red-500 rounded-full flex items-center justify-center text-white font-bold text-sm">
                                {{ $question['id'] }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-medium text-gray-800 max-w-md">{{ $question['question'] }}</div>
                            <div class="text-sm text-gray-500 mt-1">4 options with images</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="bg-gradient-to-r from-blue-100 to-blue-200 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">
                                {{ $question['category'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            @if($question['difficulty'] == 'Easy')
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Easy</span>
                            @elseif($question['difficulty'] == 'Medium')
                                <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm font-medium">Medium</span>
                            @else
                                <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-medium">Hard</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($question['status'] == 'Active')
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium flex items-center">
                                    <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                                    Active
                                </span>
                            @else
                                <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm font-medium">Inactive</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-2">
                                <button class="text-blue-600 hover:text-blue-800 font-medium text-sm flex items-center space-x-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    <span>View</span>
                                </button>
                                <button class="text-green-600 hover:text-green-800 font-medium text-sm flex items-center space-x-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    <span>Edit</span>
                                </button>
                                <button class="text-red-600 hover:text-red-800 font-medium text-sm flex items-center space-x-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    <span>Delete</span>
                                </button>
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
                    Showing 1 to {{ count($questions) }} of {{ count($questions) }} questions
                </div>
                <div class="flex items-center space-x-2">
                    <button class="px-3 py-1 border border-gray-300 rounded text-sm text-gray-600 hover:bg-gray-100">Previous</button>
                    <button class="px-3 py-1 bg-orange-500 text-white rounded text-sm">1</button>
                    <button class="px-3 py-1 border border-gray-300 rounded text-sm text-gray-600 hover:bg-gray-100">Next</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Question Preview Modal (Hidden by default) -->
    <div id="questionModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-semibold text-gray-800">Question Preview</h3>
                    <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="p-6">
                <div class="text-center mb-8">
                    <h4 class="text-2xl font-bold text-gray-800 mb-4">Which of these is an Indian product?</h4>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-gray-50 rounded-2xl p-6 border-2 border-gray-200">
                        <div class="w-full h-32 bg-gray-200 rounded-xl mb-4 flex items-center justify-center">
                            <span class="text-gray-700 font-bold">Tata Tea</span>
                        </div>
                        <p class="text-center font-semibold text-gray-800">Option A</p>
                    </div>
                    <div class="bg-gray-50 rounded-2xl p-6 border-2 border-gray-200">
                        <div class="w-full h-32 bg-gray-200 rounded-xl mb-4 flex items-center justify-center">
                            <span class="text-gray-700 font-bold">Lipton</span>
                        </div>
                        <p class="text-center font-semibold text-gray-800">Option B</p>
                    </div>
                    <div class="bg-gray-50 rounded-2xl p-6 border-2 border-gray-200">
                        <div class="w-full h-32 bg-gray-200 rounded-xl mb-4 flex items-center justify-center">
                            <span class="text-gray-700 font-bold">Tetley</span>
                        </div>
                        <p class="text-center font-semibold text-gray-800">Option C</p>
                    </div>
                    <div class="bg-gray-50 rounded-2xl p-6 border-2 border-gray-200">
                        <div class="w-full h-32 bg-gray-200 rounded-xl mb-4 flex items-center justify-center">
                            <span class="text-gray-700 font-bold">Brooke Bond</span>
                        </div>
                        <p class="text-center font-semibold text-gray-800">Option D</p>
                    </div>
                </div>
                <div class="mt-6 p-4 bg-green-50 rounded-xl border border-green-200">
                    <p class="text-green-700"><strong>Correct Answer:</strong> Option A (Tata Tea)</p>
                    <p class="text-green-600 text-sm mt-1">Tata Tea is an Indian brand owned by Tata Consumer Products.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Search functionality
    $('input[placeholder="Search questions..."]').on('keyup', function() {
        const searchTerm = $(this).val().toLowerCase();
        $('tbody tr').each(function() {
            const text = $(this).text().toLowerCase();
            $(this).toggle(text.includes(searchTerm));
        });
    });

    // View question modal
    $('button:contains("View")').click(function() {
        $('#questionModal').removeClass('hidden');
    });

    // Add question
    $('button:contains("Add Question")').click(function() {
        alert('Add question functionality would open a form modal or redirect to question creation page.');
    });

    // Import questions
    $('button:contains("Import")').click(function() {
        alert('Bulk import functionality would allow CSV/Excel file uploads for multiple questions.');
    });
});

function closeModal() {
    $('#questionModal').addClass('hidden');
}
</script>
@endsection