@extends('layouts.app')

@section('title', 'Quiz Results - Swadeshi Abhiyan')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-orange-50 via-white to-green-50 py-12 px-4">
    <div class="max-w-4xl mx-auto">
        <!-- Results Header -->
        <div class="text-center mb-12">
            <div class="w-24 h-24 tricolor-gradient rounded-full flex items-center justify-center mx-auto mb-6 flag-animation shadow-2xl">
                <span class="text-gray-800 font-bold text-3xl">🏆</span>
            </div>
            <h1 class="text-3xl md:text-5xl font-bold text-gray-800 mb-4">Quiz Results</h1>
            <p class="text-lg text-gray-600">Your Swadeshi knowledge assessment</p>
        </div>

        @if($results)
            <div class="bg-white rounded-3xl shadow-2xl border border-orange-100 overflow-hidden mb-8">
                <div class="bg-gradient-to-r from-{{ $results['badge'] == 'warrior' ? 'green' : ($results['badge'] == 'good' ? 'blue' : 'orange') }}-500 to-{{ $results['badge'] == 'warrior' ? 'green' : ($results['badge'] == 'good' ? 'blue' : 'red') }}-600 p-8 text-center text-white">
                    <div class="text-6xl font-bold mb-2">{{ $results['correct_answers'] }}/{{ $results['total_questions'] }}</div>
                    <div class="text-xl mb-4">{{ $results['percentage'] }}% Correct</div>
                    <div class="text-2xl font-bold">Score: {{ $results['score'] }} Points</div>
                </div>

                <div class="p-8">
                    <!-- Badge -->
                    <div class="text-center mb-8">
                        @if($results['badge'] == 'warrior')
                            <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="text-3xl">🏆</span>
                            </div>
                            <h2 class="text-3xl font-bold text-green-600 mb-2">Swadeshi Warrior!</h2>
                        @elseif($results['badge'] == 'good')
                            <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="text-3xl">⭐</span>
                            </div>
                            <h2 class="text-3xl font-bold text-blue-600 mb-2">Good Start!</h2>
                        @else
                            <div class="w-20 h-20 bg-gradient-to-r from-orange-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="text-3xl">💪</span>
                            </div>
                            <h2 class="text-3xl font-bold text-orange-600 mb-2">Keep Learning!</h2>
                        @endif
                        <p class="text-gray-600 text-lg">{{ $results['message'] }}</p>
                    </div>

                    <!-- Detailed Stats -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                        <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-6 text-center border border-green-200">
                            <div class="text-3xl font-bold text-green-600">{{ $results['correct_answers'] }}</div>
                            <div class="text-sm text-green-700">Correct Answers</div>
                        </div>
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 text-center border border-blue-200">
                            <div class="text-3xl font-bold text-blue-600">{{ $results['fast_answers'] }}</div>
                            <div class="text-sm text-blue-700">Fast Answers</div>
                        </div>
                        <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-6 text-center border border-purple-200">
                            <div class="text-3xl font-bold text-purple-600">{{ $results['total_time'] }}s</div>
                            <div class="text-sm text-purple-700">Total Time</div>
                        </div>
                        <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-6 text-center border border-orange-200">
                            <div class="text-3xl font-bold text-orange-600">{{ $results['score'] }}</div>
                            <div class="text-sm text-orange-700">Final Score</div>
                        </div>
                    </div>

                    <!-- Certificate Section (initially hidden) -->
                    <div id="certificateSection" class="hidden">
                        <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg mb-8">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-green-700">
                                        <strong>Thank you for taking the pledge!</strong> Your certificate is now ready to download.
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="{{ route('certificate', ['id' => auth()->id()]) }}" class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-center">
                                📜 Download Certificate
                            </a>
                            <a href="{{ route('leaderboard') }}" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-center">
                                🏆 View Leaderboard
                            </a>
                        </div>
                    </div>

                    <!-- Pledge Section -->
                    <div id="pledgeSection">
                        <div class="bg-white rounded-3xl shadow-2xl border-2 border-amber-200 p-8 mb-8 transform transition-all duration-300 hover:shadow-lg">
                            <div class="text-center">
                                <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-800 mb-4">Take the Swadeshi Pledge</h3>
                                <p class="text-gray-600 mb-6">Join thousands of Indians in supporting our economy</p>
                            </div>
                            
                            <div class="bg-amber-50 border-l-4 border-amber-400 p-6 rounded-lg">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-amber-700">
                                            <strong>Important:</strong> You must take the pledge to unlock your certificate and see where you stand on the leaderboard.
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="mt-6 text-center">
                                    <p class="text-gray-700 font-medium mb-6 italic">
                                        "I pledge to support and promote Indian-made products and contribute to the growth of our nation's economy. I will make a conscious effort to choose Swadeshi products and encourage others to do the same."
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('certificate', ['id' => auth()->id()]) }}" class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-dark px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-center">
                            📜 Get Certificate
                        </a>
                        <a href="{{ route('leaderboard') }}" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-center">
                            🏆 View Leaderboard
                        </a>
                    </div>
                </div>
            </div>
        @endif

        <!-- Try Again -->
        <div class="mt-8 text-center">
            <a href="{{ route('home') }}" class="inline-flex items-center space-x-2 text-gray-600 hover:text-orange-600 font-medium transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span>Back to Home</span>
            </a>
        </div>
    </div>
