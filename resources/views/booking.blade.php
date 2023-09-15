@extends('layouts.website')

@section('content')
<section class="map">

    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <nav class="nav nav-pills nav-stacked" style=" height: 150px;margin-top: 30px; border-top: 1px solid #adadad; border-bottom: 1px solid #adadad;">
                    <ul class="nav">
                        <li class="profile-list" role="presentation"><a href="{{ route('profile') }}"><i class="fa fa-cog"
                                    aria-hidden="true"></i> @lang('strings.profile')</a></li>

                        <li class="profile-list" role="presentation"><a href="{{ route('bookings') }}"><i class="fa fa-bookmark"
                                    aria-hidden="true"></i> @lang('strings.my_tickets')</a></li>
                        
                    </ul>
                </nav>
            </div>
            <div class="col-md-10">

                <div class="col-md-12">

                    <div id="outbound">
                        <span style="color:black"><strong>@lang('strings.outbound')</strong> <span>{{ $ticket->departure_date_outbound
                                }}</span></span>
                        <div class="row well" style="padding-top:45px;">
                            <div class="col-md-2">
                                <img src="http://pics.avs.io/87/57/{{ $ticket->carrier_iata_outbound }}.png" style="width: 40px;"
                                    alt="img01" />
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span style="color:black">{{ $ticket->departure_time_outbound }}</span><br>
                                        <span style="color:black">{{ $ticket->departure_airport_iata_outbound }}</span>
                                    </div>
                                    <div class="col-md-4" style="overflow: hidden; text-align: center;">
                                        <span style="color:black; display: inline-block;margin: 10px 10px 0 0;">{{ $ticket->duration_outbound }}</span>
                                        <ul class="airplane-itenerary">
                                            <li class="airplane-style"></li>
                                        </ul>
                                        <div>
                                            <span style="color:red;">
                                                @if($ticket->stops_outbound == 1)
                                                {{ $ticket->stops_outbound }} stop
                                                @endif
                                                @if($ticket->stops_outbound > 1)
                                                {{ $ticket->stops_outbound }} stops
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <span style="color:black">{{ $ticket->arrival_time_outbound }}</span><br>
                                        <span style="color:black">{{ $ticket->arrival_airport_outbound_iata }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <img class="outbound-flights-arrow" src="{{asset('website/assets/angle-arrow-down.png')}}"
                                    style="padding-top:17.5px;cursor: pointer;">
                            </div>
                            <div class="row" style="padding-top:65px">
                                <div class="col-md-12">
                                    <div class="hide outbound-flights">
                                        @foreach($ticket->outbound_flights as $flight)
                                        <div class="well">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img src="http://pics.avs.io/87/57/{{ $flight->carrier_iata }}.png"
                                                        style="width: 40px;" alt="img01" />
                                                </div>
                                                <div class="col-md-8">
                                                    <span style="color:black;">{{ $flight->carrier }}</span>
                                                </div>
                                            </div>
                                            <div class="row" style="padding-top:25px">
                                                <div class="col-md-2">
                                                    <div class="col-md-2 vertical">
                                                        <div class="track"></div>
                                                    </div>
                                                    <div class="time">{{ $flight->departure_time }}</div><br><br>
                                                    <div class="time">{{ $flight->arrival_time }}</div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="timeA">{{ $flight->departure_airport }}</div><br>
                                                    <div class="timeA">{{ $flight->arrival_airport }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($ticket->type == 'return')
                    <div id="inbound">
                        <span style="color:black"><strong>@lang('strings.inbound')</strong> <span>{{ $ticket->departure_date_inbound }}</span></span>
                        <div class="row well" style="padding-top:45px;">
                            <div class="col-md-2">
                                <img src="http://pics.avs.io/87/57/{{ $ticket->carrier_iata_inbound }}.png" style="width: 40px;"
                                    alt="img01" />
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span style="color:black">{{ $ticket->departure_time_inbound }}</span><br>
                                        <span style="color:black">{{ $ticket->departure_airport_iata_inbound }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <span style="color:black">{{ $ticket->duration_inbound }}</span>
                                        <ul class="airplane-itenerary">
                                            <li class="airplane-style"></li>
                                        </ul>
                                        <div>
                                            <span style="color:red;">
                                                @if($ticket->stops_inbound == 1)
                                                {{ $ticket->stops_inbound }} stop
                                                @endif
                                                @if($ticket->stops_inbound > 1)
                                                {{ $ticket->stops_inbound }} stops
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <span style="color:black">{{ $ticket->arrival_time_inbound }}</span><br>
                                        <span style="color:black">{{ $ticket->arrival_airport_inbound_iata }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <img class="inbound-flights-arrow" src="{{asset('website/assets/angle-arrow-down.png')}}"
                                    style="padding-top:17.5px;cursor: pointer;">
                            </div>
                            <div class="row" style="padding-top:65px">
                                <div class="col-md-12">
                                    <div class="hide inbound-flights">
                                        @foreach($ticket->inbound_flights as $flight)
                                        <div class="well">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img src="http://pics.avs.io/87/57/{{ $flight->carrier_iata }}.png "
                                                        style="width: 40px;" alt="img01" />
                                                </div>
                                                <div class="col-md-8">
                                                    <span style="color:black;">{{ $flight->carrier }}</span>
                                                </div>
                                            </div>
                                            <div class="row" style="padding-top:25px">
                                                <div class="col-md-2">
                                                    <div class="col-md-2 vertical">
                                                        <div class="track"></div>
                                                    </div>
                                                    <div class="time">{{ $flight->departure_time }}</div><br><br>
                                                    <div class="time">{{ $flight->arrival_time }}</div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="timeA">{{ $flight->departure_airport }}</div><br>
                                                    <div class="timeA">{{ $flight->arrival_airport }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>

                <div class="col-md-12 text-left">
                    @foreach($ticket->passengers as $passenger)
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td colspan="1">
                                    <form class="well form-horizontal">
                                        <fieldset>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">@lang('strings.first_name') :</label>
                                                <div class="col-md-8 inputGroupContainer">
                                                    <div class="input-group">
                                                        <p class="p">{{ $passenger->first_name }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">@lang('strings.last_name') :</label>
                                                <div class="col-md-8 inputGroupContainer">
                                                    <div class="input-group">
                                                        <p class="p">{{ $passenger->last_name }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">@lang('strings.gender') :</label>
                                                <div class="col-md-8 inputGroupContainer">
                                                    <div class="input-group">
                                                        <p class="p">{{ $passenger->gender }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">@lang('strings.birthday') :</label>
                                                <div class="col-md-8 inputGroupContainer">
                                                    <div class="input-group">
                                                        <p class="p">{{ $passenger->birthday }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">@lang('strings.nationality') :</label>
                                                <div class="col-md-8 inputGroupContainer">
                                                    <div class="input-group">
                                                        <p class="p">{{ $passenger->nationality }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </fieldset>
                                    </form>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                    @endforeach
                </div>

            </div>

        </div>
    </div>
</section>


@stop
