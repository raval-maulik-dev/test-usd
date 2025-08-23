@extends('layouts.app')

@section('title', 'Take the Swadeshi Pledge')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-orange-50 via-white to-green-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <!-- Certificate Border -->
        <div class="relative bg-gradient-to-br from-amber-50 to-amber-100 border-4 border-amber-300 rounded-2xl shadow-2xl overflow-hidden transform transition-all duration-500 hover:shadow-xl">
            <!-- Decorative Corner Elements -->
            <div class="absolute top-0 left-0 w-24 h-24 border-l-4 border-t-4 border-amber-400 rounded-tl-2xl"></div>
            <div class="absolute top-0 right-0 w-24 h-24 border-r-4 border-t-4 border-amber-400 rounded-tr-2xl"></div>
            <div class="absolute bottom-0 left-0 w-24 h-24 border-l-4 border-b-4 border-amber-400 rounded-bl-2xl"></div>
            <div class="absolute bottom-0 right-0 w-24 h-24 border-r-4 border-b-4 border-amber-400 rounded-br-2xl"></div>
            
            <!-- Certificate Content -->
            <div class="relative z-10 p-8 md:p-12">
                <!-- Certificate Header -->
                <div class="text-center mb-10">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-amber-400 to-amber-600 rounded-full shadow-lg mb-6 transform hover:rotate-12 transition-transform duration-300">
                        <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h1 class="text-4xl font-extrabold text-amber-800 mb-2">Use Swadeshi Pledge</h1>
                    <div class="w-24 h-1 bg-gradient-to-r from-amber-400 to-amber-600 rounded-full mx-auto my-4"></div>
                    <p class="text-lg text-amber-700">Certificate of Commitment</p>
                </div>
                
                <!-- Certificate Body -->
                <div class="bg-white/80 backdrop-blur-sm p-8 rounded-xl border border-amber-200 shadow-inner mb-8">
                    <div class="text-center mb-8">
                        <p class="text-gray-600 mb-6">This is to certify that</p>
                        <h2 class="text-2xl font-bold text-gray-800 mb-8">{{ auth()->user()->name }}</h2>
                        <p class="text-gray-600 mb-8 leading-relaxed">
                            has solemnly pledged to support and promote Indian-made products and contribute to the growth of our nation's economy. This commitment reflects a dedication to strengthening our domestic industries and fostering economic self-reliance.
                        </p>
                        
                        <div class="my-8 py-4 border-t-2 border-b-2 border-amber-200 border-dashed">
                            <p class="italic text-amber-700 font-medium">
                                "I will make a conscious effort to choose Swadeshi products, support local businesses, and encourage others to do the same. I believe in the strength of our economy and the potential of our domestic industries."
                            </p>
                        </div>
                        
                        <div class="text-sm text-gray-500 mt-8">
                            <p>Issued on: {{ now()->format('F j, Y') }}</p>
                            <p class="mt-2">Pledge ID: SWD-{{ strtoupper(Str::random(8)) }}</p>
                        </div>
                    </div>
                </div>
                
                <!-- Pledge Button -->
                <div class="text-center">
                    <button type="button" id="acceptPledgeBtn" class="relative overflow-hidden group bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-white px-10 py-5 rounded-xl font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                        <span class="relative z-10 flex items-center justify-center">
                            <svg class="w-6 h-6 mr-2 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            🙏 I Pledge to Support Swadeshi
                        </span>
                        <span class="absolute inset-0 bg-white/10 group-hover:bg-white/5 transition-all duration-300"></span>
                    </button>
                    
                    <div class="mt-6">
                        <a href="{{ route('quiz.results') }}" class="inline-flex items-center text-amber-600 hover:text-amber-800 font-medium">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Back to Results
                        </a>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('certificate', ['id' => auth()->id()]) }}" class="inline-flex items-center text-amber-600 hover:text-amber-800 font-medium">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            Get Certificate
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const acceptBtn = document.getElementById('acceptPledgeBtn');
    
    if (acceptBtn) {
        acceptBtn.addEventListener('click', function() {
            // Save to localStorage that user has taken the pledge
            localStorage.setItem('hasPledged', 'true');
            
            // Show success message
            const successAlert = `
                <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
                    <div class="bg-white rounded-2xl p-8 max-w-md w-full text-center">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Pledge Accepted!</h3>
                        <p class="text-gray-600 mb-6">Thank you for taking the Swadeshi Pledge.</p>
                        <div class="flex flex-col space-y-3">
                            <a href="{{ route('certificate', ['id' => auth()->id()]) }}" class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 shadow-md hover:shadow-lg">
                                View Your Certificate
                            </a>
                            <a href="{{ route('leaderboard') }}" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 shadow-md hover:shadow-lg">
                                View Leaderboard
                            </a>
                        </div>
                    </div>
                </div>
            `;
            
            // Insert success message
            document.body.insertAdjacentHTML('beforeend', successAlert);
            
            // Redirect to results page after 5 seconds
            setTimeout(() => {
                window.location.href = "{{ route('quiz.results') }}";
            }, 5000);
        });
    }
});
</script>
@endpush

@endsection
