<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Result;

class KidsQuizController extends Controller
{
    public function index()
    {
        $questions = Question::latest()->take(10)->get();

        return view('kids.quiz', compact('questions'));
    }

    public function submit(Request $request)
    {
        $answers = $request->input('answers', []);

        $questions = Question::whereIn('id', array_keys($answers))->get();

        $score = 0;

        foreach ($questions as $question) {
            if (($answers[$question->id] ?? null) === $question->correct_answer) {
                $score++;
            }
        }

        Result::create([
            'score' => $score,
            'total' => $questions->count(),
        ]);

        return view('kids.result', [
            'score' => $score,
            'total' => $questions->count()
        ]);
    }
}