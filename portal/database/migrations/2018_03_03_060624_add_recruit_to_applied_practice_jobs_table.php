<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRecruitToAppliedPracticeJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applied_practice_jobs', function (Blueprint $table) {
            $table->tinyInteger('recruit')->nullable()->after('job_title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applied_practice_jobs', function (Blueprint $table) {
            $table->dropColumn(['recruit']);
        });
    }
}
