<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_answer',
        'image',
    ];
public function quizzes()
{
    return $this->belongsToMany(Quiz::class, 'quiz_questions');
}
    }
