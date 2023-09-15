@extends('layouts.website')

@section('content')
<section class="map">

<div class="container text-center map">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

			@if(array_key_exists('outbound', $ticket))

				<div id="outbound">
					<span style="color:black"><strong>@lang('strings.outbound')</strong> <span>{{ $ticket['outbound']['departure_date'] }}</span></span>
					<div class="row well" style="padding-top:45px;">
						<div class="col-md-2">
							<img src="http://pics.avs.io/87/57/{{ $ticket['outbound']['carrier_iata'] }}.png" style="width: 40px;" alt="img01" />
						</div>
						<div class="col-md-8">
							<div class="row">
								<div class="col-md-4">
									<span style="color:black">{{ $ticket['outbound']['departure_time'] }}</span><br>
									<span style="color:black">{{ $ticket['outbound']['departure_airport_iata'] }}</span>
								</div>
								<div class="col-md-4">
									<span style="color:black">{{ $ticket['outbound']['duration'] }}</span>
									<ul class="airplane-itenerary">
										<li class="airplane-style"></li>
									</ul>
									<div>
										<span style="color:red;">
											@if($ticket['outbound']['stops'] == 1)
												{{ $ticket['stops'] }} @lang('strings.stop')
											@endif
											@if($ticket['outbound']['stops'] > 1)
												{{ $ticket['stops'] }} @lang('strings.stops')
											@endif
										</span>
									</div>
								</div>
								<div class="col-md-4">
									<span style="color:black">{{ $ticket['outbound']['arrival_time'] }}</span><br>
									<span style="color:black">{{ $ticket['outbound']['arrival_airport_iata'] }}</span>
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
								@foreach($ticket['outbound']['flights'] as $flight)
									<div class="well">
										<div class="row">
											<div class="col-md-2">
												<img src="{{ asset('website/images/fly/1.png') }} " style="width: 40px;" alt="img01" />
											</div>
											<div class="col-md-8">
												<span style="color:black;">{{ $flight['carrier'] }}</span>
											</div>
										</div>
										<div class="row" style="padding-top:25px">
											<div class="col-md-2">
												<div class="col-md-2 vertical">
													<div class="track"></div>
												</div>
												<div class="time">{{ $flight['departure_time'] }}</div><br><br>
												<div class="time">{{ $flight['arrival_time'] }}</div>
											</div>
											<div class="col-md-8">
												<div class="timeA">{{ $flight['departure_airport'] }}</div><br>
												<div class="timeA">{{ $flight['arrival_airport'] }}</div>
											</div>
										</div>
									</div>
								@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>


				<div id="inbound">
					<span style="color:black"><strong>@lang('strings.inbound')</strong> <span>{{ $ticket['inbound']['departure_date'] }}</span></span>
					<div class="row well" style="padding-top:45px;">
						<div class="col-md-2">
							<img src="http://pics.avs.io/87/57/{{ $ticket['inbound']['carrier_iata'] }}.png" style="width: 40px;" alt="img01" />
						</div>
						<div class="col-md-8">
							<div class="row">
								<div class="col-md-4">
									<span style="color:black">{{ $ticket['inbound']['departure_time'] }}</span><br>
									<span style="color:black">{{ $ticket['inbound']['departure_airport_iata'] }}</span>
								</div>
								<div class="col-md-4">
									<span style="color:black">{{ $ticket['inbound']['duration'] }}</span>
									<ul class="airplane-itenerary">
										<li class="airplane-style"></li>
									</ul>
									<div>
										<span style="color:red;">
											@if($ticket['inbound']['stops'] == 1)
												{{ $ticket['inbound']['stops'] }} @lang('strings.stop')
											@endif
											@if($ticket['inbound']['stops'] > 1)
												{{ $ticket['inbound']['stops'] }} @lang('strings.stops')
											@endif
										</span>
									</div>
								</div>
								<div class="col-md-4">
									<span style="color:black">{{ $ticket['inbound']['arrival_time'] }}</span><br>
									<span style="color:black">{{ $ticket['inbound']['arrival_airport_iata'] }}</span>
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
								@foreach($ticket['inbound']['flights'] as $flight)
									<div class="well">
										<div class="row">
											<div class="col-md-2">
												<img src="http://pics.avs.io/87/57/{{ $flight['carrier_iata'] }}.png" style="width: 40px;" alt="img01" />
											</div>
											<div class="col-md-8">
												<span style="color:black;">{{ $flight['carrier'] }}</span>
											</div>
										</div>
										<div class="row" style="padding-top:25px">
											<div class="col-md-2">
												<div class="col-md-2 vertical">
													<div class="track"></div>
												</div>
												<div class="time">{{ $flight['departure_time'] }}</div><br><br>
												<div class="time">{{ $flight['arrival_time'] }}</div>
											</div>
											<div class="col-md-8">
												<div class="timeA">{{ $flight['departure_airport'] }}</div><br>
												<div class="timeA">{{ $flight['arrival_airport'] }}</div>
											</div>
										</div>
									</div>
								@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
				
			@else

				<div id="inbound">
					<span style="color:black"><strong>@lang('strings.outbound')</strong> <span>{{ $ticket['departure_date'] }}</span></span>
					<div class="row well" style="padding-top:45px;">
						<div class="col-md-2">
							<img src="http://pics.avs.io/87/57/{{ $ticket['carrier_iata'] }}.png" style="width: 40px;" alt="img01" />
						</div>
						<div class="col-md-8">
							<div class="row">
								<div class="col-md-4">
									<span style="color:black">{{ $ticket['departure_time'] }}</span><br>
									<span style="color:black">{{ $ticket['departure_airport_iata'] }}</span>
								</div>
								<div class="col-md-4">
									<span style="color:black">{{ $ticket['duration'] }}</span>
									<ul class="airplane-itenerary">
										<li class="airplane-style"></li>
									</ul>
									<div>
										<span style="color:red;">
											@if($ticket['stops'] == 1)
												{{ $ticket['stops'] }} @lang('strings.stop')
											@endif
											@if($ticket['stops'] > 1)
												{{ $ticket['stops'] }} @lang('strings.stops')
											@endif
										</span>
									</div>
								</div>
								<div class="col-md-4">
									<span style="color:black">{{ $ticket['arrival_time'] }}</span><br>
									<span style="color:black">{{ $ticket['arrival_airport_iata'] }}</span>
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
								@foreach($ticket['flights'] as $flight)
									<div class="well">
										<div class="row">
											<div class="col-md-2">
												<img src="http://pics.avs.io/87/57/{{ $flight['carrier_iata'] }}.png " style="width: 40px;" alt="img01" />
											</div>
											<div class="col-md-8">
												<span style="color:black;">{{ $flight['carrier'] }}</span>
											</div>
										</div>
										<div class="row" style="padding-top:25px">
											<div class="col-xs-3 col-sm-3 col-md-2">
												<div class="col-md-2 vertical">
													<div class="track"></div>
												</div>
												<div class="time">{{ $flight['departure_time'] }}</div><br><br>
												<div class="time">{{ $flight['arrival_time'] }}</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-8">
												<div class="timeA">{{ $flight['departure_airport'] }}</div><br>
												<div class="timeA">{{ $flight['arrival_airport'] }}</div>
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
		
		@foreach($errors->all() as $error)
			{{ $error }}
		@endforeach

        <div class="col-md-8 col-md-offset-2 text-center">

            <div class="payment-forms">

                <form action="{{ route('create-payment') }}" method="post" id="payment-form">
					@csrf
					@auth
						<div class="panel panel-default credit-card-box payment-form">
							<div class="panel-heading display-table">
								<div class="row display-tr">
									<h3>Your info:</h3>
									<div class="input-group hide" style="margin: 0 auto; float: none;">
										<div class="clearBoth"></div>
										<input type="radio" class="required" name="register" value="1" style="margin: 0 5px;cursor: pointer;">
										@lang('strings.register')
										<input type="radio" class="required" name="register" value="0" style="margin: 0 5px 0 35px;cursor: pointer;" checked>
										@lang('strings.do_not_register')
										<div class="clearBoth"></div>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<div class="row" style="margin-top:12px">
									<div class="col-sm-6 col-sm-offset-3">
										<label>@lang('strings.full_name')</label>
										<div class="input-group">
											<span class="input-group-addon" id="basic-addon1"></span>
											<input type="text" class="form-control required"
												aria-describedby="basic-addon1" name="name" value="{{ Auth::user()->name }}" readonly>
										</div>
									</div>
								</div>
							</div>
						</div>
					@else
						<div class="panel panel-default credit-card-box payment-form">
							<div class="panel-heading display-table">
								<div class="row display-tr">
									<div class="col">
										<label></label>
										<div class="input-group" style="margin: 0 auto; float: none;">
											<div class="clearBoth"></div>
											<input type="radio" class="required" name="register" value="1" style="margin: 0 5px;cursor: pointer;">
											@lang('strings.register')
											<input type="radio" class="required" name="register" value="0" style="margin: 0 5px 0 35px;cursor: pointer;" checked>
											@lang('strings.do_not_register')
											<div class="clearBoth"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-6 col-sm-offset-3">
										<label>@lang('strings.email_address')</label>
										<div class="input-group">
											<span class="input-group-addon" id="basic-addon1"></span>
											<input type="text" class="form-control required"
												aria-describedby="basic-addon1" name="email">
										</div>
									</div>
								</div>
								<div class="row hide" id="ticket-password" style="margin-top:12px">
									<div class="col-sm-6">
										<label>@lang('strings.password')</label>
										<div class="input-group">
											<span class="input-group-addon" id="basic-addon1"></span>
											<input type="text" class="form-control required"
												aria-describedby="basic-addon1" name="password">
										</div>
									</div>
									<div class="col-sm-6">
										<label>@lang('strings.confirm_password')</label>
										<div class="input-group">
											<span class="input-group-addon" id="basic-addon1"></span>
											<input type="text" class="form-control required"
												aria-describedby="basic-addon1" name="password_confirmation">
										</div>
									</div>
								</div>
								
							</div>
						</div>
					@endauth
					@for ($i = 0; $i < $passenger_count; $i++)
						<div class="panel panel-default credit-card-box payment-form">
							<div class="panel-heading display-table">
								<div class="row display-tr">
									<h3 class="panel-title display-td">@lang('strings.passenger') {{ $i + 1 }}</h3>
								</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-6">
										<label>@lang('strings.first_name')</label>
										<div class="input-group">
											<span class="input-group-addon" id="basic-addon1"></span>
											<input type="text" class="form-control required"
												aria-describedby="basic-addon1" name="passenger[{{ $i }}][first_name]">
										</div>
									</div>
									<div class="col-sm-6">
										<label>@lang('strings.last_name')</label>
										<div class="input-group">
											<span class="input-group-addon" id="basic-addon1"></span>
											<input type="text" class="form-control required"
												aria-describedby="basic-addon1" name="passenger[{{ $i }}][last_name]">
										</div>
									</div>
								</div>
								<div class="row mt-2">
									<div class="col-sm-6">
										<label>@lang('strings.gender')</label>
										<div class="input-group" style="margin: 0 auto; float: none;">
											<div class="clearBoth"></div>
											<input type="radio" class="required" name="passenger[{{ $i }}][gender]" value="male" style="margin-left: 20px;cursor: pointer;">&nbsp;<span
												style="color:black;margin-right: 20px;">@lang('strings.male')</span>
											<input type="radio"  class="required" name="passenger[{{ $i }}][gender]" value="female" style="cursor: pointer;">&nbsp;<span
												style="color:black;margin-right: 20px;">@lang('strings.female')</span>
											<div class="clearBoth"></div>
										</div>
									</div>
									<div class="col-sm-6">
										<label>@lang('strings.birthday')</label>
										<div class="input-group">
											<span class="input-group-addon" id="basic-addon1"></span>
											<input type="date" class="form-control required"
												aria-describedby="basic-addon1" name="passenger[{{ $i }}][birthday]">
										</div>
									</div>
								</div>
								<div class="row mt-2">
									<div class="col-sm-12">
										<label>@lang('strings.nationality')</label>
										<div class="input-group">
											<span class="input-group-addon" id="basic-addon1"></span>
											<input type="text" class="form-control required"
												aria-describedby="basic-addon1" name="passenger[{{ $i }}][nationality]">
										</div>
									</div>
								</div>
								<div class="row" id="ticket-password" style="margin-top:12px">
									<div class="col-sm-6">
										<label>@lang('strings.passport_id')</label>
										<div class="input-group">
											<span class="input-group-addon" id="basic-addon1"></span>
											<input type="text" class="form-control required"
												aria-describedby="basic-addon1" name="passenger[{{ $i }}][passport_id]">
										</div>
									</div>
									<div class="col-sm-6">
										<label>@lang('strings.passport_expiry_date')</label>
										<div class="input-group">
											<span class="input-group-addon" id="basic-addon1"></span>
											<input type="text" class="form-control required"
												aria-describedby="basic-addon1" name="passenger[{{ $i }}][passport_expiry_date]">
										</div>
									</div>
								</div>
							</div>
						</div>
					@endfor
					@if(array_key_exists('outbound', $ticket))
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
					@else
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
					@endif
					<button type="submit" class="btn btn-primary btn-large btn-block payment-btn">@lang('strings.pay_ticket')</button>
                </form>
            </div>
	

        </div>

    </div>
</div>
</section>

@stop
