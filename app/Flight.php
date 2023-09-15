<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'departure_airport_iata',
        'arrival_airport_iata',
        'departure_airport',
        'arrival_airport',
        'departure_date',
        'arrival_date',
        'departure_time',
        'arrival_time',
        'carrier_iata',
        'carrier',
        'duration',
        'flight_number',
        'type',
        'ticket_id'
    ];

    public function ticket() {
        return $this->belongsTo('App\Ticket');
    }

}
