@extends('layouts.website')
@section('content')

<section class="block">

    <div class="container">
        <div class="row">
            <div class="col-md-3">

                 <nav class="nav nav-pills nav-stacked" style=" height: 150px;margin-top: 30px; border-top: 1px solid #adadad; border-bottom: 1px solid #adadad;">
                    <ul class="nav">
                    <li class="profile-list" role="presentation"><a href="{{ route('profile') }}"><i class="fa fa-cog"
                                    aria-hidden="true"></i> @lang('strings.profile')</a></li>

                        <li class="profile-list" role="presentation"><a href="{{ route('bookings') }}"><i class="fa fa-bookmark"
                                    aria-hidden="true"></i> @lang('strings.my_tickets')</a></li>
                        
                    </ul>
                </nav>

            </div>

            <div class="col-md-9">
                <section id="top-offerts-profile">
                    <div class="container">
                        <div class="row">

                            <div class="col-sm-8 effect-5 effects">
                                <!--
					                <div id="loader" style="margin:0; width:80px; height:80px"></div>-->

                                <div class="main-switcher">
                                    <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-list">
                                        <!-- <div id="paypal-button"></div> -->
                                        <ul id="Grid" class="sandbox list-fly">
										@foreach($tickets as $ticket)
                                            <li class="mix category-1" style="display: inline-block;">
                                                <figure>
                                                    <div class="cbp-vm-image img">
                                                        <img src="http://pics.avs.io/87/57/{{ $ticket->carrier_iata_outbound }}.png"
                                                            alt="img01">
                                                    </div>

                                                    <figcaption>
                                                        <h3>FR 6341</h3>
                                                        <span>
                                                            {{ $ticket->departure_airport_iata_outbound }}
                                                        </span>
                                                        <span>
                                                            {{ $ticket->arrival_airport_iata_outbound }}
                                                        </span>
                                                        <div class="clear"></div>
                                                        <span>
                                                            {{ $ticket->departure_time_outbound }}
                                                        </span>
                                                        <span>
                                                            {{ $ticket->arrival_time_outbound }}
                                                        </span>
                                                        <span>
                                                            <i class="fa fa-clock-o"></i>
                                                            <span>
                                                                {{ $ticket->duration_outbound }}
                                                            </span>
                                                        </span>
                                                        <div class="clear"></div>
                                                        <div class="price-night">
                                                            <span>
                                                                @if($ticket->stops_outbound == 1)
                                                                	{{ $ticket->stops_outbound }} stop
                                                                @endif
                                                                @if($ticket->stops_outbound > 1)
                                                                	{{ $ticket->stops_outbound }} stops
                                                                @endif
                                                            </span>
                                                            <span class="price-n">
																@if($ticket->type == 'oneway')
																	@if($ticket->currency == 'EUR')
                                                                        € {{ $ticket['price'] }}
                                                                    @elseif($ticket->currency == 'USD')
                                                                        $ {{ $ticket['price'] }}
                                                                    @else
                                                                        RSD {{ $ticket['price'] }}
                                                                    @endif
																@endif
															</span>
                                                        </div>
														@if($ticket->type == 'oneway')
															<a href="{{ route('booking', [$ticket->id, App::getLocale()]) }}" class="btn btn-primary btn-gallery">@lang('strings.ticket_details')</a>
														@endif
                                                    </figcaption>
                                                </figure>
												@if($ticket->type == 'return')
                                                <figure>
                                                    <div class="cbp-vm-image img">
                                                        <img src="http://pics.avs.io/87/57/{{ $ticket->carrier_iata_inbound }}.png"
                                                            alt="img01">
                                                    </div>

                                                    <figcaption>
                                                        <h3>
                                                            FR 6341
                                                        </h3>
                                                        <span>
                                                            {{ $ticket->departure_airport_iata_inbound }}
                                                        </span>
                                                        <span>
                                                            {{ $ticket->arrival_airport_iata_inbound }}
                                                        </span>
                                                        <div class="clear"></div>
                                                        <span>
                                                            {{ $ticket->departure_time_inbound }}
                                                        </span>
                                                        <span>
                                                            {{ $ticket->arrival_time_inbound }}
                                                        </span>
                                                        <span>
                                                            <i class="fa fa-clock-o"></i>
                                                            <span>
                                                                {{ $ticket->duration_inbound }}
                                                            </span>
                                                        </span>
                                                        <div class="clear"></div>
                                                        <div class="price-night">
                                                            <span>
                                                                @if($ticket->stops_inbound == 1)
                                                                	{{ $ticket->stops_inbound }} stop
                                                                @endif
                                                                @if($ticket->stops_inbound > 1)
                                                                	{{ $ticket->stops_inbound }} stops
                                                                @endif
                                                            </span>
                                                            <span class="price-n">
                                                                @if($ticket->currency == 'EUR')
                                                                    € {{ $ticket['price'] }}
                                                                @elseif($ticket->currency == 'USD')
                                                                    $ {{ $ticket['price'] }}
                                                                @else
                                                                    RSD {{ $ticket['price'] }}
                                                                @endif
                                                            </span>
                                                        </div>
                                                        <a href="{{ route('booking', [$ticket->id, App::getLocale()]) }}" class="btn btn-primary btn-gallery">@lang('strings.ticket_details')</a>
                                                    </figcaption>
                                                </figure>
												@endif
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </div><!-- /main -->
                            </div>
                            <!--Close col 12 -->
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
</section>

@stop
