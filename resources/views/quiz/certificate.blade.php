@extends('layouts.app')

@section('title', 'Quiz Certificate - Swadeshi Abhiyan')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-orange-50 via-white to-green-50 py-12 px-4">
    <div class="max-w-4xl mx-auto">
        <!-- Certificate -->
        <div class="bg-white rounded-3xl shadow-2xl border-4 border-orange-200 overflow-hidden mb-8">
            <!-- Certificate Header -->
            <div class="bg-gradient-to-r from-orange-400 to-orange-600 p-8 text-center text-white">
                <h1 class="text-3xl md:text-4xl font-bold mb-2">Certificate of Achievement</h1>
                <p class="text-lg">This is to certify that</p>
            </div>

            <!-- Certificate Body -->
            <div class="p-8 text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-8">{{ $userData['name'] }}</h2>
                
                <p class="text-lg text-gray-700 mb-8">has successfully completed the Swadeshi Quiz with a score of</p>
                
                <div class="text-5xl font-bold text-orange-600 mb-8">{{ $results['score'] }} Points</div>
                
                <div class="flex justify-center mb-8">
                    <div class="w-24 h-1 bg-gradient-to-r from-orange-400 to-green-500 rounded-full"></div>
                </div>
                
                <p class="text-gray-600 mb-8">
                    Achieving {{ $results['correct_answers'] }} out of {{ $results['total_questions'] }} questions correct
                    ({{ $results['percentage'] }}%)
                </p>
                
                <div class="mb-8">
                    @if($results['badge'] == 'warrior')
                        <span class="inline-block bg-green-100 text-green-800 text-sm font-semibold px-3 py-1 rounded-full">
                            🏆 Swadeshi Warrior
                        </span>
                    @elseif($results['badge'] == 'good')
                        <span class="inline-block bg-blue-100 text-blue-800 text-sm font-semibold px-3 py-1 rounded-full">
                            ⭐ Good Start
                        </span>
                    @else
                        <span class="inline-block bg-orange-100 text-orange-800 text-sm font-semibold px-3 py-1 rounded-full">
                            💪 Keep Learning
                        </span>
                    @endif
                </div>
                
                <p class="text-gray-500 text-sm">
                    Certificate ID: SWAD-{{ strtoupper(Str::random(8)) }}
                    <br>
                    Issued on: {{ now()->format('F j, Y') }}
                </p>
            </div>
            
            <!-- Certificate Footer -->
            <div class="bg-gray-50 p-6 border-t border-gray-200">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="text-center md:text-left mb-4 md:mb-0">
                        <div class="text-gray-500 text-sm">Swadeshi Abhiyan</div>
                        <div class="text-xs text-gray-400">Empowering Indian Products</div>
                    </div>
                    <div class="flex space-x-4">
                        <a href="#" class="text-blue-500 hover:text-blue-700">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="text-blue-400 hover:text-blue-600">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-pink-500 hover:text-pink-700">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button onclick="window.print()" class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-dark px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-center">
                🖨️ Print Certificate
            </button>
            <a href="{{ route('quiz.results') }}" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-center">
                ← Back to Results
            </a>
        </div>
    </div>
</div>

<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;600&display=swap');

body {
    font-family: 'Poppins', sans-serif;
}

h1, h2, h3, h4, h5, h6 {
    font-family: 'Playfair Display', serif;
}

@media print {
    body * {
        visibility: hidden;
    }
    
    .bg-white, .bg-white * {
        visibility: visible;
    }
    
    .bg-white {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        box-shadow: none;
    }
    
    .no-print {
        display: none !important;
    }
}
</style>
@endsection
