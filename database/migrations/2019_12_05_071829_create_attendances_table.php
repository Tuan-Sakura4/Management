<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('Id_Lesson')->unsigned();
            $table->foreign('Id_Lesson')->references('id')->on('lessons')->onDelete('cascade');
            $table->bigInteger('Id_Student')->unsigned();
<<<<<<< HEAD
            $table->foreign('Id_Student')->references('id')->on('students')->onDelete('cascade');
=======
            $table->foreign('Id_Student')->references('id')->on('courses')->onDelete('cascade');
>>>>>>> 6875fc4654c3199aecfcec67d05d5b70e543e601
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
        Schema::dropIfExists('attendances');
    }
}
