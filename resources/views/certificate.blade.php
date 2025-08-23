@extends('layouts.app')

@section('title', 'Certificate - Swadeshi Abhiyan')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-orange-50 via-white to-green-50 py-12 px-4">
    <div class="max-w-4xl mx-auto">
        <!-- Certificate -->
        <div class="bg-white rounded-3xl shadow-2xl border-4 tricolor-border overflow-hidden" id="certificate">
            <!-- Header -->
            <div class="bg-gradient-to-r from-orange-500 via-white to-green-600 p-8 text-center relative">
                <div class="absolute inset-0 opacity-10">
                    <div class="w-full h-full bg-gradient-to-br from-orange-200 via-transparent to-green-200"></div>
                </div>
                <div class="relative z-10">
                    <div class="w-20 h-20 tricolor-gradient rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <span class="text-gray-800 font-bold text-2xl">SA</span>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Certificate of Achievement</h1>
                    <p class="text-lg text-gray-700">Swadeshi Abhiyan - Mehsana 2025</p>
                </div>
            </div>

            <!-- Certificate Body -->
            <div class="p-12 text-center">
                <div class="mb-8">
                    <p class="text-lg text-gray-600 mb-4">This is to certify that</p>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4 bg-clip-text text-transparent bg-gradient-to-r from-orange-600 to-green-600">
                        {{ $userData['name'] ?? 'Participant Name' }}
                    </h2>
                    <p class="text-lg text-gray-600 mb-8">has successfully participated in the</p>
                </div>

                <div class="bg-gradient-to-r from-orange-50 to-green-50 rounded-2xl p-8 mb-8 border border-orange-200">
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">Swadeshi Knowledge Quiz</h3>
                    <p class="text-gray-600 mb-6">Testing knowledge of Indian products and brands</p>
                    
                    <!-- Score Display -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-white rounded-xl p-4 shadow-md">
                            <div class="text-3xl font-bold text-green-600">{{ $results['correct_answers'] ?? '18' }}/20</div>
                            <div class="text-sm text-gray-600">Correct Answers</div>
                        </div>
                        <div class="bg-white rounded-xl p-4 shadow-md">
                            <div class="text-3xl font-bold text-blue-600">{{ $results['score'] ?? '95' }}</div>
                            <div class="text-sm text-gray-600">Total Score</div>
                        </div>
                        <div class="bg-white rounded-xl p-4 shadow-md">
                            <div class="text-3xl font-bold text-purple-600">{{ $results['percentage'] ?? '90' }}%</div>
                            <div class="text-sm text-gray-600">Accuracy</div>
                        </div>
                    </div>
                </div>

                <!-- Badge -->
                <div class="mb-8">
                    @php
                        $badge = $results['badge'] ?? 'warrior';
                        $badgeText = $badge == 'warrior' ? 'Swadeshi Warrior' : ($badge == 'good' ? 'Good Start' : 'Keep Learning');
                        $badgeColor = $badge == 'warrior' ? 'green' : ($badge == 'good' ? 'blue' : 'orange');
                        $badgeIcon = $badge == 'warrior' ? '🏆' : ($badge == 'good' ? '⭐' : '💪');
                    @endphp
                    
                    <div class="inline-block bg-gradient-to-r from-{{ $badgeColor }}-100 to-{{ $badgeColor }}-200 rounded-2xl p-6 border border-{{ $badgeColor }}-300">
                        <div class="text-4xl mb-2">{{ $badgeIcon }}</div>
                        <div class="text-xl font-bold text-{{ $badgeColor }}-700">{{ $badgeText }}</div>
                    </div>
                </div>

                <!-- Certificate Details -->
                <div class="border-t border-gray-200 pt-8 mt-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-sm text-gray-600">
                        <div>
                            <p><strong>Certificate ID:</strong> {{ $userData['id'] ?? 'SA123456' }}</p>
                            <p><strong>Date Issued:</strong> {{ date('F d, Y') }}</p>
                        </div>
                        <div>
                            <p><strong>Event:</strong> Swadeshi Abhiyan Mehsana 2025</p>
                            <p><strong>Category:</strong> Cultural Awareness Quiz</p>
                        </div>
                    </div>
                </div>

                <!-- QR Code -->
                <div class="mt-8 flex justify-center">
                    <div class="w-24 h-24 bg-gray-200 rounded-xl flex items-center justify-center border border-gray-300">
                        <svg class="w-16 h-16 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="bg-gradient-to-r from-gray-800 to-gray-900 p-6 text-center text-white">
                <p class="text-sm">"Vocal for Local - Supporting Indian Products and Entrepreneurs"</p>
                <p class="text-xs mt-2 text-gray-300">#SwadeshiAbhiyan #VocalForLocal #MadeInIndia</p>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
            <button onclick="downloadPDF()" class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                📄 Download PDF
            </button>
            <button onclick="downloadImage()" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                🖼️ Download Image
            </button>
            <button onclick="shareOnSocial()" class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                📱 Share Now
            </button>
        </div>

        <!-- Social Share Options -->
        <div class="mt-8 bg-white rounded-3xl shadow-lg border border-orange-100 p-8" id="shareOptions" style="display: none;">
            <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Share Your Achievement</h3>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                <button onclick="shareToInstagram()" class="flex flex-col items-center p-4 bg-gradient-to-br from-pink-50 to-pink-100 rounded-2xl border border-pink-200 hover:border-pink-400 transition-all duration-300 hover:scale-105">
                    <div class="text-3xl mb-2">📱</div>
                    <span class="text-pink-700 font-semibold">Instagram</span>
                </button>
                <button onclick="shareToWhatsApp()" class="flex flex-col items-center p-4 bg-gradient-to-br from-green-50 to-green-100 rounded-2xl border border-green-200 hover:border-green-400 transition-all duration-300 hover:scale-105">
                    <div class="text-3xl mb-2">💬</div>
                    <span class="text-green-700 font-semibold">WhatsApp</span>
                </button>
                <button onclick="shareToFacebook()" class="flex flex-col items-center p-4 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl border border-blue-200 hover:border-blue-400 transition-all duration-300 hover:scale-105">
                    <div class="text-3xl mb-2">📘</div>
                    <span class="text-blue-700 font-semibold">Facebook</span>
                </button>
                <button onclick="shareToTwitter()" class="flex flex-col items-center p-4 bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl border border-gray-200 hover:border-gray-400 transition-all duration-300 hover:scale-105">
                    <div class="text-3xl mb-2">🐦</div>
                    <span class="text-gray-700 font-semibold">Twitter/X</span>
                </button>
            </div>

            <div class="text-center">
                <p class="text-gray-600 mb-4">Suggested hashtags:</p>
                <div class="flex flex-wrap justify-center gap-2">
                    <span class="bg-orange-100 text-orange-700 px-4 py-2 rounded-full text-sm font-semibold">#SwadeshiAbhiyan</span>
                    <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">#VocalForLocal</span>
                    <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold">#MadeInIndia</span>
                    <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-semibold">#SwadeshiWarrior</span>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.tricolor-gradient {
    background: linear-gradient(to right, #FF9933 33.33%, #FFFFFF 33.33%, #FFFFFF 66.66%, #138808 66.66%);
}