</div>

<style>
.tricolor-gradient {
    background: linear-gradient(to right, #FF9933 33.33%, #FFFFFF 33.33%, #FFFFFF 66.66%, #138808 66.66%);
}
</style>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const acceptPledgeBtn = document.getElementById('acceptPledge');
        const certificateSection = document.getElementById('certificateSection');
        const pledgeSection = document.getElementById('pledgeSection');
        
        // Check if user has already taken the pledge from localStorage
        const hasPledged = localStorage.getItem('hasPledged');
        
        if (hasPledged) {
            // If already pledged, hide pledge section and show certificate section
            pledgeSection.style.display = 'none';
            certificateSection.classList.remove('hidden');
        }
        
        if (acceptPledgeBtn) {
            acceptPledgeBtn.addEventListener('click', async function() {
                // Disable button to prevent multiple clicks
                acceptPledgeBtn.disabled = true;
                acceptPledgeBtn.innerHTML = 'Processing...';
                
                try {
                    // Send pledge to server
                    const response = await fetch('{{ route("quiz.pledge") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            user_id: '{{ auth()->id() }}'
                        })
                    });
                    
                    const data = await response.json();
                    
                    if (response.ok) {
                        // Hide pledge section with animation
                        pledgeSection.style.opacity = '0';
                        pledgeSection.style.transform = 'translateY(20px)';
                        
                        setTimeout(() => {
                            pledgeSection.style.display = 'none';
                            // Show certificate section
                            certificateSection.classList.remove('hidden');
                            certificateSection.style.opacity = '0';
                            
                            // Animate in certificate section
                            setTimeout(() => {
                                certificateSection.style.opacity = '1';
                                certificateSection.style.transform = 'translateY(0)';
                                // Scroll to certificate section
                                certificateSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                            }, 50);
                            
                        }, 300);
                        
                        // Store in localStorage that user has pledged
                        localStorage.setItem('hasPledged', 'true');
                        
                    } else {
                        throw new Error(data.message || 'Failed to record pledge');
                    }
                } catch (error) {
                    console.error('Error:', error);
                    // Show error message
                    const errorDiv = document.createElement('div');
                    errorDiv.className = 'bg-red-50 border-l-4 border-red-500 p-4 rounded-r mb-6';
                    errorDiv.innerHTML = `
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-red-700">
                                    <strong>Error:</strong> ${error.message || 'Failed to record your pledge. Please try again.'}
                                </p>
                            </div>
                        </div>
                    `;
                    pledgeSection.insertBefore(errorDiv, pledgeSection.firstChild);
                    
                    // Re-enable button
                    acceptPledgeBtn.disabled = false;
                    acceptPledgeBtn.innerHTML = '🙏 I Pledge to Support Swadeshi';
                }
            });
        }
        
        // Add animation on page load
        if (pledgeSection) {
            setTimeout(() => {
                pledgeSection.style.opacity = '1';
                pledgeSection.style.transform = 'translateY(0)';
            }, 100);
        }
    });
</script>
@endpush

@endsection