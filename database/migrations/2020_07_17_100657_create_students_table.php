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
            $table->enum('st_gender', ['ທ້າວ', 'ນາງ', 'ພຣະ'])->default('ທ້າວ');
            $table->string('st_name');
            $table->string('st_surname');
            $table->integer('st_tel');
            $table->string('st_village');
            $table->string('st_dob');
            $table->string('religion');
            $table->string('parent_name');
            $table->string('parent_tel');
            $table->integer('district_id')->unsigned();
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
