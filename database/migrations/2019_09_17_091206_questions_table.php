<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function(Blueprint $table){
            $table->increments('id')->unsigned();
            $table->unsignedInteger('question_number');
            $table->unsignedInteger('survey_id');
            $table->string('question');
            $table->enum('question_type', ['A', 'B', 'C']);
            $table->boolean('is_email')->nullable()->default(false);
            $table->timestamps();
        });
        Schema::table('questions', function (Blueprint $table) {
            $table->foreign('survey_id')->references('id')->on('surveys')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign(['survey_id']);
        });
    }
}
