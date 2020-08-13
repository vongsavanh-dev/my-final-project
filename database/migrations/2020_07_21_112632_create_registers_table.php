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
            $table->string('reg_id');
            $table->integer('st_id')->unsigned();
            $table->integer('major_id')->unsigned();
            $table->integer('academic_id')->unsigned();
            $table->integer('classroom_id')->unsigned()->nullable();
            $table->enum('session_name', ['ພາກເຊົ້າ', 'ພາກບ່າຍ', 'ພາກຄ່ຳ'])->default('ພາກເຊົ້າ');
            $table->enum('year_name', ['ປີ1', 'ປີ2', 'ປີ3'])->default('ປີ1');
            $table->enum('reg_status', ['Success', 'Wait'])->default('Wait');
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
