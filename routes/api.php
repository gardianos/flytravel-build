<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'Api\AuthController@login');
Route::post('/register', 'Api\AuthController@register');
Route::post('/social', 'Api\AuthController@social');

Route::get('search/tickets', 'Api\SearchController@index');

Route::get('tickets', 'Api\TicketController@index');
Route::get('ticket/{id}', 'Api\TicketController@show');
Route::get('ticket/approve/{id}', 'Api\TicketController@approve');
Route::get('tickets/user/{id}', 'Api\TicketController@user');
Route::post('ticket', 'Api\TicketController@store');

Route::post('test', 'Api\TicketController@test');

Route::get('user/{id}', function($id) {
    return App\User::find($id);
});
