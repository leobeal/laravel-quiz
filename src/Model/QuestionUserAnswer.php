<?php

namespace Leobeal\LaravelQuiz;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuestionUserAnswer extends Model
{
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function attempt(): BelongsTo
    {
        return $this->belongsTo(QuizAttempt::class);
    }

    public function answer(): BelongsTo
    {
        return $this->belongsTo(QuestionOption::class);
    }
}
