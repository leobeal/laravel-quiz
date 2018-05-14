<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Model
    |--------------------------------------------------------------------------
    |
    | This is the Quiz model. You are free to use as it is or create a
    | new model which extends from Quiz::class
    |
    */
    'model' => \Leobeal\LaravelQuiz\Quiz::class,

    /*
    |--------------------------------------------------------------------------
    | Quizzable Model
    |--------------------------------------------------------------------------
    |
    | The model which owns the quizzes. You need to set this before using
    | this package
    |
    */
    'quizzable_model' => \App\Topic::class,

    /*
    |--------------------------------------------------------------------------
    | Quizzable Table
    |--------------------------------------------------------------------------
    |
    | The table used by the model. This info needs to be set because
    | we want to create a foreign key to reference the table.
    | If you already ran the migrations, run migrate:rollback
    | before changing this setting
    |
    */
    'quizzable_table' => 'topics',

    /*
    |--------------------------------------------------------------------------
    | Quizzable FK
    |--------------------------------------------------------------------------
    |
    | The foreign key referencing or the `quizzable_table`
    | If you already ran the migrations, run migrate:rollback
    | before changing this setting
    |
    */
    'quizzable_fk' => 'topic_id',
];
