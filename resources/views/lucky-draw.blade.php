@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-orange-50 to-white">
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-orange-600 px-6 py-8 text-center">
                <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">🎉 Lucky Draw Winners 🎉</h1>
                <p class="text-orange-100 text-lg">Congratulations to our lucky winners!</p>
            </div>

            <!-- Prizes List -->
            <div class="p-6">
                <div class="space-y-6">
                    @foreach($prizes as $index => $prize)
                    <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 flex items-center">
                        <div class="flex-shrink-0 w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center text-orange-600 text-2xl font-bold">
                            {{ $index + 1 }}
                        </div>
                        <div class="ml-6">
                            <h3 class="text-xl font-semibold text-gray-800">{{ $prize['prize'] }}</h3>
                            <p class="text-gray-600">Winner: {{ $prize['winner'] }}</p>
                            <p class="text-gray-500 text-sm">From: {{ $prize['city'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Lucky Draw Info -->
                <div class="mt-10 bg-blue-50 p-6 rounded-lg border border-blue-200">
                    <h3 class="text-xl font-semibold text-blue-800 mb-3">About the Lucky Draw</h3>
                    <p class="text-gray-700 mb-4">Winners are selected randomly from all participants who have completed the quiz. New winners are announced every week!</p>
                    <p class="text-sm text-gray-500">Note: Winners will be contacted via email/phone for prize distribution.</p>
                </div>

                <!-- Back to Home -->
                <div class="mt-8 text-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-orange-600 hover:text-orange-800 font-medium">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
