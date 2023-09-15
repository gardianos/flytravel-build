<?php

namespace App\Http\Controllers;

use PDF;
use App\User;
use Validator;
use App\Flight;
use App\Ticket;
use App\Passenger;
use PayPal\Api\Payer;
use App\Tools\Amadeus;
use GuzzleHttp\Client;
use PayPal\Api\Amount;
use PayPal\Api\Payment;
use PayPal\Api\WebProfile;
use PayPal\Api\InputFields;
use PayPal\Api\Transaction;
use Illuminate\Http\Request;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
 
    public function create(Request $request) {

        Amadeus::validate_query($request);
        $this->validate_user_info($request);
        $this->validate_passengers($request);
        $query = Amadeus::build_query($request);
        $access_token = Amadeus::generate_access_token();
        $api_response = Amadeus::get_tickets($query, $access_token);
        if($api_response == 0) {
            Session::flash('error', 'Error!');
            return redirect()->route('index');
        }
        $result = Amadeus::format($api_response);
        $ticket = Amadeus::get_ticket($request, $result['tickets']);
        if($ticket == 'not found') {
            Session::flash('error', 'Something went wrong, please try again later!');
            return redirect()->route('index');
        }
        if(Auth::check()) {
            $user = Auth::user();
        } else {
            if($request->register == 1) {
               $user = $this->register_user($request);
            } else {
                $user = null;
            }
        }
        $db_ticket = $this->save_ticket($request, $ticket, $query, $user);
        $price = $ticket['price'];
        $db_percentage = DB::table('settings')->pluck('percentage')->first();
        $percentage = strval('1.' . $db_percentage);
        $price = round($price * $percentage, 2);
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                config('paypal.client_id'),
                config('paypal.secret')
            )
        );
        $apiContext->setConfig([
            'mode' => config('paypal.settings.mode')
        ]);
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
        $amount = new Amount();
        $amount->setCurrency($query['currency'])
                ->setTotal($price);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
                    ->setDescription("Payment description")
                    ->setInvoiceNumber(uniqid());
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("http://localhost/flytravel/public/execute-payment/" . $db_ticket->id)
                    ->setCancelUrl("http://localhost/flytravel/public/cancel-payment");
        $inputFields = new InputFields();
        $inputFields->setNoShipping(1);
        $webProfile = new WebProfile();
        $webProfile->setName(uniqid())->setInputFields($inputFields);
        $webProfileId = $webProfile->create($apiContext)->getId();
        $payment = new Payment();
        $payment->setExperienceProfileId($webProfileId);
        $payment->setIntent("sale")
                ->setPayer($payer)
                ->setRedirectUrls($redirectUrls)
                ->setTransactions(array($transaction));
        $payment->create($apiContext);
        return redirect($payment->getApprovalLink());
    }

    public function execute(Request $request, $id) {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                config('paypal.client_id'),
                config('paypal.secret')
            )
        );
        $apiContext->setConfig([
            'mode' => config('paypal.settings.mode')
        ]);
        $paymentId = $request->paymentId;
        $payment = Payment::get($paymentId, $apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->PayerID);
        $result = $payment->execute($execution, $apiContext);
        $ticket = Ticket::find($id);
        $ticket->status = 1;
        $ticket->save();
        if($ticket->user_id != 0) {
            Auth::loginUsingId($ticket->user_id);
        }
        $result = json_decode($result, true);

        if($result['state'] == 'approved') {
            $outbound_flights = $ticket->flights()->where('type', 'outbound')->get();
            $inbound_flights = $ticket->flights()->where('type', 'inbound')->get();
            $passengers = $ticket->passengers()->get();

            $ticket->outbound_flights = $outbound_flights;
            $ticket->inbound_flights = $inbound_flights;
            $ticket->passengers = $passengers;
        
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
            
            return redirect()->route('success');
        } else {
            return redirect()->route('failed');
        }
    }

    public function save_ticket(Request $request, $ticket, $query, $user) {
        $db_ticket = new Ticket;
        if(array_key_exists('outbound', $ticket)) {
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
            $db_ticket->type = 'return';
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
            $db_ticket->type = 'oneway';
        }
        $db_ticket->adults = $query['adults'];
        $db_ticket->children = $query['children'];
        $db_ticket->infants = $query['infants'];
        $db_ticket->price = $ticket['price'];
        $db_ticket->currency = $query['currency'];
        $db_ticket->status = 0;
        if(Auth::check()) {
            $db_ticket->user_id = Auth::id();
            $db_ticket->name = Auth::user()->name;
            $db_ticket->email = Auth::user()->email;
            $db_ticket->phone = Auth::user()->phone;
        } else {
            $db_ticket->name = $request->passenger[0]['first_name'] . ' ' . $request->passenger[0]['last_name'];
            $db_ticket->email = $request->email;
            if($request->register == 1) {
                $db_ticket->user_id = $user->id;
            } else {
                $db_ticket->user_id = 0;
            }
        }
        $db_ticket->save();

        if(array_key_exists('outbound', $ticket)) {
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
            foreach($ticket['inbound']['flights'] as $flight) {
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
                $db_flight->ticket_id = $db_ticket->id;
                $db_flight->type = 'inbound';
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
                $db_flight->ticket_id = $db_ticket->id;
                $db_flight->type = 'outbound';
                $db_flight->save();
            }
        }
        foreach($request->passenger as $passenger) {
            Passenger::create([
                'first_name' => $passenger['first_name'],
                'last_name' => $passenger['last_name'],
                'gender' => $passenger['gender'],
                'birthday' => $passenger['birthday'],
                'nationality' => $passenger['nationality'],
                'passport_id' => $passenger['passport_id'],
                'passport_expiry_date' => $passenger['passport_expiry_date'],
                'ticket_id' => $db_ticket->id
            ]);
        }
        return $db_ticket;
    }

    public function register_user(Request $request) {
        if(User::where('email', $request->email)->exists()){
            Session::flash('error', 'User already exists!');
            return redirect()->back();
        }
        $user = new User;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->admin = 0;
        $user->save();
        return $user;
    }

    public function validate_user_info(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'register' => 'required|in:0,1',
            'password' => 'required_if:register,1',
            'password_confirmation' => 'required_if:register,1|same:password'
        ]);
    }

    public function validate_passengers(Request $request) {
        $request->validate([
            'passenger.*.first_name' => 'required|string|max:255',
            'passenger.*.last_name' => 'required|string|max:255',
            'passenger.*.gender' => 'required|in:male,female',
            'passenger.*.birthday' => 'required',
            'passenger.*.nationality' => 'required|string|max:255',
            'passenger.*.passport_id' => 'required|string|max:255',
            'passenger.*.passport_expiry_date' => 'required|string|max:255',
        ]);
    }


}


// departure_airport_iata_outbound
// arrival_airport_iata_outbound
// departure_airport_outbound
// arrival_airport_outbound
// departure_date_outbound
// arrival_date_outbound
// departure_time_outbound
// arrival_time_outbound
// carrier_iata_outbound
// carrier_outbound
// duration_outbound
// stops_outbound
// flight_number_outbound
// departure_airport_iata_inbound
// arrival_airport_iata_inbound
// departure_airport_inbound
// arrival_airport_inbound
// departure_date_inbound
// arrival_date_inbound
// departure_time_inbound
// arrival_time_inbound
// carrier_iata_inbound
// carrier_inbound
// duration_inbound
// stops_inbound
// flight_number_inbound
// type_inbound
// adults
// children
// infants
// price
// currency
// status
// user_id