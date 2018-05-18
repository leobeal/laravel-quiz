<?php

namespace Leobeal\LaravelQuiz;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quiz extends Model
{
    protected $guarded = ['id'];

    public function quizzable()
    {
        return $this->belongsTo(config('quiz.quizzable_model'), config('quiz.quizzable_fk'));
    }

    public function questions(): ?HasMany
    {
        return $this->hasMany(Question::class);
    }
}
