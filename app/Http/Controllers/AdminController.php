<?php

namespace App\Http\Controllers;

use App\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function dashboard() {
        $tickets_usd = Ticket::where('status', 1)->where('currency', 'USD')->get();
        $tickets_eur = Ticket::where('status', 1)->where('currency', 'EUR')->get();
        $tickets_rsd = Ticket::where('status', 1)->where('currency', 'RSD')->get();
        $start_of_week = Carbon::now()->startOfWeek();
        $end_of_week = Carbon::now()->endOfWeek();
        $now = Carbon::now();
        $income = [];
        $income['day']['usd'] = 0;
        $income['day']['eur'] = 0;
        $income['day']['rsd'] = 0;
        $income['week']['usd'] = 0;
        $income['week']['eur'] = 0;
        $income['week']['rsd'] = 0;
        $income['month']['usd'] = 0;
        $income['month']['eur'] = 0;
        $income['month']['rsd'] = 0;
        foreach($tickets_eur as $ticket) {
            $date = Carbon::parse($ticket->created_at);
            if($date->isCurrentDay()) $income['day']['eur'] = round($income['day']['eur'] + $ticket->price, 2);
            if($date->between($start_of_week, $end_of_week)) $income['week']['eur'] = round($income['week']['eur'] + $ticket->price, 2);
            if($date->isCurrentMonth()) $income['month']['eur'] = round($income['month']['eur'] + $ticket->price, 2);
        }
        foreach($tickets_rsd as $ticket) {
            $date = Carbon::parse($ticket->created_at);
            if($date->isCurrentDay()) $income['day']['rsd'] = round($income['day']['rsd'] + $ticket->price, 2);
            if($date->between($start_of_week, $end_of_week)) $income['week']['rsd'] = round($income['week']['rsd'] + $ticket->price, 2);
            if($date->isCurrentMonth()) $income['month']['rsd'] = round($income['month']['rsd'] + $ticket->price, 2);
        }
        foreach($tickets_usd as $ticket) {
            $date = Carbon::parse($ticket->created_at);
            if($date->isCurrentDay()) $income['day']['usd'] = round($income['day']['usd'] + $ticket->price, 2);
            if($date->between($start_of_week, $end_of_week)) $income['week']['usd'] = round($income['week']['usd'] + $ticket->price, 2);
            if($date->isCurrentMonth()) $income['month']['usd'] = round($income['month']['usd'] + $ticket->price, 2);
        }
        return view('admin.dashboard')->with('income', $income);
    }
    
    public function percentage_edit() {
        $percentage = DB::table('settings')->pluck('percentage')->first();
        return view('admin.percentage')->with('percentage', $percentage);
    }

    public function percentage_update(Request $request) {
        $percentage = DB::table('settings')->where('id', 1)->update(['percentage' => $request->percentage]);
        return redirect()->back();
    }

}
