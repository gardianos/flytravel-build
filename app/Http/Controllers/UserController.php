<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function profile() {
        $user = Auth::user();
        return view('profile')->with('user', $user);
    }

    public function profile_update(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
        ]);
        $user  = Auth::user();
        $user->name = $request->name;
        $user->phone = $request->phone;
        if($request->filled('password') && $request->filled('password_confirmation')) {
            $request->validate([
                'password' => ['required', 'string', 'min:6', 'confirmed'],
            ]);
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('profile', $request->locale);
    }
    
    public function bookings() {
        $tickets = Ticket::where('user_id', Auth::id())->where('status', 1)->get();
        return view('bookings')->with('tickets', $tickets);
    }

    public function booking($id) {
        $ticket = Ticket::find($id);
        $outbound_flights = $ticket->flights()->where('type', 'outbound')->get();
        $inbound_flights = $ticket->flights()->where('type', 'inbound')->get();
        $passengers = $ticket->passengers()->get();

        $ticket->outbound_flights = $outbound_flights;
        $ticket->inbound_flights = $inbound_flights;
        $ticket->passengers = $passengers;
        
        return view('booking')->with('ticket', $ticket);
    }

    public function account($lang) {
        return view('account');
    }

}
