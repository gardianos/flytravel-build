<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'departure_airport_iata_outbound',
        'arrival_airport_iata_outbound',
        'departure_airport_outbound',
        'arrival_airport_outbound',
        'departure_date_outbound',
        'arrival_date_outbound',
        'departure_time_outbound',
        'arrival_time_outbound',
        'carrier_iata_outbound',
        'carrier_outbound',
        'duration_outbound',
        'stops_outbound',
        'flight_number_outbound',
        'departure_airport_iata_inbound',
        'arrival_airport_iata_inbound',
        'departure_airport_inbound',
        'arrival_airport_inbound',
        'departure_date_inbound',
        'arrival_date_inbound',
        'departure_time_inbound',
        'arrival_time_inbound',
        'carrier_iata_inbound',
        'carrier_inbound',
        'duration_inbound',
        'stops_inbound',
        'flight_number_inbound',
        'adults',
        'children',
        'infants',
        'price',
        'currency',
        'type',
        'status',
        'user_id',
        'name',
        'phone',
        'email'
    ];

    public function flights() {
        return $this->hasMany('App\Flight');
    }

    public function passengers() {
        return $this->hasMany('App\Passenger');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

}
