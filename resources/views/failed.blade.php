@extends('layouts.website')

@section('content')

<section id="top-offerts-profile">
	<div class="container">
		
		<div class="row">
			<div class="alert alert-danger fade in" style="margin-top: 50px;">
        <a href="#" data-dismiss="alert"></a>
        <strong>Error!</strong> A <a href="#" class="alert-link">problem</a> has been occurred while submitting your data.
    </div>
		</div>

		<div class="row">
			<div class="col-md-12 col-center-block" style="margin-top: 20px;">
				<img class="col-center-block" src="{{ asset('website/images/failed.png') }}" alt="" style="height: 340px;">
			</div>
			
		</div>
		

	</div>
</section>

@stop