.tricolor-border {
    border-image: linear-gradient(to right, #FF9933 33.33%, #FFFFFF 33.33%, #FFFFFF 66.66%, #138808 66.66%) 1;
}

@media print {
    body * {
        visibility: hidden;
    }
    #certificate, #certificate * {
        visibility: visible;
    }
    #certificate {
        position: absolute;
        left: 0;
        top: 0;
    }
}
</style>

<script>
function downloadPDF() {
    // In a real implementation, this would generate a PDF
    alert('PDF download functionality would be implemented here using libraries like jsPDF or server-side PDF generation.');
}

function downloadImage() {
    // In a real implementation, this would generate an image
    alert('Image download functionality would be implemented here using html2canvas or similar libraries.');
}

function shareOnSocial() {
    document.getElementById('shareOptions').style.display = 
        document.getElementById('shareOptions').style.display === 'none' ? 'block' : 'none';
}

function shareToInstagram() {
    const text = `Just earned my Swadeshi Warrior certificate! 🏆 Scored ${{{ $results['correct_answers'] ?? '18' }}}/20 in the Swadeshi Abhiyan quiz. #SwadeshiAbhiyan #VocalForLocal #MadeInIndia`;
    // Instagram sharing would require their API or redirect to Instagram app
    alert('Instagram sharing: ' + text);
}

function shareToWhatsApp() {
    const text = `Just earned my Swadeshi Warrior certificate! 🏆 Scored ${{{ $results['correct_answers'] ?? '18' }}}/20 in the Swadeshi Abhiyan quiz. #SwadeshiAbhiyan #VocalForLocal #MadeInIndia`;
    const whatsappUrl = `https://wa.me/?text=${encodeURIComponent(text)}`;
    window.open(whatsappUrl, '_blank');
}

function shareToFacebook() {
    const text = `Just earned my Swadeshi Warrior certificate! Scored ${{{ $results['correct_answers'] ?? '18' }}}/20 in the Swadeshi Abhiyan quiz.`;
    const facebookUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(window.location.href)}&quote=${encodeURIComponent(text)}`;
    window.open(facebookUrl, '_blank');
}

function shareToTwitter() {
    const text = `Just earned my Swadeshi Warrior certificate! 🏆 Scored ${{{ $results['correct_answers'] ?? '18' }}}/20 in the Swadeshi Abhiyan quiz. #SwadeshiAbhiyan #VocalForLocal #MadeInIndia`;
    const twitterUrl = `https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}`;
    window.open(twitterUrl, '_blank');
}
</script>
@endsection