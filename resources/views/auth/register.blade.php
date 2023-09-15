@extends('layouts.website')
@section('content')

<!-- Section Form Login and Register -->
    <div class="login-page1">
        <div class="form">
        <div><img class="login-logo" src="{{asset('flytravel-logo-menu11.png')}} " alt="" /></div>

            <form class="register-form" id="register-form" action="{{ route('register') }}" method="post">

            @if($errors->any())
                    <div class="alert alert-danger">@lang('strings.check_all_fields')</div>
                @endif

                @csrf
                <input type="text" name="name" placeholder="@lang('strings.full_name')"/>
                <input type="text" name="email" placeholder="@lang('strings.email_address')"/>
                <input type="text" name="phone" placeholder="@lang('strings.phone_number')"/>
                <input type="password" name="password" placeholder="@lang('strings.password')"/>
                <input type="password" name="password_confirmation" placeholder="@lang('strings.confirm_password')"/>
                <button style="margin-bottom:35px;" type="submit">@lang('strings.register')</button>
                <a href="{{ url('login/facebook') }}" style="margin-right:35px; font-size:2rem; color:#3C5A99">Facebook</a>
                <a href="{{ url('login/google') }}" style="font-size:2rem; color:#dd4b39">Google</a>
                <p class="message">@lang('strings.already_registered')? <a href="{{ route('login') }}">@lang('strings.login')</a></p>

            </form>
        </div>
    </div>

@stop