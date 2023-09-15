<?php

namespace App\Http\Controllers\Api;

use App\Tools\Amadeus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index(Request $request) {

        Amadeus::validate_query($request);
        $query = Amadeus::build_query($request);
        $access_token = Amadeus::generate_access_token();
        $api_response = Amadeus::get_tickets($query, $access_token);
        if($api_response == 0) return 0;
        $result = Amadeus::format($api_response);
        $db_percentage = DB::table('settings')->pluck('percentage')->first();
        $percentage = strval('1.' . $db_percentage);
        foreach($result['tickets'] as &$ticket) {
            $ticket['price'] = number_format($ticket['price'] * $percentage, 2);
        }

        return response()->json($result);
        
    }

}
