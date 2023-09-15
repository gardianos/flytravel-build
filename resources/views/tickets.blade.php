@extends('layouts.website')

@section('content')

<div class="clear"></div>
<section class="about-section-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title pull-left">
                    <h2 class="title-about">@lang('strings.search_results')</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="top-offerts" style="min-height:750px">
    <div class="container">
        <div class="row">

            <div class="col-sm-8 col-md-10 col-md-offset-1 effect-5 effects">
                
                <!--
                <div id="loader" style="margin:0; width:80px; height:80px"></div>-->

                <div class="main-switcher">
                    <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-list">
                        <!-- <div id="paypal-button"></div> -->
                        <ul id="Grid" class="sandbox list-fly">
                            
                            @if($result['type'] == 'return')
                                @foreach($result['tickets'] as $ticket)
                                <li class="mix category-1" style="display: inline-block;">
                                    <figure>
                                        <div class="cbp-vm-image img">
                                            <img src="http://pics.avs.io/87/57/{{ $ticket['outbound']['carrier_iata'] }}.png" alt="img01">
                                        </div>

                                        <figcaption>
                                            <h3>FR 6341</h3>
                                            <span>
                                                {{ $ticket['outbound']['departure_airport_iata'] }}
                                            </span>
                                            <span>
                                                {{ $ticket['outbound']['arrival_airport_iata'] }}
                                            </span>
                                            <div class="clear"></div>
                                            <span>
                                                {{ $ticket['outbound']['departure_time'] }}
                                            </span>
                                            <span>
                                                {{ $ticket['outbound']['arrival_time'] }}
                                            </span>
                                            <span>
                                                <i class="fa fa-clock-o"></i>
                                                <span>
                                                    {{ $ticket['outbound']['duration'] }}
                                                </span>
                                            </span>
                                            <div class="clear"></div>
                                            <div class="price-night">
                                                <span>
                                                    @if($ticket['outbound']['stops'] == 1)
                                                        {{ $ticket['outbound']['stops'] }} @lang('strings.stop')
                                                    @endif
                                                    @if($ticket['outbound']['stops'] > 1)
                                                        {{ $ticket['outbound']['stops'] }} @lang('strings.stops')
                                                    @endif                                                  
                                                </span>
                                                <span class="price-n"></span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                    <figure>
                                        <div class="cbp-vm-image img">
                                            <img src="http://pics.avs.io/87/57/{{ $ticket['inbound']['carrier_iata'] }}.png" alt="img01">
                                        </div>
                                        
                                        <figcaption>
                                            <h3>
                                                FR 6341
                                            </h3>
                                            <span>
                                                {{ $ticket['inbound']['departure_airport_iata'] }}
                                            </span>
                                            <span>
                                                {{ $ticket['inbound']['arrival_airport_iata'] }}
                                            </span>
                                            <div class="clear"></div>
                                            <span>
                                                {{ $ticket['inbound']['departure_time'] }}
                                            </span>
                                            <span>
                                                {{ $ticket['inbound']['arrival_time'] }}
                                            </span>
                                            <span>
                                                <i class="fa fa-clock-o"></i>
                                                <span>
                                                    {{ $ticket['inbound']['duration'] }}
                                                </span>
                                            </span>
                                            <div class="clear"></div>
                                            <div class="price-night">
                                                <span>
                                                    @if($ticket['inbound']['stops'] == 1)
                                                        {{ $ticket['inbound']['stops'] }} @lang('strings.stop')
                                                    @endif
                                                    @if($ticket['inbound']['stops'] > 1)
                                                        {{ $ticket['inbound']['stops'] }} @lang('strings.stops')
                                                    @endif                                          
                                                </span>
                                                <span class="price-n">
                                                    {{ session('currency') == 'EUR' ? '€' : '$' }}{{ $ticket['price'] }}
                                                </span>
                                            </div>
                                            <form action="{{ route('search.ticket') }}" method="get">
                                                
                                                <input type="hidden" name="departure_airport_iata_outbound" value="{{ $ticket['outbound']['departure_airport_iata'] }}">
                                                <input type="hidden" name="arrival_airport_iata_outbound" value="{{ $ticket['outbound']['arrival_airport_iata'] }}">
                                                <input type="hidden" name="departure_date_outbound" value="{{ $ticket['outbound']['departure_date'] }}">
                                                <input type="hidden" name="arrival_date_outbound" value="{{ $ticket['outbound']['arrival_date'] }}">
                                                <input type="hidden" name="departure_time_outbound" value="{{ $ticket['outbound']['departure_time'] }}">
                                                <input type="hidden" name="arrival_time_outbound" value="{{ $ticket['outbound']['arrival_time'] }}">
                                                <input type="hidden" name="duration_outbound" value="{{ $ticket['outbound']['duration'] }}">
                                                <input type="hidden" name="carrier_iata_outbound" value="{{ $ticket['outbound']['carrier_iata'] }}">
                                                <input type="hidden" name="stops_outbound" value="{{ $ticket['outbound']['stops'] }}">
                                                <input type="hidden" name="flight_number_outbound" value="{{ $ticket['outbound']['flight_number'] }}">

                                                <input type="hidden" name="departure_airport_iata_inbound" value="{{ $ticket['inbound']['departure_airport_iata'] }}">
                                                <input type="hidden" name="arrival_airport_iata_inbound" value="{{ $ticket['inbound']['arrival_airport_iata'] }}">
                                                <input type="hidden" name="departure_date_inbound" value="{{ $ticket['inbound']['departure_date'] }}">
                                                <input type="hidden" name="arrival_date_inbound" value="{{ $ticket['inbound']['arrival_date'] }}">
                                                <input type="hidden" name="departure_time_inbound" value="{{ $ticket['inbound']['departure_time'] }}">
                                                <input type="hidden" name="arrival_time_inbound" value="{{ $ticket['inbound']['arrival_time'] }}">
                                                <input type="hidden" name="duration_inbound" value="{{ $ticket['inbound']['duration'] }}">
                                                <input type="hidden" name="carrier_iata_inbound" value="{{ $ticket['inbound']['carrier_iata'] }}">
                                                <input type="hidden" name="stops_inbound" value="{{ $ticket['inbound']['stops'] }}">
                                                <input type="hidden" name="flight_number_inbound" value="{{ $ticket['inbound']['flight_number'] }}">
                                                <input type="hidden" name="origin" value="{{ $query['origin'] }}">
                                                <input type="hidden" name="destination" value="{{ $query['destination'] }}">
                                                <input type="hidden" name="departureDate" value="{{ $query['departureDate'] }}">
                                                @if(isset($query['returnDate']))
                                                <input type="hidden" name="returnDate" value="{{ $query['returnDate'] }}">
                                                @endif
                                                @if(isset($query['nonStop']))
                                                <input type="hidden" name="nonStop" value="{{ $query['nonStop'] }}">
                                                @endif
                                                <input type="hidden" name="adults" value="{{ $query['adults'] }}">
                                                <input type="hidden" name="children" value="{{ $query['children'] }}">
                                                <input type="hidden" name="infants" value="{{ $query['infants'] }}">
                                                <input type="hidden" name="currency" value="{{ session('currency') }}">
                                                <button type="submit" class="btn btn-primary btn-gallery buy-btn">@lang('strings.ticket_details')</button>
                                            </form>
                                        </figcaption>
                                    </figure>
                                </li>
                                @endforeach
                            @else
                                @foreach($result['tickets'] as $ticket)
                                <li class="mix category-1" style="display: inline-block;">
                                    <figure>
                                        <div class="cbp-vm-image img">
                                            <img src="http://pics.avs.io/87/57/{{ $ticket['carrier_iata'] }}.png" alt="img01">
                                        </div>
                                        
                                        <figcaption>
                                            <h3>
                                                FR 6341
                                            </h3>
                                            <span>
                                                {{ $ticket['departure_airport_iata'] }}
                                            </span>
                                            <span>
                                                {{ $ticket['arrival_airport_iata'] }}
                                            </span>
                                            <div class="clear"></div>
                                            <span>
                                                {{ $ticket['departure_time'] }}
                                            </span>
                                            <span>
                                                {{ $ticket['arrival_time'] }}
                                            </span>
                                            <span>
                                                <i class="fa fa-clock-o"></i>
                                                <span>
                                                    {{ $ticket['duration'] }}
                                                </span>
                                            </span>
                                            <div class="clear"></div>
                                            <div class="price-night">
                                                <span>
                                                    @if($ticket['stops'] == 1)
                                                        {{ $ticket['stops'] }} @lang('strings.stop')
                                                    @endif
                                                    @if($ticket['stops'] > 1)
                                                        {{ $ticket['stops'] }} @lang('strings.stops')
                                                    @endif
                                                </span>
                                                <span class="price-n">
                                                {{ session('currency') == 'EUR' ? '€' : '$' }}{{ $ticket['price'] }}
                                                </span>
                                            </div>
                                            <form action="{{ route('search.ticket') }}" method="get">
                                                <input type="hidden" name="departure_airport_iata" value="{{ $ticket['departure_airport_iata'] }}">
                                                <input type="hidden" name="arrival_airport_iata" value="{{ $ticket['arrival_airport_iata'] }}">
                                                <input type="hidden" name="departure_date" value="{{ $ticket['departure_date'] }}">
                                                <input type="hidden" name="arrival_date" value="{{ $ticket['arrival_date'] }}">
                                                <input type="hidden" name="departure_time" value="{{ $ticket['departure_time'] }}">
                                                <input type="hidden" name="arrival_time" value="{{ $ticket['arrival_time'] }}">
                                                <input type="hidden" name="duration" value="{{ $ticket['duration'] }}">
                                                <input type="hidden" name="carrier_iata" value="{{ $ticket['carrier_iata'] }}">
                                                <input type="hidden" name="stops" value="{{ $ticket['stops'] }}">
                                                <input type="hidden" name="flight_number" value="{{ $ticket['flight_number'] }}">
                                                <input type="hidden" name="origin" value="{{ $query['origin'] }}">
                                                <input type="hidden" name="destination" value="{{ $query['destination'] }}">
                                                <input type="hidden" name="departureDate" value="{{ $query['departureDate'] }}">
                                                @if(isset($query['returnDate']))
                                                <input type="hidden" name="returnDate" value="{{ $query['returnDate'] }}">
                                                @endif
                                                @if(isset($query['nonStop']))
                                                <input type="hidden" name="nonStop" value="{{ $query['nonStop'] }}">
                                                @endif
                                                <input type="hidden" name="adults" value="{{ $query['adults'] }}">
                                                <input type="hidden" name="children" value="{{ $query['children'] }}">
                                                <input type="hidden" name="infants" value="{{ $query['infants'] }}">
                                                <input type="hidden" name="currency" value="{{ session('currency') }}">
                                                <button type="submit" class="btn btn-primary btn-gallery buy-btn">@lang('strings.ticket_details')</button>
                                            </form>
                                        </figcaption>
                                    </figure>
                                </li>
                                @endforeach
                            @endif
                       
                        </ul>
                    </div>
                </div><!-- /main -->
            </div>
            <!--Close col 12 -->
        </div>
    </div>
</section>

@stop