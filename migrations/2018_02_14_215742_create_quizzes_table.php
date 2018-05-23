<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer(config('quiz.quizzable_fk'))->unsigned();
            $table->integer('max_number_questions');
            $table->integer('min_score');
            $table->boolean('visible')->default(true);
            $table->timestamps();
            $table->foreign(config('quiz.quizzable_fk'))->references('id')->on(config('quiz.quizzable_table'));
        });

        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question');
            $table->string('type', 2);
            $table->integer('quiz_id')->unsigned();
            $table->boolean('visible')->default(true);
            $table->timestamps();
            $table->foreign('quiz_id')->references('id')->on('quizzes');
        });

        Schema::create('question_options', function (Blueprint $table) {
            $table->increments('id');
            $table->string('option');
            $table->boolean('correct');
            $table->integer('question_id')->unsigned();
            $table->timestamps();
            $table->foreign('question_id')->references('id')->on('questions');
        });

        Schema::create('quiz_attempts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alternative');
            $table->integer('quiz_id')->unsigned();
            $table->integer('attempt')->unsigned();
            $table->integer('score');
            $table->boolean('visible')->default(true);
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->foreign('quiz_id')->references('id')->on('quizzes');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('question_user_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alternative');
            $table->integer('question_id')->unsigned();
            $table->integer('answer_id')->unsigned();
            $table->integer('quiz_attempt_id')->unsigned();
            $table->timestamps();
            $table->foreign('question_id')->references('id')->on('questions');
            $table->foreign('answer_id')->references('id')->on('question_options');
            $table->foreign('quiz_attempt_id')->references('id')->on('quiz_attempts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('question_user_answers', function (Blueprint $table) {
            $table->dropForeign(['question_id']);
            $table->dropForeign(['answer_id']);
            $table->dropForeign(['quiz_attempt_id']);
        });
        Schema::dropIfExists('question_user_answers');

        Schema::table('quiz_attempts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['quiz_id']);
        });
        Schema::dropIfExists('quiz_attempts');

        Schema::table('question_options', function (Blueprint $table) {
            $table->dropForeign(['question_id']);
        });
        Schema::dropIfExists('question_options');

        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign(['quiz_id']);
        });
        Schema::dropIfExists('questions');

        Schema::table('quizzes', function (Blueprint $table) {
            $table->dropForeign([config('quiz.quizzable_fk')]);
        });
        Schema::dropIfExists('quizzes');
    }
}
