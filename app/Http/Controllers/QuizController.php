<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function start()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        return view('quiz.start');
    }

    public function getQuestions()
    {
        if (!auth()->check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $questions = $this->getQuizQuestions();
        session(['quiz_questions' => $questions, 'quiz_started' => true, 'current_question' => 0]);

        return response()->json($questions);
    }


    public function getQuestion($id)
    {
        $questions = session('quiz_questions', []);
        
        if (isset($questions[$id])) {
            return response()->json($questions[$id]);
        }

        return response()->json(['error' => 'Question not found'], 404);
    }

    public function submitAnswer(Request $request)
    {
        $submittedAnswers = $request->input('answers', []);
        $answers = [];

        foreach ($submittedAnswers as $answer) {
            $answers[$answer['question_id']] = [
                'answer' => (int) $answer['selected_option'],
                'time_taken' => (int) $answer['time_taken'],
                'is_correct' => (bool) $answer['is_correct']
            ];
        }

        session(['quiz_answers' => $answers]);
        return response()->json(['success' => true]);
    }

    public function results()
    {
        $answers = session('quiz_answers', []);
        $questions = session('quiz_questions', []);
        
        if (empty($answers) || empty($questions)) {
            return redirect()->route('quiz.start')->with('error', 'No quiz data found. Please start a new quiz.');
        }

        $score = 0;
        $totalTime = 0;
        $fastAnswers = 0;

        foreach ($answers as $questionId => $answer) {
            if ($answer['is_correct']) {
                $score += 5; // +5 for correct answer
                if ($answer['time_taken'] <= 5) {
                    $score += 2; // +2 for fast answer
                    $fastAnswers++;
                }
            }
            $totalTime += $answer['time_taken'];
        }

        // Ensure we're working with integers for array_sum
        $correctAnswers = array_sum(array_map('intval', array_column($answers, 'is_correct')));
        $totalQuestions = is_countable($questions) ? count($questions) : 0;
        $percentage = $totalQuestions > 0 ? ($correctAnswers / $totalQuestions) * 100 : 0;

        // Determine message based on score
        $message = $this->getResultMessage($correctAnswers);
        $badge = $this->getBadge($correctAnswers);

        $results = [
            'score' => $score,
            'correct_answers' => $correctAnswers,
            'total_questions' => count($questions),
            'percentage' => round($percentage, 1),
            'total_time' => $totalTime,
            'fast_answers' => $fastAnswers,
            'message' => $message,
            'badge' => $badge
        ];

        session(['quiz_results' => $results]);

        return view('quiz.results', compact('results'));
    }

    public function certificate($id)
    {
        // Get the authenticated user
        $user = auth()->user();
        $results = session('quiz_results');
        
        if (!$user || !$results) {
            return redirect()->route('home')->with('error', 'Certificate data not found. Please complete the quiz first.');
        }

        // Create user data array with required fields
        $userData = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email
        ];

        return view('quiz.certificate', compact('userData', 'results'));
    }

    private function getQuizQuestions()
    {
        return [
            [
                'id' => 1,
                'question' => 'Which of these is an Indian product?',
                'options' => [
                    ['id' => 1, 'text' => 'Tata Tea', 'is_correct' => true, 'image' => 'tata-tea.jpg'],
                    ['id' => 2, 'text' => 'Lipton', 'is_correct' => false, 'image' => 'lipton.jpg'],
                    ['id' => 3, 'text' => 'Tetley', 'is_correct' => false, 'image' => 'tetley.jpg'],
                    ['id' => 4, 'text' => 'Brooke Bond', 'is_correct' => false, 'image' => 'brooke-bond.jpg']
                ]
            ],
            [
                'id' => 2,
                'question' => 'Identify the Indian smartphone brand:',
                'options' => [
                    ['id' => 1, 'text' => 'Micromax', 'is_correct' => true, 'image' => 'micromax.jpg'],
                    ['id' => 2, 'text' => 'Samsung', 'is_correct' => false, 'image' => 'samsung.jpg'],
                    ['id' => 3, 'text' => 'Apple', 'is_correct' => false, 'image' => 'apple.jpg'],
                    ['id' => 4, 'text' => 'Xiaomi', 'is_correct' => false, 'image' => 'xiaomi.jpg']
                ]
            ],
            [
                'id' => 3,
                'question' => 'Which is the Indian automobile company?',
                'options' => [
                    ['id' => 1, 'text' => 'Mahindra', 'is_correct' => true, 'image' => 'mahindra.jpg'],
                    ['id' => 2, 'text' => 'Toyota', 'is_correct' => false, 'image' => 'toyota.jpg'],
                    ['id' => 3, 'text' => 'Honda', 'is_correct' => false, 'image' => 'honda.jpg'],
                    ['id' => 4, 'text' => 'Hyundai', 'is_correct' => false, 'image' => 'hyundai.jpg']
                ]
            ]
            // Add more questions as needed
        ];
    }

    private function checkAnswer($questionId, $selectedAnswer)
    {
        $questions = session('quiz_questions', []);
        if (isset($questions[$questionId])) {
            $option = collect($questions[$questionId]['options'])->firstWhere('id', $selectedAnswer);
            return $option['is_correct'] ?? false;
        }
        return false;
    }

    private function getResultMessage($correctAnswers)
    {
        if ($correctAnswers >= 18) {
            return 'Swadeshi Warrior! You are a true champion of Indian products!';
        } elseif ($correctAnswers >= 10) {
            return 'Good Start! Keep learning about Indian products!';
        } else {
            return 'Try Again! Explore more about Indian brands and products!';
        }
    }

    private function getBadge($correctAnswers)
    {
        if ($correctAnswers >= 18) {
            return 'warrior';
        } elseif ($correctAnswers >= 10) {
            return 'good';
        } else {
            return 'beginner';
        }
    }
}