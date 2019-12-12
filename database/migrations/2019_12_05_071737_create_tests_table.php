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
            $table->date('Date');
            $table->bigInteger('Point');
            $table->bigInteger('Id_Course')->unsigned();
            $table->foreign('Id_Course')->references('Id')->on('courses')->onDelete('cascade');
            $table->bigInteger('Id_Student')->unsigned();
            $table->foreign('Id_Student')->references('Id')->on('students')->onDelete('cascade');
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
