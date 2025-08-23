@extends('layouts.app')

@section('title', 'Quiz - Swadeshi Abhiyan')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-orange-50 via-white to-green-50" id="quizContainer">
    <!-- Quiz Header -->
    <div class="bg-white shadow-lg border-b border-orange-200 sticky top-16 z-40">
        <div class="max-w-4xl mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="text-right">
                    <div class="text-2xl font-bold text-orange-600" id="questionCounter">1/20</div>
                    <div class="text-sm text-gray-600">Questions</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quiz Content -->
    <div class="max-w-4xl mx-auto px-4 py-8">
        <!-- Loading Screen -->
        <div id="loadingScreen" class="text-center">
            <div class="bg-white rounded-3xl shadow-2xl p-12 border border-orange-100">
                <div class="w-20 h-20 tricolor-gradient rounded-full flex items-center justify-center mx-auto mb-6 animate-spin">
                    <span class="text-gray-800 font-bold text-2xl">SA</span>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Preparing Your Quiz...</h2>
                <p class="text-gray-600 mb-6">Loading 20 questions about Indian products</p>
                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div class="bg-gradient-to-r from-orange-500 to-red-600 h-3 rounded-full animate-pulse" style="width: 100%"></div>
                </div>
            </div>
        </div>

        <!-- Quiz Question -->
        <div id="quizQuestion" class="hidden">
            <div class="bg-white rounded-3xl shadow-2xl border border-orange-100 overflow-hidden">
                <!-- Timer and Progress -->
                <div class="bg-gradient-to-r from-orange-500 to-red-600 p-6">
                    <div class="flex items-center justify-between text-white">
                        <div>
                            <h2 class="text-xl font-bold">Question <span id="currentQuestion">1</span></h2>
                            <p class="text-orange-100">Choose the Indian product</p>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold" id="timer">10</div>
                            <div class="text-sm text-orange-100">seconds</div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="w-full bg-white/30 rounded-full h-2">
                            <div class="bg-white h-2 rounded-full transition-all duration-1000" id="timerBar" style="width: 100%"></div>
                        </div>
                    </div>
                </div>

                <!-- Question Content -->
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-8 text-center" id="questionText">
                        Which of these is an Indian product?
                    </h3>

                    <!-- Answer Options -->
                    <div class="grid grid-cols-2 gap-6" id="answerOptions">
                        <!-- Options will be loaded dynamically -->
                    </div>
                </div>
            </div>

            <!-- Quiz Instructions -->
            <div class="mt-8 bg-gradient-to-r from-orange-50 to-green-50 rounded-2xl p-6 border border-orange-200">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow-md">
                        <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Quiz Instructions</h4>
                        <p class="text-sm text-gray-600">You have 10 seconds per question. Choose the Indian product from the 4 options. No going back once answered!</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quiz Completed -->
        <div id="quizCompleted" class="hidden text-center">
            <div class="bg-white rounded-3xl shadow-2xl p-12 border border-green-100">
                <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Quiz Completed!</h2>
                <p class="text-gray-600 mb-8">Calculating your results...</p>
                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div class="bg-gradient-to-r from-green-500 to-green-600 h-3 rounded-full animate-pulse" style="width: 100%"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.tricolor-gradient {
    background: linear-gradient(to right, #FF9933 33.33%, #FFFFFF 33.33%, #FFFFFF 66.66%, #138808 66.66%);
}

.option-card {
    transition: all 0.3s ease;
}

.option-card:hover {
    transform: scale(1.02);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.option-selected {
    border-color: #10B981 !important;
    background: linear-gradient(to br, #D1FAE5, #A7F3D0) !important;
}

.option-correct {
    border-color: #10B981 !important;
    background: linear-gradient(to br, #D1FAE5, #A7F3D0) !important;
}

.option-incorrect {
    border-color: #EF4444 !important;
    background: linear-gradient(to br, #FEE2E2, #FECACA) !important;
}
</style>

<script>
$(document).ready(function() {
    let currentQuestionIndex = 0;
    let questions = [];
    let answers = [];
    let timer;
    let timeLeft = 10;

    // Initialize quiz
    function initializeQuiz() {
        // Show loading screen
        $('#loadingScreen').removeClass('hidden');
        $('#quizQuestion').addClass('hidden');
        
        // Get questions from the server
        fetch('{{ route('api.quiz.questions') }}')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to load questions');
                }
                return response.json();
            })
            .then(data => {
                questions = data;
                if (questions.length === 0) {
                    throw new Error('No questions available');
                }
                
                // Hide loading screen and show first question
                $('#loadingScreen').addClass('hidden');
                $('#quizQuestion').removeClass('hidden');
                loadQuestion(0);
                startTimer();
            })
            .catch(error => {
                console.error('Error:', error);
                $('#loadingScreen').html(`
                    <div class="bg-white rounded-3xl shadow-2xl p-12 border border-red-100">
                        <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">Error Loading Quiz</h2>
                        <p class="text-gray-600 mb-6">${error.message || 'Failed to load questions. Please try again.'}</p>
                        <a href="{{ route('home') }}" class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-3 rounded-lg transition-colors">
                            Return to Home
                        </a>
                    </div>
                `);
            });
    }
    
    // Start the quiz
    initializeQuiz();

    function loadQuestion(index) {
        if (index >= questions.length) {
            completeQuiz();
            return;
        }

        const question = questions[index];
        $('#currentQuestion').text(index + 1);
        $('#questionCounter').text((index + 1) + '/20');
        $('#questionText').text(question.question);

        let optionsHtml = '';
        question.options.forEach((option, optionIndex) => {
            optionsHtml += `
                <div class="option-card bg-gray-50 rounded-2xl p-6 border-2 border-gray-200 cursor-pointer hover:border-orange-400 transition-all duration-300" 
                     data-option="${optionIndex}" data-is-indian="${option.is_indian}">
                    <div class="w-full h-32 bg-gray-200 rounded-xl mb-4 flex items-center justify-center">
                        <span class="text-gray-700 font-bold text-lg">${option.text}</span>
                    </div>
                    <p class="text-center font-semibold text-gray-800">Option ${String.fromCharCode(65 + optionIndex)}</p>
                </div>
            `;
        });
        
        $('#answerOptions').html(optionsHtml);

        // Add click handlers
        $('.option-card').click(function() {
            if ($(this).hasClass('option-selected')) return;
            
            const selectedOption = $(this).data('option');
            const isCorrect = $(this).data('is-indian');
            
            selectAnswer(selectedOption, isCorrect);
        });
    }

    function startTimer() {
        timeLeft = 10;
        $('#timer').text(timeLeft);
        $('#timerBar').css('width', '100%');
        
        timer = setInterval(function() {
            timeLeft--;
            $('#timer').text(timeLeft);
            $('#timerBar').css('width', (timeLeft / 10 * 100) + '%');
            
            if (timeLeft <= 0) {
                clearInterval(timer);
                selectAnswer(-1, false); // Time up
            }
        }, 1000);
    }

    function selectAnswer(selectedOption, isCorrect) {
        clearInterval(timer);
        
        // Record answer with explicit type conversion
        answers.push({
            question_id: parseInt(currentQuestionIndex),
            selected_option: parseInt(selectedOption),
            is_correct: Boolean(isCorrect),
            time_taken: parseInt(10 - timeLeft)
        });

        // Show correct answer
        $('.option-card').each(function() {
            const isIndian = $(this).data('is-indian');
            if (isIndian) {
                $(this).addClass('option-correct');
            } else if ($(this).data('option') === selectedOption) {
                $(this).addClass('option-incorrect');
            }
        });

        // Move to next question after 2 seconds
        setTimeout(function() {
            currentQuestionIndex++;
            loadQuestion(currentQuestionIndex);
            startTimer();
        }, 2000);
    }

    function completeQuiz() {
        $('#quizQuestion').addClass('hidden');
        $('#quizCompleted').removeClass('hidden');
        
        // Submit quiz answers to the server
        fetch('{{ route("quiz.answer") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                answers: answers
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to submit quiz answers');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Redirect to results page after successful submission
                window.location.href = '{{ route("quiz.results") }}';
            } else {
                throw new Error(data.message || 'Failed to process quiz results');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while submitting your quiz. Please try again.');
            window.location.href = '{{ route("home") }}';
        });
    }
});
</script>
@endsection