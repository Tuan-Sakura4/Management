<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('Name');
            $table->boolean('Sex');
            $table->string('Email');
            $table->bigInteger('Phone');
            $table->string('Address');
            $table->datetime('Birth');
            $table->bigInteger('Id_Language')->unsigned();
            $table->foreign('Id_Language')->references('id')->on('languages')->onDelete('cascade');
            $table->bigInteger('Id_Bu')->unsigned();
            $table->foreign('Id_Bu')->references('id')->on('bus')->onDelete('cascade');
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
