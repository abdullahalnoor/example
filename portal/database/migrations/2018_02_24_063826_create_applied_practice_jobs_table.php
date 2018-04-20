<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppliedPracticeJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applied_practice_jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_id')->unsigned()->index();
            $table->integer('applicant_id')->unsigned()->index();
            $table->string('applicant_name');
            $table->string('job_title');
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
        Schema::dropIfExists('applied_practice_jobs');
    }
}
