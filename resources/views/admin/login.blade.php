@extends('layouts.app')

@section('title', 'Admin Login - Swadeshi Abhiyan')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-orange-50 via-white to-green-50 flex items-center justify-center px-4">
    <div class="max-w-md w-full">
        <!-- Login Card -->
        <div class="bg-white rounded-2xl shadow-2xl border border-orange-100 overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-orange-500 to-red-600 p-6 text-center">
                <div class="w-20 h-20 tricolor-gradient rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-gray-800 font-bold text-2xl">SA</span>
                </div>
                <h2 class="text-2xl font-bold text-white">Admin Panel</h2>
                <p class="text-orange-100">Swadeshi Abhiyan - Mehsana 2025</p>
            </div>

            <!-- Login Form -->
            <div class="p-6">
                @if($errors->any())
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-red-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-red-800 text-sm">{{ $errors->first() }}</span>
                        </div>
                    </div>
                @endif

                <form action="{{ route('admin.login') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Email Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <input type="email" name="email" required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-colors"
                               placeholder="Enter admin email">
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <input type="password" name="password" required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-colors"
                               placeholder="Enter password">
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="w-full bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white py-3 rounded-lg font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        Sign In to Admin Panel
                    </button>
                </form>

                <!-- Demo Credentials -->
                <div class="mt-8 bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <svg class="w-5 h-5 text-gray-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-6 6H9a6 6 0 01-6-6V9a6 6 0 016-6h6a6 6 0 016 6v0z"/>
                        </svg>
                        Demo Credentials
                    </h3>
                    <div class="space-y-3">
                        <div class="bg-white rounded-lg p-4 border border-gray-200">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="font-medium text-gray-800">Super Admin</p>
                                    <p class="text-sm text-gray-600">admin@swadeshi.com</p>
                                </div>
                                <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm font-medium">admin123</span>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg p-4 border border-gray-200">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="font-medium text-gray-800">Manager</p>
                                    <p class="text-sm text-gray-600">manager@swadeshi.com</p>
                                </div>
                                <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm font-medium">manager123</span>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg p-4 border border-gray-200">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="font-medium text-gray-800">Supervisor</p>
                                    <p class="text-sm text-gray-600">supervisor@swadeshi.com</p>
                                </div>
                                <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm font-medium">supervisor123</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Back to Website -->
                <div class="mt-6 text-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center space-x-2 text-gray-600 hover:text-orange-600 font-medium transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        <span>Back to Website</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Live Stats -->
        <div class="mt-6 text-center">
            <div class="flex items-center justify-center space-x-6 text-sm text-gray-600">
                <div class="flex items-center space-x-2">
                    <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                    <span>8,943 Active Users</span>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                    <span>72,485 Total Registrations</span>
                </div>
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