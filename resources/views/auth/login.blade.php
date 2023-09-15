@extends('layouts.website')
@section('content')

    <div class="login-page1">
        <div class="form">

        
    <div><img class="login-logo" src="{{asset('flytravel-logo-menu11.png')}} " alt="" /></div>
            <form class="login-form" id="login-form" action="{{ route('login') }}" method="post">
                
                @if($errors->any())
                    <div class="alert alert-danger">@lang('strings.check_all_fields')</div>
                @endif
            
                @csrf
                <input type="text" name="email" placeholder="@lang('strings.email_address')"/>
                <input type="password" name="password" placeholder="@lang('strings.password')"/>
                <button style="margin-bottom:35px" type="submit">@lang('strings.login')</button>
                    
                <a href="{{ url('login/facebook') }}" style="margin-right:35px; font-size:2rem; color:#3C5A99">Facebook</a>
                <a href="{{ url('login/google') }}" style="font-size:2rem; color:#dd4b39">Google</a>
                
                <p class="message">@lang('strings.not_registered')? <a href="{{ route('register') }}">@lang('strings.create_account')</a></p>

            </form>
            
        </div>
    </div>

@stop