@extends('layouts.app')

@section('title', 'Register - Swadeshi Abhiyan')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-orange-50 via-white to-green-50 py-12 px-4">
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Join Swadeshi Abhiyan</h1>
            <p class="text-lg text-gray-600">Register now to test your knowledge of Indian products</p>
        </div>

        <!-- Registration Form -->
        <div class="bg-white rounded-3xl shadow-2xl border border-orange-100 overflow-hidden">
            <div class="bg-gradient-to-r from-orange-500 to-red-600 p-6 text-center">
                <h2 class="text-2xl font-bold text-white">Registration Form</h2>
                <p class="text-orange-100">Fill in your details to get started</p>
            </div>

            <form action="{{ route('register.process') }}" method="POST" class="p-8 space-y-6">
                @csrf
                
                <!-- Name Field -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name *</label>
                    <input type="text" name="name" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300"
                           placeholder="Enter your full name">
                </div>
                <!-- mobile nu -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Mobile Number *</label>
                    <input type="tel" name="mobile" required 
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300"
                            placeholder="+91 98765 43210">
                </div>

                <!-- City Field
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">City *</label>
                    <input type="text" name="city" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300"
                           placeholder="Enter your city">
                </div>

                Password Field
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Password *</label>
                    <input type="password" name="password" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300"
                           placeholder="Create a password"
                           minlength="8">
                </div>

                Confirm Password Field
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Confirm Password *</label>
                    <input type="password" name="password_confirmation" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300"
                           placeholder="Confirm your password"
                           minlength="8">
                </div> -->

                <!-- Terms and Conditions
                <div class="flex items-start space-x-3">
                    <input type="checkbox" id="terms" required class="mt-1 w-5 h-5 text-orange-500 border border-gray-300 rounded focus:ring-orange-500">
                    <label for="terms" class="text-sm text-gray-600">
                        I agree to the <a href="#" class="text-orange-600 hover:text-orange-700 font-medium">Terms and Conditions</a> and 
                        <a href="#" class="text-orange-600 hover:text-orange-700 font-medium">Privacy Policy</a>. I consent to receive event-related communications.
                    </label>
                </div> -->

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white py-4 rounded-xl font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    🚀 Register & Start Quiz
                </button>
            </form>

        </div>
    </div>
</div>

<style>
.tricolor-gradient {
    background: linear-gradient(to right, #FF9933 33.33%, #FFFFFF 33.33%, #FFFFFF 66.66%, #138808 66.66%);
}
</style>
@endsection