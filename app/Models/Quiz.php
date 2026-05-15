<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'title',
        'category_id',
        'question_limit',
        'time_limit',
        'is_active'
    ];

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'quiz_questions');
    }
}