<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->dateTime('Date');
            $table->bigInteger('Id_Teacher')->unsigned();
            $table->foreign('Id_Teacher')->references('Id')->on('teachers')->onDelete('cascade');
            $table->bigInteger('Id_Course')->unsigned();
            $table->foreign('Id_Course')->references('Id')->on('courses')->onDelete('cascade');
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
        Schema::dropIfExists('lessons');
    }
}
