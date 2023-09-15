@extends('layouts.website')

@section('content')

<section id="top-offerts-profile">
	<div class="container">
		
		<div class="row">
			<div class="alert alert-success fade in" style="margin-top: 50px;">
        <a href="#" data-dismiss="alert"></a>
        @lang('strings.your_ticket_was_purchased_successfully')
    </div>
		</div>

		<div class="row">
			<div class="col-md-12 col-center-block" style="margin-top: 20px;">
				<img class="col-center-block" src="{{ asset('website/images/success.png') }}" alt="">
			</div>
			
		</div>
		

	</div>
</section>

@stop