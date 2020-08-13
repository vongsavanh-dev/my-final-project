<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('class');
            $table->string('garde');
            $table->integer('student_id')->unsigned()->nullable();
            $table->integer('teacher_id')->unsigned()->nullable();
            $table->integer('session_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
}
