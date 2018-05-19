<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('template');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('address');
            $table->string('country');
            $table->string('zipCode');
            $table->string('phone');
            $table->string('email');
            $table->string('summary');
            $table->string('skill');
            $table->string('level');
            $table->string('companyName');
            $table->string('jobTitle');
            $table->string('location');
            $table->string('fromMonth');
            $table->string('fromYear');
            $table->string('toMonth');
            $table->string('toYear');
            $table->string('degree');
            $table->string('school');
            $table->string('educationLocation');
            $table->string('gradYear');
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resumes');
    }
}
