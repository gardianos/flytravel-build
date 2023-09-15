<?php

namespace App\Http\Controllers;

use App\Tools\Amadeus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


class SearchController extends Controller
{
    
    public function index(Request $request) {
        Amadeus::validate_query($request);
        $query = Amadeus::build_query($request);
        $access_token = Amadeus::generate_access_token();
        $api_response = Amadeus::get_tickets($query, $access_token);
        // return $api_response;
        if($api_response == 0) {
            Session::flash('error', 'No results!');
            return redirect()->route('index');
        }
        $result = Amadeus::format($api_response);
        $db_percentage = DB::table('settings')->pluck('percentage')->first();
        $percentage = strval('1.' . $db_percentage);
        foreach($result['tickets'] as &$ticket) {
            $ticket['price'] = round($ticket['price'] * $percentage, 2);
        }
        return view('tickets')->with('result', $result)
                                ->with('query', $query);
    }

    public function show(Request $request) {
        Amadeus::validate_query($request);
        Amadeus::validate_ticket($request);
        $query = Amadeus::build_query($request);
        $access_token = Amadeus::generate_access_token();
        $api_response = Amadeus::get_tickets($query, $access_token);
        if($api_response == 0) {
            Session::flash('error', 'Ticket not found, try againn!');
            return redirect()->route('index');
        }
        $result = Amadeus::format($api_response);
        $ticket = Amadeus::get_ticket($request, $result['tickets']);
        if($ticket == 'not found') {
            Session::flash('error', 'Ticket not found, try again!');
            return redirect()->route('index');
        }
        if($ticket == 'not found') return 'Ticket not found';
        $passenger_count = intval($query['adults']) + intval($query['children']) + intval($query['infants']);
        $db_percentage = DB::table('settings')->pluck('percentage')->first();
        $percentage = strval('1.' . $db_percentage);
        $ticket['price'] = round($ticket['price'] * $percentage, 2);
        return view('ticket')->with('ticket', $ticket)
                                ->with('query', $query)
                                ->with('passenger_count', $passenger_count);

    }

}


    // $percentage = '1.' . DB::table('settings')->pluck('percentage')->first();
    // foreach($flights_body['data'] as &$ticket) {
    //     $ticket['offerItems'][0]['price']['total'] *= $percentage;
    // }
