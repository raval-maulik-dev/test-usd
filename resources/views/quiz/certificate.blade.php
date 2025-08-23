@extends('layouts.app')

@section('title', 'Quiz Certificate - Swadeshi Abhiyan')

@section('content')
<div class="min-h-screen bg-gray-100 py-12 px-4 print:py-0 print:px-0">
    <div class="max-w-4xl mx-auto">
        <!-- Certificate Container -->
        <div class="bg-white rounded-3xl shadow-2xl border-4 border-orange-200 overflow-hidden mb-8 print:shadow-none print:border-0 print:rounded-none">
            <!-- Certificate Background -->
            <div class="relative bg-gradient-to-br from-orange-50 via-white to-green-50 p-8 print:p-12">
                <!-- Decorative Elements -->
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-orange-500 via-amber-500 to-green-500"></div>
                <div class="absolute top-4 right-4 opacity-20">
                    <svg class="w-24 h-24 text-orange-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                </div>
                
                <!-- Certificate Content -->
                <div class="relative z-10 text-center">
                    <!-- Header -->
                    <div class="mb-8">
                        <div class="flex justify-center mb-6">
                            <img src="{{ asset('asset/useswadeshi-remove-bg-logo.png') }}" alt="Swadeshi Abhiyan" class="h-24 w-auto md:h-40">
                        </div>
                        <h1 class="text-3xl md:text-4xl font-bold text-orange-600 mb-2">Certificate of Achievement</h1>
                        <p class="text-gray-600">This certificate is proudly presented to</p>
                    </div>

                    <!-- Recipient Name -->
                    <div class="my-12">
                        <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">{{ $userData['name'] }}</h2>
                        <div class="w-32 h-1 bg-gradient-to-r from-orange-400 to-green-500 mx-auto my-6"></div>
                    </div>

                    <!-- Achievement Details -->
                    <div class="max-w-2xl mx-auto mb-12">
                        <p class="text-lg text-gray-700 mb-6">
                            For successfully completing the Swadeshi Abhiyan Quiz with distinction,
                            demonstrating exceptional knowledge of Indian products and the Swadeshi movement.
                        </p>
                        
                        @if($results['badge'] == 'warrior')
                            <div class="mt-6 inline-flex items-center bg-gradient-to-r from-yellow-400 to-yellow-500 text-white px-6 py-2 rounded-full text-sm font-semibold">
                                🏆 Swadeshi Warrior
                            </div>
                        @elseif($results['badge'] == 'good')
                            <div class="mt-6 inline-flex items-center bg-gradient-to-r from-blue-400 to-blue-500 text-white px-6 py-2 rounded-full text-sm font-semibold">
                                ⭐ Good Start
                            </div>
                        @else
                            <div class="mt-6 inline-flex items-center bg-gradient-to-r from-orange-400 to-orange-500 text-white px-6 py-2 rounded-full text-sm font-semibold">
                                💪 Keep Learning
                            </div>
                        @endif
                    </div>

                    <!-- Footer -->
                    <div class="mt-12 pt-6 border-t border-gray-200">
                        <div class="flex flex-col md:flex-row justify-between items-center">
                            <div class="text-center md:text-left mb-4 md:mb-0">
                                <div class="font-bold text-gray-800">Swadeshi Abhiyan</div>
                                <div class="text-sm text-gray-500">Empowering Indian Products &amp; Economy</div>
                            </div>
                            <div class="text-center">
                                <div class="text-sm text-gray-500">Issued on</div>
                                <div class="font-semibold text-gray-800">{{ now()->format('F j, Y') }}</div>
                            </div>
                            <div class="text-center md:text-right mt-4 md:mt-0">
                                <div class="text-sm text-gray-500">Certificate ID</div>
                                <div class="font-mono text-sm text-gray-600">SWAD-{{ strtoupper(Str::random(8)) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Action Buttons -->
        <div class="print:hidden flex flex-col items-center mt-8 space-y-4">
            <div class="flex flex-col sm:flex-row gap-4">
                <button onclick="window.print()" class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-dark px-8 py-3 rounded-lg font-semibold text-base transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    🖨️ Print Certificate
                </button>
                <a href="{{ route('quiz.results') }}" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-8 py-3 rounded-lg font-semibold text-base transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-center">
                    ← Back to Results
                </a>
            </div>
            <button class="bg-gradient-to-r from-orange-500 via-white to-green-600 hover:from-orange-600 hover:via-gray-100 hover:to-green-700 text-gray-800 px-12 py-4 rounded-xl font-bold text-lg transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1 flex items-center justify-center space-x-2 w-full max-w-md mx-auto bg-[length:200%_auto] hover:bg-right border border-gray-200">
                <i class="bi bi-download text-2xl"></i>
                <span>Download Certificate</span>
            </button>
        </div>
        
        <!-- Share Section -->
        <div class="bg-white rounded-3xl shadow-2xl border border-orange-100 p-8 mt-20">
            <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Share Your Achievement</h3>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                <a href="https://www.instagram.com/use.swadeshi?igsh=MTczd3FwdHNucTU0bQ==" target="_blank" class="flex flex-col items-center p-4 bg-gradient-to-br from-pink-50 to-pink-100 rounded-2xl border border-pink-200 hover:border-pink-400 transition-all duration-300 hover:scale-105">
                    <i class="bi bi-instagram text-3xl mb-2" style="background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"></i>
                    <span class="text-pink-700 font-semibold">Instagram</span>
                </a>
                <a href="https://wa.me/919054966947" target="_blank" class="flex flex-col items-center p-4 bg-gradient-to-br from-green-50 to-green-100 rounded-2xl border border-green-200 hover:border-green-400 transition-all duration-300 hover:scale-105">
                    <i class="bi bi-whatsapp text-3xl mb-2" style="color: #25D366"></i>
                    <span class="text-green-700 font-semibold">WhatsApp</span>
                </a>
                <a href="https://www.facebook.com/" target="_blank" class="flex flex-col items-center p-4 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl border border-blue-200 hover:border-blue-400 transition-all duration-300 hover:scale-105">
                    <i class="bi bi-facebook text-3xl mb-2" style="color: #1877F2"></i>
                    <span class="text-blue-700 font-semibold">Facebook</span>
                </a>
                <a href="https://twitter.com/" target="_blank" class="flex flex-col items-center p-4 bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl border border-gray-200 hover:border-gray-400 transition-all duration-300 hover:scale-105">
                    <i class="bi bi-twitter-x text-3xl mb-2" style="color: #1DA1F2"></i>
                    <span class="text-gray-700 font-semibold">Twitter/X</span>
                </a>
            </div>

            <div class="text-center">
                <p class="text-gray-600 mb-4">Use these hashtags when sharing:</p>
                <div class="flex flex-wrap justify-center gap-2">
                    <span class="bg-amber-100 text-amber-700 px-4 py-2 rounded-full text-sm font-semibold">#UseSwadeshi</span>
                    <span class="bg-orange-100 text-orange-700 px-4 py-2 rounded-full text-sm font-semibold">#SwadeshiAbhiyan</span>
                    <span class="bg-pink-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">#VocalForLocal</span>
                    <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold">#MadeInIndia</span>
                    <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-semibold">#SwadeshiWarrior</span>
                </div>
            </div>
        </div>

    </div>
</div>
<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;500;600&display=swap');

body {
    font-family: 'Poppins', sans-serif;
    -webkit-print-color-adjust: exact !important;
    print-color-adjust: exact !important;
}

h1, h2, h3, h4, h5, h6 {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
}

/* Print Styles */
@media print {
    body {
        background: white;
        padding: 0;
        margin: 0;
    }
    
    .print\:p-12 {
        padding: 3rem !important;
    }
    
    @page {
        size: A4 landscape;
        margin: 0;
    }
    
    .no-print {
        display: none !important;
    }
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
