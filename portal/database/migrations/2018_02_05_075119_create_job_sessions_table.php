<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('practice_id')->unsigned();
            $table->foreign('practice_id')->references('id')->on('practice_forms');
            $table->date('start_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->tinyInteger('unpaid_break_hr')->nullable();
            $table->tinyInteger('unpaid_break_min')->nullable();
            $table->float('hourly_rate', 8, 2);
            $table->integer('saturday')->nullable();
            $table->integer('sunday')->nullable();
            $table->integer('monday')->nullable();
            $table->integer('tuesday')->nullable();
            $table->integer('wednesday')->nullable();
            $table->integer('thursday')->nullable();
            $table->integer('friday')->nullable();
            $table->date('repeat_date')->nullable();
            $table->tinyInteger('number_of_session')->nullable();
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
        Schema::dropIfExists('job_sessions');
    }
}
