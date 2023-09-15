<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'gender', 
        'birthday', 
        'nationality',
        'passport_id',
        'passport_expiry_date',
        'ticket_id'
    ];

    public function ticket() {
        return $this->belongsTo('App\Ticket');
    }
}
