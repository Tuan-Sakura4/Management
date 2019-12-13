<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('date');
            $table->bigInteger('Point');
            $table->bigInteger('Id_Course')->unsigned();
            $table->foreign('Id_Course')->references('id')->on('courses')->onDelete('cascade');
            $table->bigInteger('Id_Student')->unsigned();
<<<<<<< HEAD
            $table->foreign('Id_Student')->references('id')->on('students')->onDelete('cascade');
=======
            $table->foreign('Id_Student')->references('id')->on('Students')->onDelete('cascade');
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
        Schema::dropIfExists('tests');
    }
}
