<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('register_id');
            $table->string('register_gender');
            $table->string('register_name');
            $table->string('register_surname');
            $table->integer('register_phone');
            $table->string('register_village');
            $table->string('register_city');
            $table->string('register_province');
            $table->string('register_dob');
            $table->string('register_religion');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('father_phone');
            $table->string('mother_phone');
            $table->integer('major_id');
            $table->integer('session_id');
            $table->integer('status_id')->default();
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
        Schema::dropIfExists('registers');
    }
}
