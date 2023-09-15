<?php

namespace App\Tools;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\ClientException;
use function GuzzleHttp\json_decode;
  
class Amadeus
{

    public static function get_tickets($query, $access_token) {
        try {
            $client = new Client(['base_uri' => config('amadeus.flights_base_uri')]);
            $request = $client->request('GET', 'flight-offers?', [
                'stream' => 'true',
                'query' => $query,
                'headers' => [
                    'Authorization' => 'Bearer ' . $access_token
                ]
            ]);
            $response = $request->getBody()->getContents();
            if(strpos($response, 'PRT')) {
                $response = str_replace('PRT', 'PRN', $response);
            }
            $response = json_decode($response, true);
        } catch (ClientException $e) {
            $response = 0;
        }
        return $response;
    }

    public static function build_query($request) {
        $query = [];
        $query['origin'] = $request->origin;
        $query['destination'] = $request->destination;
        $query['departureDate'] = $request->departureDate;
        if ($request->filled('returnDate')) $query['returnDate'] = $request->returnDate;
        $query['adults'] = $request->adults;
        if ($request->filled('children')) $query['children'] = $request->children; else $query['children'] = 0;
        if ($request->filled('infants')) $query['infants'] = $request->infants; else $query['infants'] = 0;
        if ($request->filled('currency')) $query['currency'] = $request->currency; else $query['currency'] = 'USD';
        if ($request->filled('nonStop')) {
            if($request->nonStop == 'false') {
                $query['nonStop'] = 'false';
            } else {
                $query['nonStop'] = 'true';
            }
        } else {
            $query['nonStop'] = 'false';
        }
        if ($request->filled('max')) $query['max'] = $request->max; else $query['max'] = '250';
        return $query;
    }

