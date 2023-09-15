<?php

namespace App\Http\Controllers\Api;

use PDF;
use App\User;
use App\Flight;
use App\Ticket;
use App\Passenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{

    public function index() {
        $tickets = Ticket::where('status', 1)->with(['flights', 'passengers'])->get();
        return response()->json($tickets);
    }

    public function show($id) {
        $ticket = Ticket::find($id);
        $ticket->load('flights', 'passengers');
        return response()->json($ticket);
    }

    public function approve($id) {
        $ticket = Ticket::find($id);
        $ticket->status = 1;
        $ticket->save();

        $outbound_flights = $ticket->flights()->where('type', 'outbound')->get();
        $inbound_flights = $ticket->flights()->where('type', 'inbound')->get();
        $passengers = $ticket->passengers()->get();

        $ticket->outbound_flights = $outbound_flights;
        $ticket->inbound_flights = $inbound_flights;
        $ticket->passengers = $passengers;

        $user = User::find($ticket->user_id);
        view()->share(['ticket' => $ticket]);
        $time = time();
        $path = 'storage/pdf/' . $time . '.pdf';
        $name = $time . '.pdf';
        $pdf = PDF::loadView('pdf');
        $pdf->save(storage_path('app/public/' . $time . '.pdf'));

        Mail::send('ticket_email', ['name' => 'Your ticket'], function ($message) use ($time, $ticket) {
            $message->from('noreply@flyskytravel.net', 'Fly Travel');
            $message->to($ticket->email);
            $message->attach(storage_path('app/public/'.$time.'.pdf'));
            $message->subject("Hello from Flytravel");
        });

        Mail::send('ticket_email', ['name' => 'Ticket'], function ($message) use ($time) {
            $message->from('noreply@flyskytravel.net', 'Fly Travel');
            $message->to('blendpajaziti.7@gmail.com');
            $message->attach(storage_path('app/public/'.$time.'.pdf'));
            $message->subject("Ticket purchased");
        });

        return response()->json($ticket);
    }

    public function user($id) {
        $ticket = Ticket::where('user_id', $id)->where('status', 1)->orderBy('created_at', 'desc')->with(['flights', 'passengers'])->get();
        return response()->json($ticket);
    }

    public function store(Request $request) {

        $ticket = json_decode($request->ticket, true);
        $passengers = json_decode($request->passengers, true);

        Log::debug($ticket);
        Log::debug($passengers);
        Log::debug($request);

        $db_ticket = new Ticket;
        if(array_key_exists('outbound', $ticket)) {
            if(is_array($ticket['outbound'])) {
                $db_ticket->departure_airport_iata_outbound = $ticket['outbound'][0]['departure_airport_iata'];
                $db_ticket->arrival_airport_iata_outbound = $ticket['outbound'][0]['arrival_airport_iata'];
                $db_ticket->departure_airport_outbound = $ticket['outbound'][0]['departure_airport'];
                $db_ticket->arrival_airport_outbound = $ticket['outbound'][0]['arrival_airport'];
                $db_ticket->departure_date_outbound = $ticket['outbound'][0]['departure_date'];
                $db_ticket->arrival_date_outbound = $ticket['outbound'][0]['arrival_date'];
                $db_ticket->departure_time_outbound = $ticket['outbound'][0]['departure_time'];
                $db_ticket->arrival_time_outbound = $ticket['outbound'][0]['arrival_time'];
                $db_ticket->carrier_iata_outbound = $ticket['outbound'][0]['carrier_iata'];
                $db_ticket->carrier_outbound = $ticket['outbound'][0]['carrier'];
                $db_ticket->duration_outbound = $ticket['outbound'][0]['duration'];
                $db_ticket->stops_outbound = $ticket['outbound'][0]['stops'];
                $db_ticket->flight_number_outbound = $ticket['outbound'][0]['flight_number'];
                $db_ticket->departure_airport_iata_inbound = $ticket['inbound'][0]['departure_airport_iata'];
                $db_ticket->arrival_airport_iata_inbound = $ticket['inbound'][0]['arrival_airport_iata'];
                $db_ticket->departure_airport_inbound = $ticket['inbound'][0]['departure_airport'];
                $db_ticket->arrival_airport_inbound = $ticket['inbound'][0]['arrival_airport'];
                $db_ticket->departure_date_inbound = $ticket['inbound'][0]['departure_date'];
                $db_ticket->arrival_date_inbound = $ticket['inbound'][0]['arrival_date'];
                $db_ticket->departure_time_inbound = $ticket['inbound'][0]['departure_time'];
                $db_ticket->arrival_time_inbound = $ticket['inbound'][0]['arrival_time'];
                $db_ticket->carrier_iata_inbound = $ticket['inbound'][0]['carrier_iata'];
                $db_ticket->carrier_inbound = $ticket['inbound'][0]['carrier'];
                $db_ticket->duration_inbound = $ticket['inbound'][0]['duration'];
                $db_ticket->stops_inbound = $ticket['inbound'][0]['stops'];
                $db_ticket->flight_number_inbound = $ticket['inbound'][0]['flight_number'];
            } else {
                $db_ticket->departure_airport_iata_outbound = $ticket['outbound']['departure_airport_iata'];
                $db_ticket->arrival_airport_iata_outbound = $ticket['outbound']['arrival_airport_iata'];
                $db_ticket->departure_airport_outbound = $ticket['outbound']['departure_airport'];
                $db_ticket->arrival_airport_outbound = $ticket['outbound']['arrival_airport'];
                $db_ticket->departure_date_outbound = $ticket['outbound']['departure_date'];
                $db_ticket->arrival_date_outbound = $ticket['outbound']['arrival_date'];
                $db_ticket->departure_time_outbound = $ticket['outbound']['departure_time'];
                $db_ticket->arrival_time_outbound = $ticket['outbound']['arrival_time'];
                $db_ticket->carrier_iata_outbound = $ticket['outbound']['carrier_iata'];
                $db_ticket->carrier_outbound = $ticket['outbound']['carrier'];
                $db_ticket->duration_outbound = $ticket['outbound']['duration'];
                $db_ticket->stops_outbound = $ticket['outbound']['stops'];
                $db_ticket->flight_number_outbound = $ticket['outbound']['flight_number'];
                $db_ticket->departure_airport_iata_inbound = $ticket['inbound']['departure_airport_iata'];
                $db_ticket->arrival_airport_iata_inbound = $ticket['inbound']['arrival_airport_iata'];
                $db_ticket->departure_airport_inbound = $ticket['inbound']['departure_airport'];
                $db_ticket->arrival_airport_inbound = $ticket['inbound']['arrival_airport'];
                $db_ticket->departure_date_inbound = $ticket['inbound']['departure_date'];
                $db_ticket->arrival_date_inbound = $ticket['inbound']['arrival_date'];
                $db_ticket->departure_time_inbound = $ticket['inbound']['departure_time'];
                $db_ticket->arrival_time_inbound = $ticket['inbound']['arrival_time'];
                $db_ticket->carrier_iata_inbound = $ticket['inbound']['carrier_iata'];
                $db_ticket->carrier_inbound = $ticket['inbound']['carrier'];
                $db_ticket->duration_inbound = $ticket['inbound']['duration'];
                $db_ticket->stops_inbound = $ticket['inbound']['stops'];
                $db_ticket->flight_number_inbound = $ticket['inbound']['flight_number'];
            }
            
        } else {
            $db_ticket->departure_airport_iata_outbound = $ticket['departure_airport_iata'];
            $db_ticket->arrival_airport_iata_outbound = $ticket['arrival_airport_iata'];
            $db_ticket->departure_airport_outbound = $ticket['departure_airport'];
            $db_ticket->arrival_airport_outbound = $ticket['arrival_airport'];
            $db_ticket->departure_date_outbound = $ticket['departure_date'];
            $db_ticket->arrival_date_outbound = $ticket['arrival_date'];
            $db_ticket->departure_time_outbound = $ticket['departure_time'];
            $db_ticket->arrival_time_outbound = $ticket['arrival_time'];
            $db_ticket->carrier_iata_outbound = $ticket['carrier_iata'];
            $db_ticket->carrier_outbound = $ticket['carrier'];
            $db_ticket->duration_outbound = $ticket['duration'];
            $db_ticket->stops_outbound = $ticket['stops'];
            $db_ticket->flight_number_outbound = $ticket['flight_number'];
        }
        $db_ticket->name = $request->name;
        $db_ticket->email = $request->email;
        $db_ticket->phone = $request->phone;
        $db_ticket->adults = $request->adults;
        $db_ticket->children = $request->children;
        $db_ticket->infants = $request->infants;
        $db_ticket->price = $ticket['price'];
        $db_ticket->currency = $request->currency;
        $db_ticket->type = $request->type;
        $db_ticket->status = 0;
        $db_ticket->user_id = $request->user_id;
        $db_ticket->save();
        if(array_key_exists('outbound', $ticket)) {
            if(is_array($ticket['outbound'])) {
                foreach($ticket['outbound'][0]['flights']['values'] as $flight) {
                    $db_flight = new Flight;
                    $db_flight->departure_airport_iata = $flight['nameValuePairs']['departure_airport_iata'];
                    $db_flight->arrival_airport_iata = $flight['nameValuePairs']['arrival_airport_iata'];
                    $db_flight->departure_airport = $flight['nameValuePairs']['departure_airport'];
                    $db_flight->arrival_airport = $flight['nameValuePairs']['arrival_airport'];
                    $db_flight->departure_date = $flight['nameValuePairs']['departure_date'];
                    $db_flight->arrival_date = $flight['nameValuePairs']['arrival_date'];
                    $db_flight->departure_time = $flight['nameValuePairs']['departure_time'];
                    $db_flight->arrival_time = $flight['nameValuePairs']['arrival_time'];
                    $db_flight->carrier_iata = $flight['nameValuePairs']['carrier_iata'];
                    $db_flight->carrier = $flight['nameValuePairs']['carrier'];
                    $db_flight->duration = $flight['nameValuePairs']['duration'];
                    $db_flight->flight_number = $flight['nameValuePairs']['flight_number'];
                    $db_flight->type = 'outbound';
                    $db_flight->ticket_id = $db_ticket->id;
                    $db_flight->save();
                }
                foreach($ticket['inbound'][0]['flights']['values'] as $flight) {
                    $db_flight = new Flight;
                    $db_flight->departure_airport_iata = $flight['nameValuePairs']['departure_airport_iata'];
                    $db_flight->arrival_airport_iata = $flight['nameValuePairs']['arrival_airport_iata'];
                    $db_flight->departure_airport = $flight['nameValuePairs']['departure_airport'];
                    $db_flight->arrival_airport = $flight['nameValuePairs']['arrival_airport'];
                    $db_flight->departure_date = $flight['nameValuePairs']['departure_date'];
                    $db_flight->arrival_date = $flight['nameValuePairs']['arrival_date'];
                    $db_flight->departure_time = $flight['nameValuePairs']['departure_time'];
                    $db_flight->arrival_time = $flight['nameValuePairs']['arrival_time'];
                    $db_flight->carrier_iata = $flight['nameValuePairs']['carrier_iata'];
                    $db_flight->carrier = $flight['nameValuePairs']['carrier'];
                    $db_flight->duration = $flight['nameValuePairs']['duration'];
                    $db_flight->flight_number = $flight['nameValuePairs']['flight_number'];
                    $db_flight->type = 'inbound';
                    $db_flight->ticket_id = $db_ticket->id;
                    $db_flight->save();
                }
            } else {
                foreach($ticket['outbound']['flights'] as $flight) {
                    $db_flight = new Flight;
                    $db_flight->departure_airport_iata = $flight['departure_airport_iata'];
                    $db_flight->arrival_airport_iata = $flight['arrival_airport_iata'];
                    $db_flight->departure_airport = $flight['departure_airport'];
                    $db_flight->arrival_airport = $flight['arrival_airport'];
                    $db_flight->departure_date = $flight['departure_date'];
                    $db_flight->arrival_date = $flight['arrival_date'];
                    $db_flight->departure_time = $flight['departure_time'];
                    $db_flight->arrival_time = $flight['arrival_time'];
                    $db_flight->carrier_iata = $flight['carrier_iata'];
                    $db_flight->carrier = $flight['carrier'];
                    $db_flight->duration = $flight['duration'];
                    $db_flight->flight_number = $flight['flight_number'];
                    $db_flight->type = 'outbound';
                    $db_flight->ticket_id = $db_ticket->id;
                    $db_flight->save();
                }
                foreach($ticket['inbound']['flights']['values'] as $flight) {
                    $db_flight = new Flight;
                    $db_flight->departure_airport_iata = $flight['departure_airport_iata'];
                    $db_flight->arrival_airport_iata = $flight['arrival_airport_iata'];
                    $db_flight->departure_airport = $flight['departure_airport'];
                    $db_flight->arrival_airport = $flight['arrival_airport'];
                    $db_flight->departure_date = $flight['departure_date'];
                    $db_flight->arrival_date = $flight['arrival_date'];
                    $db_flight->departure_time = $flight['departure_time'];
                    $db_flight->arrival_time = $flight['arrival_time'];
                    $db_flight->carrier_iata = $flight['carrier_iata'];
                    $db_flight->carrier = $flight['carrier'];
                    $db_flight->duration = $flight['duration'];
                    $db_flight->flight_number = $flight['flight_number'];
                    $db_flight->type = 'inbound';
                    $db_flight->ticket_id = $db_ticket->id;
                    $db_flight->save();
                }
            }
            
        } else {
            if(array_key_exists('values', $ticket['flights'])) {
                foreach($ticket['flights']['values'] as $flight) {
                    $db_flight = new Flight;
                    $db_flight->departure_airport_iata = $flight['nameValuePairs']['departure_airport_iata'];
                    $db_flight->arrival_airport_iata = $flight['nameValuePairs']['arrival_airport_iata'];
                    $db_flight->departure_airport = $flight['nameValuePairs']['departure_airport'];
                    $db_flight->arrival_airport = $flight['nameValuePairs']['arrival_airport'];
                    $db_flight->departure_date = $flight['nameValuePairs']['departure_date'];
                    $db_flight->arrival_date = $flight['nameValuePairs']['arrival_date'];
                    $db_flight->departure_time = $flight['nameValuePairs']['departure_time'];
                    $db_flight->arrival_time = $flight['nameValuePairs']['arrival_time'];
                    $db_flight->carrier_iata = $flight['nameValuePairs']['carrier_iata'];
                    $db_flight->carrier = $flight['nameValuePairs']['carrier'];
                    $db_flight->duration = $flight['nameValuePairs']['duration'];
                    $db_flight->flight_number = $flight['nameValuePairs']['flight_number'];
                    $db_flight->type = 'outbound';
                    $db_flight->ticket_id = $db_ticket->id;
                    $db_flight->save();
                }
            } else {
                foreach($ticket['flights'] as $flight) {
                    $db_flight = new Flight;
                    $db_flight->departure_airport_iata = $flight['departure_airport_iata'];
                    $db_flight->arrival_airport_iata = $flight['arrival_airport_iata'];
                    $db_flight->departure_airport = $flight['departure_airport'];
                    $db_flight->arrival_airport = $flight['arrival_airport'];
                    $db_flight->departure_date = $flight['departure_date'];
                    $db_flight->arrival_date = $flight['arrival_date'];
                    $db_flight->departure_time = $flight['departure_time'];
                    $db_flight->arrival_time = $flight['arrival_time'];
                    $db_flight->carrier_iata = $flight['carrier_iata'];
                    $db_flight->carrier = $flight['carrier'];
                    $db_flight->duration = $flight['duration'];
                    $db_flight->flight_number = $flight['flight_number'];
                    $db_flight->type = 'outbound';
                    $db_flight->ticket_id = $db_ticket->id;
                    $db_flight->save();
                }
            }
        }
        foreach($passengers as $passenger) {
            $db_passenger = new Passenger;
            $db_passenger->first_name = $passenger['first_name'];
            $db_passenger->last_name = $passenger['last_name'];
            $db_passenger->gender = $passenger['gender'];
            $db_passenger->birthday = $passenger['birthday'];
            $db_passenger->nationality = $passenger['nationality'];
            $db_passenger->passport_id = $passenger['passport_no'];
            $db_passenger->passport_expiry_date = $passenger['expiry_date'];
            $db_passenger->ticket_id = $db_ticket->id;
            $db_passenger->save();
        }

        // $ticket = Ticket::find($ticket->id);
        // $ticket->load('flights', 'passengers');
        return response()->json($db_ticket);
    }



}