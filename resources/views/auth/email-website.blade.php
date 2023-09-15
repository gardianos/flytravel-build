@extends('layouts.website')
@section('content')

<div class="login-page1">
        <div class="form">
        <img class="login-logo" src="{{ asset('website/images/logoslider.png') }} " alt="" />
    
            <form class="login-form" id="login-form" action="{{ route('login') }}" method="post">
            
            
                <input type="text" name="email" placeholder="email address"/>
            
                <button type="submit">Send Password Reset Link</button>
              

            </form>
            
        </div>
    </div>

@stop