    public static function generate_access_token() {
        $client = new Client();
        $result = $client->request('POST', 'https://api.amadeus.com/v1/security/oauth2/token', [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => 'lOXvjo37spnya4QtNEQZsgKZRldiuGMX',
                'client_secret' => 'uxGWTdgoxGKIFynO'
            ]
        ]);
        $token_body = json_decode($result->getBody()->getContents(), true);
        return $token_body['access_token'];
    }

    public static function get_ticket(Request $request, $tickets) {
        if($request->has('returnDate') && array_key_exists('outbound', $tickets[0])) {
            foreach($tickets as $ticket) {
                if(
                    $ticket['outbound']['departure_time'] == $request->departure_time_outbound &&
                    $ticket['outbound']['arrival_time'] == $request->arrival_time_outbound &&
                    $ticket['outbound']['departure_date'] == $request->departure_date_outbound &&
                    $ticket['outbound']['arrival_date'] == $request->arrival_date_outbound &&
                    $ticket['outbound']['departure_airport_iata'] == $request->departure_airport_iata_outbound &&
                    $ticket['outbound']['arrival_airport_iata'] == $request->arrival_airport_iata_outbound &&
                    $ticket['outbound']['carrier_iata'] == $request->carrier_iata_outbound &&
                    $ticket['outbound']['stops'] == $request->stops_outbound &&
                    $ticket['outbound']['flight_number'] == $request->flight_number_outbound &&
                    $ticket['inbound']['departure_time'] == $request->departure_time_inbound &&
                    $ticket['inbound']['arrival_time'] == $request->arrival_time_inbound &&
                    $ticket['inbound']['departure_date'] == $request->departure_date_inbound &&
                    $ticket['inbound']['arrival_date'] == $request->arrival_date_inbound &&
                    $ticket['inbound']['departure_airport_iata'] == $request->departure_airport_iata_inbound &&
                    $ticket['inbound']['arrival_airport_iata'] == $request->arrival_airport_iata_inbound &&
                    $ticket['inbound']['carrier_iata'] == $request->carrier_iata_inbound &&
                    $ticket['inbound']['stops'] == $request->stops_inbound &&
                    $ticket['inbound']['flight_number'] == $request->flight_number_inbound
                ) {
                    return $ticket;
                }
            }
            return 'not found';
        } else {
            foreach($tickets as $ticket) {
                if(
                    $ticket['departure_time'] == $request->departure_time &&
                    $ticket['arrival_time'] == $request->arrival_time &&
                    $ticket['departure_date'] == $request->departure_date &&
                    $ticket['arrival_date'] == $request->arrival_date &&
                    $ticket['departure_airport_iata'] == $request->departure_airport_iata &&
                    $ticket['arrival_airport_iata'] == $request->arrival_airport_iata &&
                    $ticket['carrier_iata'] == $request->carrier_iata &&
                    $ticket['stops'] == $request->stops &&
                    $ticket['flight_number'] == $request->flight_number
                ) {
                    return $ticket;
                }
            }
            return 'not found';
        }
    }

    public static function validate_query(Request $request) {
        $request->validate([
            'origin' => 'required|min:3',
            'destination' => 'required|min:3',
            'departureDate' => 'required|date|after:yesterday',
            'returnDate' => 'date|after:today',
            'adults' => 'required|numeric|min:1',
            'children' => 'numeric',
            'infants' => 'numeric',
            'currency' => 'in:USD,EUR,RSD'
        ]);
    }

    public static function validate_ticket(Request $request) {
        if($request->has('returnDate')) {
            $request->validate([
                'departure_airport_iata_outbound' => 'required|min:3',
                'arrival_airport_iata_outbound' => 'required|min:3',
                'departure_date_outbound' => 'required',
                'arrival_date_outbound' => 'required',
                'departure_time_outbound' => 'required',
                'arrival_time_outbound' => 'required',
                'duration_outbound' => 'required',
                'carrier_iata_outbound' => 'required',
                'stops_outbound' => 'required',
                'flight_number_outbound' => 'required',
                'departure_airport_iata_inbound' => 'required|min:3',
                'arrival_airport_iata_inbound' => 'required|min:3',
                'departure_date_inbound' => 'required',
                'arrival_date_inbound' => 'required',
                'departure_time_inbound' => 'required',
                'arrival_time_inbound' => 'required',
                'duration_inbound' => 'required',
                'carrier_iata_inbound' => 'required',
                'stops_inbound' => 'required',
                'flight_number_inbound' => 'required'
            ]);
        } else {
            $request->validate([
                'departure_airport_iata' => 'required|min:3',
                'arrival_airport_iata' => 'required|min:3',
                'departure_date' => 'required',
                'arrival_date' => 'required',
                'departure_time' => 'required',
                'arrival_time' => 'required',
                'duration' => 'required',
                'carrier_iata' => 'required',
                'stops' => 'required',
                'flight_number' => 'required'
            ]);
        }
    }

    public static function format($response) {
        if($response == 0) return $response;
        $result = [];
        foreach($response['dictionaries']['locations'] as $key => $location) {
            if(!array_key_exists('detailedName', $response['dictionaries']['locations'][$key])) {
                unset($response['dictionaries']['locations'][$key]);
            }
        }
        if(sizeof($response['data'][0]['offerItems'][0]['services']) > 1) {
            $result['type'] = 'return';
            $result['currency'] = $response['meta']['currency'];
            //RETURN
            foreach($response['data'] as $key_ticket => $ticket) {
                // OUTBOUND
                $departure_time_full = explode('T' ,$ticket['offerItems'][0]['services'][0]['segments'][0]['flightSegment']['departure']['at'])[1];
                if(strpos($departure_time_full, '+')) {
                    $departure_time_2 = explode('+' ,$departure_time_full)[0];
                } elseif(strpos($departure_time_full, '-')) {
                    $departure_time_2 = explode('-' ,$departure_time_full)[0];
                } else {
                    $departure_time_2 = $departure_time_full;
                }
                $departure_time = explode(':' ,$departure_time_2)[0] . ':' . explode(':' ,$departure_time_2)[1];
                $arrival_time_full = explode('T' ,$ticket['offerItems'][0]['services'][0]['segments'][sizeof($ticket['offerItems'][0]['services'][0]['segments']) - 1]['flightSegment']['arrival']['at'])[1];
                if(strpos($arrival_time_full, '+')) {
                    $arrival_time_2 = explode('+' ,$arrival_time_full)[0];
                } elseif(strpos($departure_time_full, '-')) {
                    $arrival_time_2 = explode('-' ,$arrival_time_full)[0];
                } else {
                    $arrival_time_2 = $arrival_time_full;
                }
                $arrival_time = explode(':' ,$arrival_time_2)[0] . ':' . explode(':' ,$arrival_time_2)[1];
                $departure_date = explode('T' ,$ticket['offerItems'][0]['services'][0]['segments'][0]['flightSegment']['departure']['at'])[0];
                $arrival_date = explode('T' ,$ticket['offerItems'][0]['services'][0]['segments'][sizeof($ticket['offerItems'][0]['services'][0]['segments']) - 1]['flightSegment']['arrival']['at'])[0];
                $departure_airport_iata = $ticket['offerItems'][0]['services'][0]['segments'][0]['flightSegment']['departure']['iataCode'];
                $arrival_airport_iata = $ticket['offerItems'][0]['services'][0]['segments'][sizeof($ticket['offerItems'][0]['services'][0]['segments']) - 1]['flightSegment']['arrival']['iataCode'];
                $departure_airport = $response['dictionaries']['locations'][$departure_airport_iata]['detailedName'];
                $arrival_airport = $response['dictionaries']['locations'][$arrival_airport_iata]['detailedName'];
                $carrier_iata = $ticket['offerItems'][0]['services'][0]['segments'][0]['flightSegment']['carrierCode'];
                $carrier = $response['dictionaries']['carriers'][$carrier_iata];
                $stops = sizeof($ticket['offerItems'][0]['services'][0]['segments']) - 1;
                $flight_number = $ticket['offerItems'][0]['services'][0]['segments'][0]['flightSegment']['number'];
                $full_duration_start = Carbon::parse($ticket['offerItems'][0]['services'][0]['segments'][0]['flightSegment']['departure']['at']);
                $full_duration_end = Carbon::parse($ticket['offerItems'][0]['services'][0]['segments'][sizeof($ticket['offerItems'][0]['services'][0]['segments']) - 1]['flightSegment']['arrival']['at']);
                $days = $full_duration_start->diffInDays($full_duration_end);
                $hours = $full_duration_start->copy()->addDays($days)->diffInHours($full_duration_end);
                $minutes = $full_duration_start->copy()->addDays($days)->addHours($hours)->diffInMinutes($full_duration_end);
                $full_duration = $days . 'D' . $hours . 'H' . $minutes . 'M';
                $result['tickets'][$key_ticket]['outbound']['departure_time'] = $departure_time;
                $result['tickets'][$key_ticket]['outbound']['arrival_time'] = $arrival_time;
                $result['tickets'][$key_ticket]['outbound']['departure_date'] = $departure_date;
                $result['tickets'][$key_ticket]['outbound']['arrival_date'] = $arrival_date;
                $result['tickets'][$key_ticket]['outbound']['departure_airport_iata'] = $departure_airport_iata;
                $result['tickets'][$key_ticket]['outbound']['arrival_airport_iata'] = $arrival_airport_iata;
                $result['tickets'][$key_ticket]['outbound']['departure_airport'] = $departure_airport;
                $result['tickets'][$key_ticket]['outbound']['arrival_airport'] = $arrival_airport;
                $result['tickets'][$key_ticket]['outbound']['carrier_iata'] = $carrier_iata;
                $result['tickets'][$key_ticket]['outbound']['carrier'] = $carrier;
                $result['tickets'][$key_ticket]['outbound']['stops'] = $stops;
                $result['tickets'][$key_ticket]['outbound']['flight_number'] = $flight_number;
                $result['tickets'][$key_ticket]['outbound']['duration'] = $full_duration;  
                //INBOUND
                $departure_time_full = explode('T' ,$ticket['offerItems'][0]['services'][1]['segments'][0]['flightSegment']['departure']['at'])[1];
                if(strpos($departure_time_full, '+')) {
                    $departure_time_2 = explode('+' ,$departure_time_full)[0];
                } elseif(strpos($departure_time_full, '-')) {
                    $departure_time_2 = explode('-' ,$departure_time_full)[0];
                } else {
                    $departure_time_2 = $departure_time_full;
                }
                $departure_time = explode(':' ,$departure_time_2)[0] . ':' . explode(':' ,$departure_time_2)[1];
                $arrival_time_full = explode('T' ,$ticket['offerItems'][0]['services'][1]['segments'][sizeof($ticket['offerItems'][0]['services'][1]['segments']) - 1]['flightSegment']['arrival']['at'])[1];
                if(strpos($arrival_time_full, '+')) {
                    $arrival_time_2 = explode('+' ,$arrival_time_full)[0];
                } elseif(strpos($departure_time_full, '-')) {
                    $arrival_time_2 = explode('-' ,$arrival_time_full)[0];
                } else {
                    $arrival_time_2 = $arrival_time_full;
                }
                $arrival_time = explode(':' ,$arrival_time_2)[0] . ':' . explode(':' ,$arrival_time_2)[1];
                $departure_date = explode('T' ,$ticket['offerItems'][0]['services'][1]['segments'][0]['flightSegment']['departure']['at'])[0];
                $arrival_date = explode('T' ,$ticket['offerItems'][0]['services'][1]['segments'][sizeof($ticket['offerItems'][0]['services'][1]['segments']) - 1]['flightSegment']['arrival']['at'])[0];
                $departure_airport_iata = $ticket['offerItems'][0]['services'][1]['segments'][0]['flightSegment']['departure']['iataCode'];
                $arrival_airport_iata = $ticket['offerItems'][0]['services'][1]['segments'][sizeof($ticket['offerItems'][0]['services'][1]['segments']) - 1]['flightSegment']['arrival']['iataCode'];
                $departure_airport = $response['dictionaries']['locations'][$departure_airport_iata]['detailedName'];
                $arrival_airport = $response['dictionaries']['locations'][$arrival_airport_iata]['detailedName'];
                $carrier_iata = $ticket['offerItems'][0]['services'][1]['segments'][0]['flightSegment']['carrierCode'];
                $carrier = $response['dictionaries']['carriers'][$carrier_iata];
                $stops = sizeof($ticket['offerItems'][0]['services'][1]['segments']) - 1;
                $flight_number = $ticket['offerItems'][0]['services'][1]['segments'][0]['flightSegment']['number'];
                $full_duration_start = Carbon::parse($ticket['offerItems'][0]['services'][1]['segments'][0]['flightSegment']['departure']['at']);
                $full_duration_end = Carbon::parse($ticket['offerItems'][0]['services'][1]['segments'][sizeof($ticket['offerItems'][0]['services'][1]['segments']) - 1]['flightSegment']['arrival']['at']);
                $price = $ticket['offerItems'][0]['price']['total'];
                $days = $full_duration_start->diffInDays($full_duration_end);
                $hours = $full_duration_start->copy()->addDays($days)->diffInHours($full_duration_end);
                $minutes = $full_duration_start->copy()->addDays($days)->addHours($hours)->diffInMinutes($full_duration_end);
                $full_duration = $days . 'D' . $hours . 'H' . $minutes . 'M';
                $result['tickets'][$key_ticket]['inbound']['departure_time'] = $departure_time;
                $result['tickets'][$key_ticket]['inbound']['arrival_time'] = $arrival_time;
                $result['tickets'][$key_ticket]['inbound']['departure_date'] = $departure_date;
                $result['tickets'][$key_ticket]['inbound']['arrival_date'] = $arrival_date;
                $result['tickets'][$key_ticket]['inbound']['departure_airport_iata'] = $departure_airport_iata;
                $result['tickets'][$key_ticket]['inbound']['arrival_airport_iata'] = $arrival_airport_iata;
                $result['tickets'][$key_ticket]['inbound']['departure_airport'] = $departure_airport;
                $result['tickets'][$key_ticket]['inbound']['arrival_airport'] = $arrival_airport;
                $result['tickets'][$key_ticket]['inbound']['carrier_iata'] = $carrier_iata;
                $result['tickets'][$key_ticket]['inbound']['carrier'] = $carrier;
                $result['tickets'][$key_ticket]['inbound']['stops'] = $stops;
                $result['tickets'][$key_ticket]['inbound']['flight_number'] = $flight_number;
                $result['tickets'][$key_ticket]['inbound']['duration'] = $full_duration;     
                $result['tickets'][$key_ticket]['price'] = $price;
                foreach($ticket['offerItems'][0]['services'][0]['segments'] as $key_flight => $flight) {
                    $departure_time_full = explode('T' ,$flight['flightSegment']['departure']['at'])[1];
                    if(strpos($departure_time_full, '+')) {
                        $departure_time_2 = explode('+' ,$departure_time_full)[0];
                    } elseif(strpos($departure_time_full, '-')) {
                        $departure_time_2 = explode('-' ,$departure_time_full)[0];
                    } else {
                        $departure_time_2 = $departure_time_full;
                    }
                    $departure_time = explode(':' ,$departure_time_2)[0] . ':' . explode(':' ,$departure_time_2)[1];
                    $arrival_time_full = explode('T' ,$flight['flightSegment']['arrival']['at'])[1];
                    if(strpos($arrival_time_full, '+')) {
                        $arrival_time_2 = explode('+' ,$arrival_time_full)[0];
                    } elseif(strpos($departure_time_full, '-')) {
                        $arrival_time_2 = explode('-' ,$arrival_time_full)[0];
                    } else {
                        $arrival_time_2 = $arrival_time_full;
                    }
                    $arrival_time = explode(':' ,$arrival_time_2)[0] . ':' . explode(':' ,$arrival_time_2)[1];
                    $departure_date = explode('T' ,$flight['flightSegment']['departure']['at'])[0];
                    $arrival_date = explode('T' ,$flight['flightSegment']['arrival']['at'])[0];
                    $departure_airport_iata = $flight['flightSegment']['departure']['iataCode'];
                    $arrival_airport_iata = $flight['flightSegment']['arrival']['iataCode'];
                    $departure_airport = $response['dictionaries']['locations'][$departure_airport_iata]['detailedName'];
                    $arrival_airport = $response['dictionaries']['locations'][$arrival_airport_iata]['detailedName'];
                    $carrier_iata = $flight['flightSegment']['carrierCode'];
                    $carrier = $response['dictionaries']['carriers'][$carrier_iata];
                    $duration = $flight['flightSegment']['duration'];
                    $flight_number = $flight['flightSegment']['number'];
                    $result['tickets'][$key_ticket]['outbound']['flights'][$key_flight]['departure_time'] = $departure_time;
                    $result['tickets'][$key_ticket]['outbound']['flights'][$key_flight]['arrival_time'] = $arrival_time;
                    $result['tickets'][$key_ticket]['outbound']['flights'][$key_flight]['departure_date'] = $departure_date;
                    $result['tickets'][$key_ticket]['outbound']['flights'][$key_flight]['arrival_date'] = $arrival_date;
                    $result['tickets'][$key_ticket]['outbound']['flights'][$key_flight]['departure_airport_iata'] = $departure_airport_iata;
                    $result['tickets'][$key_ticket]['outbound']['flights'][$key_flight]['arrival_airport_iata'] = $arrival_airport_iata;
                    $result['tickets'][$key_ticket]['outbound']['flights'][$key_flight]['departure_airport'] = $departure_airport;
                    $result['tickets'][$key_ticket]['outbound']['flights'][$key_flight]['arrival_airport'] = $arrival_airport;
                    $result['tickets'][$key_ticket]['outbound']['flights'][$key_flight]['carrier_iata'] = $carrier_iata;
                    $result['tickets'][$key_ticket]['outbound']['flights'][$key_flight]['carrier'] = $carrier;
                    $result['tickets'][$key_ticket]['outbound']['flights'][$key_flight]['duration'] = $duration;
                    $result['tickets'][$key_ticket]['outbound']['flights'][$key_flight]['flight_number'] = $flight_number;
                }
                foreach($ticket['offerItems'][0]['services'][1]['segments'] as $key_flight => $flight) {
                    $departure_time_full = explode('T' ,$flight['flightSegment']['departure']['at'])[1];
                    if(strpos($departure_time_full, '+')) {
                        $departure_time_2 = explode('+' ,$departure_time_full)[0];
                    } elseif(strpos($departure_time_full, '-')) {
                        $departure_time_2 = explode('-' ,$departure_time_full)[0];
                    } else {
                        $departure_time_2 = $departure_time_full;
                    }
                    $departure_time = explode(':' ,$departure_time_2)[0] . ':' . explode(':' ,$departure_time_2)[1];
                    $arrival_time_full = explode('T' ,$flight['flightSegment']['arrival']['at'])[1];
                    if(strpos($arrival_time_full, '+')) {
                        $arrival_time_2 = explode('+' ,$arrival_time_full)[0];
                    } elseif(strpos($departure_time_full, '-')) {
                        $arrival_time_2 = explode('-' ,$arrival_time_full)[0];
                    } else {
                        $arrival_time_2 = $arrival_time_full;
                    }
                    $arrival_time = explode(':' ,$arrival_time_2)[0] . ':' . explode(':' ,$arrival_time_2)[1];
                    $departure_date = explode('T' ,$flight['flightSegment']['departure']['at'])[0];
                    $arrival_date = explode('T' ,$flight['flightSegment']['arrival']['at'])[0];
                    $departure_airport_iata = $flight['flightSegment']['departure']['iataCode'];
                    $arrival_airport_iata = $flight['flightSegment']['arrival']['iataCode'];
                    $departure_airport = $response['dictionaries']['locations'][$departure_airport_iata]['detailedName'];
                    $arrival_airport = $response['dictionaries']['locations'][$arrival_airport_iata]['detailedName'];
                    $carrier_iata = $flight['flightSegment']['carrierCode'];
                    $carrier = $response['dictionaries']['carriers'][$carrier_iata];
                    $duration = $flight['flightSegment']['duration'];
                    $flight_number = $flight['flightSegment']['number'];
                    $result['tickets'][$key_ticket]['inbound']['flights'][$key_flight]['departure_time'] = $departure_time;
                    $result['tickets'][$key_ticket]['inbound']['flights'][$key_flight]['arrival_time'] = $arrival_time;
                    $result['tickets'][$key_ticket]['inbound']['flights'][$key_flight]['departure_date'] = $departure_date;
                    $result['tickets'][$key_ticket]['inbound']['flights'][$key_flight]['arrival_date'] = $arrival_date;
                    $result['tickets'][$key_ticket]['inbound']['flights'][$key_flight]['departure_airport_iata'] = $departure_airport_iata;
                    $result['tickets'][$key_ticket]['inbound']['flights'][$key_flight]['arrival_airport_iata'] = $arrival_airport_iata;
                    $result['tickets'][$key_ticket]['inbound']['flights'][$key_flight]['departure_airport'] = $departure_airport;
                    $result['tickets'][$key_ticket]['inbound']['flights'][$key_flight]['arrival_airport'] = $arrival_airport;
                    $result['tickets'][$key_ticket]['inbound']['flights'][$key_flight]['carrier_iata'] = $carrier_iata;
                    $result['tickets'][$key_ticket]['inbound']['flights'][$key_flight]['carrier'] = $carrier;
                    $result['tickets'][$key_ticket]['inbound']['flights'][$key_flight]['duration'] = $duration;
                    $result['tickets'][$key_ticket]['inbound']['flights'][$key_flight]['flight_number'] = $flight_number;
                }
            }
        } else {
            $result['type'] = 'oneway';
            $result['currency'] = $response['meta']['currency'];
            //ONEWAY
            foreach($response['data'] as $key_ticket => $ticket) {
                $departure_time_full = explode('T' ,$ticket['offerItems'][0]['services'][0]['segments'][0]['flightSegment']['departure']['at'])[1];
                if(strpos($departure_time_full, '+')) {
                    $departure_time_2 = explode('+' ,$departure_time_full)[0];
                } elseif(strpos($departure_time_full, '-')) {
                    $departure_time_2 = explode('-' ,$departure_time_full)[0];
                } else {
                    $departure_time_2 = $departure_time_full;
                }
                $departure_time = explode(':' ,$departure_time_2)[0] . ':' . explode(':' ,$departure_time_2)[1];
                $arrival_time_full = explode('T' ,$ticket['offerItems'][0]['services'][0]['segments'][sizeof($ticket['offerItems'][0]['services'][0]['segments']) - 1]['flightSegment']['arrival']['at'])[1];
                if(strpos($arrival_time_full, '+')) {
                    $arrival_time_2 = explode('+' ,$arrival_time_full)[0];
                } elseif(strpos($departure_time_full, '-')) {
                    $arrival_time_2 = explode('-' ,$arrival_time_full)[0];
                } else {
                    $arrival_time_2 = $arrival_time_full;
                }
                $arrival_time = explode(':' ,$arrival_time_2)[0] . ':' . explode(':' ,$arrival_time_2)[1];
                $departure_date = explode('T' ,$ticket['offerItems'][0]['services'][0]['segments'][0]['flightSegment']['departure']['at'])[0];
                $arrival_date = explode('T' ,$ticket['offerItems'][0]['services'][0]['segments'][sizeof($ticket['offerItems'][0]['services'][0]['segments']) - 1]['flightSegment']['arrival']['at'])[0];
                $departure_airport_iata = $ticket['offerItems'][0]['services'][0]['segments'][0]['flightSegment']['departure']['iataCode'];
                $arrival_airport_iata = $ticket['offerItems'][0]['services'][0]['segments'][sizeof($ticket['offerItems'][0]['services'][0]['segments']) - 1]['flightSegment']['arrival']['iataCode'];
                $departure_airport = $response['dictionaries']['locations'][$departure_airport_iata]['detailedName'];
                $arrival_airport = $response['dictionaries']['locations'][$arrival_airport_iata]['detailedName'];
                $carrier_iata = $ticket['offerItems'][0]['services'][0]['segments'][0]['flightSegment']['carrierCode'];
                $carrier = $response['dictionaries']['carriers'][$carrier_iata];
                $price = $ticket['offerItems'][0]['price']['total'];
                $stops = sizeof($ticket['offerItems'][0]['services'][0]['segments']) - 1;
                $flight_number = $ticket['offerItems'][0]['services'][0]['segments'][0]['flightSegment']['number'];
                $full_duration_start = Carbon::parse($ticket['offerItems'][0]['services'][0]['segments'][0]['flightSegment']['departure']['at']);
                $full_duration_end = Carbon::parse($ticket['offerItems'][0]['services'][0]['segments'][sizeof($ticket['offerItems'][0]['services'][0]['segments']) - 1]['flightSegment']['arrival']['at']);
                $days = $full_duration_start->diffInDays($full_duration_end);
                $hours = $full_duration_start->copy()->addDays($days)->diffInHours($full_duration_end);
                $minutes = $full_duration_start->copy()->addDays($days)->addHours($hours)->diffInMinutes($full_duration_end);
                $full_duration = $days . 'D' . $hours . 'H' . $minutes . 'M';
                $result['tickets'][$key_ticket]['departure_time'] = $departure_time;
                $result['tickets'][$key_ticket]['arrival_time'] = $arrival_time;
                $result['tickets'][$key_ticket]['departure_date'] = $departure_date;
                $result['tickets'][$key_ticket]['arrival_date'] = $arrival_date;
                $result['tickets'][$key_ticket]['departure_airport_iata'] = $departure_airport_iata;
                $result['tickets'][$key_ticket]['arrival_airport_iata'] = $arrival_airport_iata;
                $result['tickets'][$key_ticket]['departure_airport'] = $departure_airport;
                $result['tickets'][$key_ticket]['arrival_airport'] = $arrival_airport;
                $result['tickets'][$key_ticket]['carrier_iata'] = $carrier_iata;
                $result['tickets'][$key_ticket]['carrier'] = $carrier;
                $result['tickets'][$key_ticket]['stops'] = $stops;
                $result['tickets'][$key_ticket]['flight_number'] = $flight_number;
                $result['tickets'][$key_ticket]['duration'] = $full_duration;                
                $result['tickets'][$key_ticket]['price'] = $price;
                foreach($ticket['offerItems'][0]['services'][0]['segments'] as $key_flight => $flight) {
                    $departure_time_full = explode('T' ,$flight['flightSegment']['departure']['at'])[1];
                    if(strpos($departure_time_full, '+')) {
                        $departure_time_2 = explode('+' ,$departure_time_full)[0];
                    } elseif(strpos($departure_time_full, '-')) {
                        $departure_time_2 = explode('-' ,$departure_time_full)[0];
                    } else {
                        $departure_time_2 = $departure_time_full;
                    }
                    $departure_time = explode(':' ,$departure_time_2)[0] . ':' . explode(':' ,$departure_time_2)[1];
                    $arrival_time_full = explode('T' ,$flight['flightSegment']['arrival']['at'])[1];
                    if(strpos($arrival_time_full, '+')) {
                        $arrival_time_2 = explode('+' ,$arrival_time_full)[0];
                    } elseif(strpos($departure_time_full, '-')) {
                        $arrival_time_2 = explode('-' ,$arrival_time_full)[0];
                    } else {
                        $arrival_time_2 = $arrival_time_full;
                    }
                    $arrival_time = explode(':' ,$arrival_time_2)[0] . ':' . explode(':' ,$arrival_time_2)[1];
                    $departure_date = explode('T' ,$flight['flightSegment']['departure']['at'])[0];
                    $arrival_date = explode('T' ,$flight['flightSegment']['arrival']['at'])[0];
                    $departure_airport_iata = $flight['flightSegment']['departure']['iataCode'];
                    $arrival_airport_iata = $flight['flightSegment']['arrival']['iataCode'];
                    $departure_airport = $response['dictionaries']['locations'][$departure_airport_iata]['detailedName'];
                    $arrival_airport = $response['dictionaries']['locations'][$arrival_airport_iata]['detailedName'];
                    $carrier_iata = $flight['flightSegment']['carrierCode'];
                    $carrier = $response['dictionaries']['carriers'][$carrier_iata];
                    $duration = $flight['flightSegment']['duration'];
                    $flight_number = $flight['flightSegment']['number'];
                    $result['tickets'][$key_ticket]['flights'][$key_flight]['departure_time'] = $departure_time;
                    $result['tickets'][$key_ticket]['flights'][$key_flight]['arrival_time'] = $arrival_time;
                    $result['tickets'][$key_ticket]['flights'][$key_flight]['departure_date'] = $departure_date;
                    $result['tickets'][$key_ticket]['flights'][$key_flight]['arrival_date'] = $arrival_date;
                    $result['tickets'][$key_ticket]['flights'][$key_flight]['departure_airport_iata'] = $departure_airport_iata;
                    $result['tickets'][$key_ticket]['flights'][$key_flight]['arrival_airport_iata'] = $arrival_airport_iata;
                    $result['tickets'][$key_ticket]['flights'][$key_flight]['departure_airport'] = $departure_airport;
                    $result['tickets'][$key_ticket]['flights'][$key_flight]['arrival_airport'] = $arrival_airport;
                    $result['tickets'][$key_ticket]['flights'][$key_flight]['carrier_iata'] = $carrier_iata;
                    $result['tickets'][$key_ticket]['flights'][$key_flight]['carrier'] = $carrier;
                    $result['tickets'][$key_ticket]['flights'][$key_flight]['duration'] = $duration;
                    $result['tickets'][$key_ticket]['flights'][$key_flight]['flight_number'] = $flight_number;
                }
            }
        }
        usort($result['tickets'], function($a, $b) {
            return ($a['price'] > $b['price']);
        });
        return $result;
    }

}