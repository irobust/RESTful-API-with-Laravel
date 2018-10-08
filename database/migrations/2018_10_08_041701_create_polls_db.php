<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePollsDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 200);
            $table->timestamps();
        });
 
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 200);
            $table->mediumText('question');
            $table->unsignedInteger('poll_id');
            $table->timestamps();
        });
 
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('answer');
            $table->unsignedInteger('question_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExist('polls');
        Schema::dropIfExist('questions');
        Schema::dropIfExist('answers');
    }
}
