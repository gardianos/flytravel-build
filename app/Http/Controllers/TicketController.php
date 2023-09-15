<?php

namespace App\Http\Controllers;

use PDF;
use App\User;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    
    public function index() {
        $tickets = Ticket::all();
        return view('admin.tickets')->with('tickets', $tickets);
    }

    public function show($id) {
        $ticket = Ticket::find($id);
        $outbound_flights = $ticket->flights()->where('type', 'outbound')->get();
        $inbound_flights = $ticket->flights()->where('type', 'inbound')->get();
        $passengers = $ticket->passengers()->get();

        $ticket->outbound_flights = $outbound_flights;
        $ticket->inbound_flights = $inbound_flights;
        $ticket->passengers = $passengers;
        
        return view('admin.ticket')->with('ticket', $ticket);
    }

    public function pdf($id) {
        $ticket = Ticket::find($id);
        $outbound_flights = $ticket->flights()->where('type', 'outbound')->get();
        $inbound_flights = $ticket->flights()->where('type', 'inbound')->get();
        $passengers = $ticket->passengers()->get();

        $ticket->outbound_flights = $outbound_flights;
        $ticket->inbound_flights = $inbound_flights;
        $ticket->passengers = $passengers;
        
        $user = User::find($ticket->user_id);

        view()->share(['ticket' => $ticket, 'user' => $user]);

        $time = time();
        $path = 'storage/pdf/' . $time . '.pdf';
        $name = $time . '.pdf';

        $pdf = PDF::loadView('pdf');
        $pdf->save(storage_path('app/public/' . $time . '.pdf'));


        Mail::send('email', ['name' => 'Blendi'], function ($message) use ($time) {
            $message->from('me@gmail.com', 'Blend Pajaziti');
            $message->to('blendpajaziti.7@gmail.com');
            $message->attach(storage_path('app/public/'.$time.'.pdf'));
            $message->subject("Hello from Flytravel");
        });

        return view('pdf')->with('ticket', $ticket)
                            ->with('user', $user);
    }

}
