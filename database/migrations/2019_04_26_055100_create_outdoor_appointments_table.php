<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutdoorAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outdoor_appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patient_name');
            $table->string('age');
            $table->string('gender');
            $table->string('phone');
            $table->text('address');
            $table->unsignedInteger('purpose_id');
            $table->unsignedInteger('doctor_id');
            $table->string('appointment_date');
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
        Schema::dropIfExists('outdoor_appointments');
    }
}
