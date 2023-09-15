<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('social/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('social/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/language/{locale}', 'HomeController@set_locale')->name('set_locale');
Route::get('/currency/{currency}/', 'HomeController@set_currency')->name('set_currency');

Route::get('search/tickets', 'SearchController@index')->name('search.tickets');
Route::get('search/ticket', 'SearchController@show')->name('search.ticket');

Route::get('execute-payment/{id}', 'PaymentController@execute')->name('execute-payment');
Route::post('create-payment', 'PaymentController@create')->name('create-payment');

Route::get('contact', 'NewsletterController@showContactForm')->name('contact');
Route::post('contact', 'NewsletterController@contact')->name('contact');
Route::get('newsletter/subscribe', 'NewsletterController@subscribe')->name('newsletter.subscribe');

Route::middleware('auth')->group(function() {

    Route::get('profile', 'UserController@profile')->name('profile');
    Route::post('profile/update', 'UserController@profile_update')->name('profile.update');
    Route::get('bookings', 'UserController@bookings')->name('bookings');
    Route::get('booking/{id}', 'UserController@booking')->name('booking');

    Route::group([ 'prefix' => 'admin',  'middleware' => 'admin'], function() {

        Route::get('/', 'AdminController@dashboard')->name('dashboard');
        Route::get('tickets', 'TicketController@index')->name('admin.ticket.index');
        Route::get('ticket/{id}', 'TicketController@show')->name('admin.ticket.show');
        Route::get('percentage', 'AdminController@percentage_edit')->name('percentage.edit');
        Route::post('percentage', 'AdminController@percentage_update')->name('percentage.update');
    
    });
    
});

Route::get('success', function() {
    return view('success');
})->name('success');

Route::get('failed', function() {
    return view('failed');
})->name('failed');

Route::get('/privacy', function() {
    return view('about');
});

Route::get('/', function(){
    return view('homepage');
})->name('index');


Route::get('/pdff', function(){
    return view('pdf');
})->name('pdf');

Route::get('/pdftest', function(){
    $ticket = \App\Ticket::first();
    $outbound_flights = $ticket->flights()->where('type', 'outbound')->get();
        $inbound_flights = $ticket->flights()->where('type', 'inbound')->get();
        $passengers = $ticket->passengers()->get();

        $ticket->outbound_flights = $outbound_flights;
        $ticket->inbound_flights = $inbound_flights;
        $ticket->passengers = $passengers;
        
        $user = \App\User::find($ticket->user_id);

        view()->share(['ticket' => $ticket, 'user' => $user]);
    return view('pdf')->with('ticket', $ticket);
});
