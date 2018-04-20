<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLucumExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lucum_experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lucum_id')->unsigned();
            $table->foreign('lucum_id')->references('id')->on('users');
            $table->string('post');
            $table->string('company_name');
            $table->text('description');
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
        Schema::dropIfExists('lucum_experiences');
    }
}
