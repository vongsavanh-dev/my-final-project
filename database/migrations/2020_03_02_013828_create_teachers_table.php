<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('t_id');
            $table->string('name');
            $table->string('surname');
            $table->string('gender');
            $table->integer('phone');
            $table->string('email');
            $table->string('village');
            $table->string('district');
            $table->string('province');
            $table->text('education');
            $table->string('image');
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
        Schema::dropIfExists('teachers');
    }
}
