<?php

namespace Leobeal\LaravelQuiz\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;

Trait Quizzable
{
    public function quizzes(): HasMany
    {
        return $this->hasMany(config('quiz.model'), config('quiz.quizzable_fk'));
    }
}
