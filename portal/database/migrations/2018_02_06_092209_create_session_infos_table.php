<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('doctor');
            $table->tinyInteger('nurse');
            $table->tinyInteger('time');
            $table->tinyInteger('slot');
            $table->tinyInteger('home')->nullable();
            $table->tinyInteger('telephone')->nullable();
            $table->tinyInteger('practice')->nullable();
            $table->string('title');
            $table->text('description');
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('priority')->nullable();
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
        Schema::dropIfExists('session_infos');
    }
}
