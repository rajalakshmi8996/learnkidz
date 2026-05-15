<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ParentQuestionController;
use App\Http\Controllers\KidsQuizController;

Route::get('/', function () {
    return view('home');
});

// Public kids pages - no login needed
Route::get('/puzzle', function () {
    return view('kids.puzzle.index');
})->name('puzzle');

Route::get('/kids-quiz', [KidsQuizController::class, 'index'])->name('kids.quiz');
Route::post('/kids-quiz/submit', [KidsQuizController::class, 'submit'])->name('kids.quiz.submit');

// Dashboard redirects to parent after login
Route::get('/dashboard', function () {
    return redirect('/parent');
})->middleware(['auth', 'verified'])->name('dashboard');

// Parent/admin pages - login needed
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/parent', [PageController::class, 'parent'])->name('parent');

    Route::get('/parent/questions', [ParentQuestionController::class, 'index']);
    Route::get('/parent/questions/create', [ParentQuestionController::class, 'create']);
    Route::post('/parent/questions/store', [ParentQuestionController::class, 'store']);

    Route::get('/parent/questions/{id}/edit', [ParentQuestionController::class, 'edit']);
    Route::put('/parent/questions/{id}', [ParentQuestionController::class, 'update']);
    Route::delete('/parent/questions/{id}', [ParentQuestionController::class, 'destroy']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';