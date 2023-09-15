@extends('layouts.admin')

@section('content')


<div class="row">
    <div class="col-lg-8 mx-md-auto">
        
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Buyer</h4>
            </div>
            <div class="card-body">
                <form class="form-horizontal" role="form">
                    <div class="form-body">
                        <div class="row pt-4">
                            <div class="col-md-6">
                                <div class="form-group row mb-2">
                                    <label class="control-label text-right col-md-3">Name:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> {{ $ticket->name }} </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row mb-2">
                                    <label class="control-label text-right col-md-3">Email:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> {{ $ticket->email }} </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row pt-4">
                            <div class="col-md-6 mx-auto">
                                <div class="form-group row mb-2">
                                    <label class="control-label text-right col-md-3">Phone:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> {{ $ticket->phone }} </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                    </div>

                </form>
            </div>
        </div>
        
    </div>
</div>


<div class="row">
    <div class="col-lg-8 mx-md-auto">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Ticket</h4>
            </div>
            <div class="card-body">
                <div class="col-md-8 mx-md-auto">

                    <div id="outbound">
                        <span style="color:black"><strong>Outbound</strong> <span>{{ $ticket->departure_date_outbound }}</span></span>
                        <div class="row well" style="padding-top:45px;">
                            <div class="col-md-2">
                                <img src="http://pics.avs.io/87/57/{{ $ticket->carrier_iata_outbound }}.png" style="width: 40px;" alt="img01" />
                            </div>
                            <div class="col-md-8 text-center">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span style="color:black">{{ $ticket->departure_time_outbound }}</span><br>
                                        <span style="color:black">{{ $ticket->departure_airport_iata_outbound }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <span style="color:black">{{ $ticket->duration_outbound }}</span>
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

                            <div class="col-md-12">
                                <h4><strong>Price :</strong> {{ $ticket->price }} {{ $ticket->currency }}</h4>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="hide outbound-flights">
                                @foreach($ticket->outbound_flights as $flight)
                                    <div class="outbound-flight well">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img src="http://pics.avs.io/87/57/{{ $flight->carrier_iata }}.png" style="width: 40px;"
                                                    alt="img01" />
                                            </div>
                                            <div class="col-md-8">
                                                <span style="color:black;">{{ $flight->carrier }}</span>
                                            </div>
                                        </div>
                                        <div class="row content">
                                            <div class="col-md-2 duration">{{ $flight->duration }}</div>
                                            <div class="content-1">
                                                <div class="col-md-2 vertical">
                                                    <div class="track"></div>
                                                </div>
                                                <div class="segments">
                                                    <div class="time">{{ $flight->departure_time }}</div><br><br>
                                                    <div class="time">{{ $flight->arrival_time }}</div>
                                                </div>
                                                <div class="text-center">
                                                    <div class="timeA">{{ $flight->departure_airport }}</div><br>
                                                    <div class="timeA">{{ $flight->arrival_airport }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                    @if($ticket->type == 'return')
                    <div id="inbound">
                        <span style="color:black"><strong>Inbound</strong> <span>{{ $ticket->departure_date_inbound }}</span></span>
                        <div class="row well" style="padding-top:45px;">
                            <div class="col-md-2">
                                <img src="http://pics.avs.io/87/57/{{ $ticket->carrier_iata_inbound }}.png" style="width: 40px;" alt="img01" />
                            </div>
                            <div class="col-md-8 text-center">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span style="color:black" id="outbound-departure-time">{{ $ticket->departure_time_inbound }}</span><br>
                                        <span style="color:black" id="outbound-origin-airport-iata">{{ $ticket->departure_airport_iata_inbound }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <span style="color:black" id="outbound-duration">{{ $ticket->duration_inbound }}</span>
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

                            <div class="col-md-12 text-center">
                                <div class="hide inbound-flights">
                                @foreach($ticket->inbound_flights as $flight)
                                    <div class="inbound-flight well">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img src="http://pics.avs.io/87/57/{{ $flight->carrier_iata }}.png " style="width: 40px;"
                                                    alt="img01" />
                                            </div>
                                            <div class="col-md-8">
                                                <span style="color:black;">{{ $flight->carrier }}</span>
                                            </div>
                                        </div>
                                        <div class="row content">
                                            <div class="col-md-2 duration">{{ $flight->duration }}</div>
                                            <div class="content-1">
                                                <div class="col-md-2 vertical">
                                                    <div class="track"></div>
                                                </div>
                                                <div class="segments">
                                                    <div class="time">{{ $flight->departure_time }}</div><br><br>
                                                    <div class="time">{{ $flight->arrival_time }}</div>
                                                </div>
                                                <div class="text-center">
                                                    <div class="timeA">{{ $flight->departure_airport }}</div><br>
                                                    <div class="timeA">{{ $flight->arrival_airport }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>


</div>

<div class="row">
    <div class="col-lg-8 mx-md-auto">
        @foreach($ticket->passengers as $passenger)
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Passenger</h4>
            </div>
            <div class="card-body">
                <form class="form-horizontal" role="form">
                    <div class="form-body">
                        <!-- <h3 class="box-title">Person Info</h3>-->
                        <hr class="m-t-0 m-b-40">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">First Name:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> {{ $passenger->first_name }} </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Laste Name:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> {{ $passenger->last_name }} </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            

                        </div>
                        <!--/row-->
                        <div class="row">
                        <!--/span-->
                        <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Gender:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> {{ $passenger->gender }} </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Date of Birth:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> {{ $passenger->birthday }} </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                           
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Nacionality:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> {{ $passenger->nationality }} </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->

                        </div>
                    </div>

                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>

@stop
