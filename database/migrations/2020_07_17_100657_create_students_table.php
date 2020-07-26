<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('st_id');
            $table->string('st_gender');
            $table->string('st_name');
            $table->string('st_surname');
            $table->integer('st_phone');
            $table->string('st_village');
            $table->string('st_city');
            $table->string('st_province');
            $table->string('st_dob');
            $table->string('st_religion');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('father_phone');
            $table->string('mother_phone');
            $table->string('father_job')->nullable();
            $table->string('mother_job')->nullable();
            $table->string('family_village')->nullable();
            $table->string('family_city')->nullable();
            $table->string('family_province')->nullable();
            $table->integer('major_id');
            $table->integer('session_id');
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
        Schema::dropIfExists('students');
    }
}
