@extends('layouts.website')
@section('content')

<section class="block">

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                 <nav class="nav nav-pills nav-stacked" style=" height: 150px;margin-top: 30px; border-top: 1px solid #adadad; border-bottom: 1px solid #adadad;">
                    <ul class="nav">
                        <li class="profile-list" role="presentation"><a href="{{ route('profile', App::getLocale()) }}"><i class="fa fa-cog"
                                    aria-hidden="true"></i> @lang('strings.profile')</a></li>

                        <li class="profile-list" role="presentation"><a href="{{ route('bookings', App::getLocale()) }}"><i class="fa fa-bookmark"
                                    aria-hidden="true"></i> @lang('strings.my_tickets')</a></li>
                        
                    </ul>
                </nav>
            </div>

        <div class="col-md-9">
            <div class="container">
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">

        <form action="{{ route('profile.update') }}" class="form-horizontal" role="form" method="post">
        @csrf
          <div class="form-group">
            <label class="col-lg-3 control-label">@lang('strings.first_name'):</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="{{ $user->name }}" name="name">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">@lang('strings.email_address'):</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="{{ $user->email }}" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">@lang('strings.phone_number'):</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="{{ $user->phone }}" name="phone">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">@lang('strings.new_password'):</label>
            <div class="col-lg-8">
              <input class="form-control" type="password" name="password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">@lang('strings.confirm_new_password'):</label>
            <div class="col-lg-8">
              <input class="form-control" type="password" name="password_confirmation">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Save Changes">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>

        </div>



        </div>
    </div>
</section>

@stop
