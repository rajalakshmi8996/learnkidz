<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ParentQuestionController;
use App\Http\Controllers\KidsQuizController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
});


/*
|--------------------------------------------------------------------------
| KIDS PUZZLES
|--------------------------------------------------------------------------
*/

Route::get('/kids/puzzles', function () {
    return view('kids.puzzle.index');
});

Route::get('/kids/counting', function () {
    return view('kids.puzzle.counting');
});

Route::get('/kids/find-difference', function () {
    return view('kids.puzzle.find-difference');
});

Route::get('/kids/shapes', function () {
    return view('kids.puzzle.shapes');
});


/*
|--------------------------------------------------------------------------
| KIDS QUIZ
|--------------------------------------------------------------------------
*/

Route::get('/kids-quiz', [KidsQuizController::class, 'index'])
    ->name('kids.quiz');

Route::post('/kids-quiz/submit', [KidsQuizController::class, 'submit'])
    ->name('kids.quiz.submit');


/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return redirect('/parent');
})->middleware(['auth', 'verified'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| PARENT / ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/parent', [PageController::class, 'parent'])
        ->name('parent');

    Route::get('/parent/questions', [ParentQuestionController::class, 'index']);

    Route::get('/parent/questions/create', [ParentQuestionController::class, 'create']);

    Route::post('/parent/questions/store', [ParentQuestionController::class, 'store'])
        ->name('parent.questions.store');

    Route::put('/parent/questions/{id}', [ParentQuestionController::class, 'update']);

    Route::delete('/parent/questions/{id}', [ParentQuestionController::class, 'destroy']);

});


/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});
Route::post('/kids/counting/check', function () {
    $answers = request('answers', []);
    $correct = request('correct', []);

    $score = 0;

    foreach ($correct as $index => $rightAnswer) {
        if (isset($answers[$index]) && $answers[$index] == $rightAnswer) {
            $score++;
        }
    }

    return back()->with('result', "You scored $score out of " . count($correct));
});
Route::post('/kids/find-difference/check', function () {
    $answers = request('answers', []);

    $correctAnswers = [
        0 => '🍌',
        1 => '🐱',
        2 => '🚌',
        3 => '🌙',
        4 => '🏀',
    ];

    $score = 0;

    foreach ($correctAnswers as $index => $correct) {
        if (isset($answers[$index]) && $answers[$index] == $correct) {
            $score++;
        }
    }

    return back()->with('result', "🎉 You scored $score out of " . count($correctAnswers));
});

Route::post('/kids/shapes/check', function () {

    $answers = request('answers', []);
    $correct = request('correct', []);

    $score = 0;

    foreach ($correct as $index => $rightAnswer) {

        if (
            isset($answers[$index]) &&
            $answers[$index] == $rightAnswer
        ) {
            $score++;
        }
    }

    return back()->with(
        'result',
        "🎉 You scored $score out of " . count($correct)
    );
});
/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';