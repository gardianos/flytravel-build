<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id');
            $table->string('departure_airport_iata');
            $table->string('arrival_airport_iata');
            $table->string('departure_airport');
            $table->string('arrival_airport');
            $table->string('departure_date');
            $table->string('arrival_date');
            $table->string('departure_time');
            $table->string('arrival_time');
            $table->string('carrier_iata');
            $table->string('carrier');
            $table->string('duration');
            $table->string('flight_number');
            $table->string('type');
            $table->unsignedInteger('ticket_id');
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
        Schema::dropIfExists('flights');
    }
}
