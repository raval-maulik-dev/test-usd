@extends('layouts.app')

@section('title', 'Login - Swadeshi Abhiyan')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-orange-50 via-white to-green-50 py-12 px-4">
    <div class="max-w-md mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="w-20 h-20 tricolor-gradient rounded-full flex items-center justify-center mx-auto mb-6 flag-animation shadow-2xl">
                <span class="text-gray-800 font-bold text-2xl">SA</span>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Welcome Back!</h1>
            <p class="text-lg text-gray-600">Login to continue your Swadeshi journey</p>
        </div>

        <!-- Login Form -->
        <div class="bg-white rounded-3xl shadow-2xl border border-orange-100 overflow-hidden">
            <div class="bg-gradient-to-r from-orange-500 to-red-600 p-6 text-center">
                <h2 class="text-2xl font-bold text-white">Login</h2>
                <p class="text-orange-100">Enter your credentials to continue</p>
            </div>

            <form action="{{ route('login') }}" method="POST" class="p-8 space-y-6">
                @csrf
                
                @if($errors->any())
                    <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-4">
                        <p>{{ $errors->first() }}</p>
                    </div>
                @endif
                
                <!-- Mobile Number -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Mobile Number *</label>
                    <input type="tel" name="mobile" value="{{ old('mobile') }}" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300"
                           placeholder="+91 98765 43210">
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Password *</label>
                    <input type="password" name="password" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300"
                           placeholder="Enter your password">
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-orange-500 focus:ring-orange-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
                    </div>
                    <div>
                        <a href="#" class="text-sm font-medium text-orange-600 hover:text-orange-500">Forgot password?</a>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white py-4 rounded-xl font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    Login
                </button>

                <!-- Register Link -->
                <p class="text-center text-sm text-gray-600">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="font-medium text-orange-600 hover:text-orange-500">
                        Register here
                    </a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
