<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('departure_airport_iata_outbound');
            $table->string('arrival_airport_iata_outbound');
            $table->string('departure_airport_outbound');
            $table->string('arrival_airport_outbound');
            $table->string('departure_date_outbound');
            $table->string('arrival_date_outbound');
            $table->string('departure_time_outbound');
            $table->string('arrival_time_outbound');
            $table->string('carrier_iata_outbound');
            $table->string('carrier_outbound');
            $table->string('duration_outbound');
            $table->integer('stops_outbound');
            $table->string('flight_number_outbound');
            $table->string('departure_airport_iata_inbound')->nullable();
            $table->string('arrival_airport_iata_inbound')->nullable();
            $table->string('departure_airport_inbound')->nullable();
            $table->string('arrival_airport_inbound')->nullable();
            $table->string('departure_date_inbound')->nullable();
            $table->string('arrival_date_inbound')->nullable();
            $table->string('departure_time_inbound')->nullable();
            $table->string('arrival_time_inbound')->nullable();
            $table->string('carrier_iata_inbound')->nullable();
            $table->string('carrier_inbound')->nullable();
            $table->string('duration_inbound')->nullable();
            $table->integer('stops_inbound')->nullable();
            $table->string('flight_number_inbound')->nullable();
            $table->unsignedInteger('adults')->default(1);
            $table->unsignedInteger('children')->default(0);
            $table->unsignedInteger('infants')->default(0);
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('price');
            $table->string('currency');
            $table->string('type');
            $table->boolean('status')->default(0);
            $table->string('pdf')->nullable();
            $table->unsignedInteger('user_id')->default(0);
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
        Schema::dropIfExists('tickets');
    }
}
