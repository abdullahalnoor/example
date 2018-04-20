<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationTwosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_twos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formStepOneId');
            $table->string('password');
            $table->integer('gmc_Number');
            $table->string('address_one');
            $table->string('address_two');
            $table->string('city');
            $table->integer('postcode');
            $table->integer('phone_number');
            $table->integer('reference_phone_number');
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
        Schema::dropIfExists('registration_twos');
    }
}
