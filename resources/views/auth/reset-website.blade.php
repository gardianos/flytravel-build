@extends('layouts.website')
@section('content')

<div class="login-page1">
        <div class="form">
        <img class="login-logo" src="{{ asset('website/images/logoslider.png') }} " alt="" />
    
            <form class="login-form" id="login-form" action="{{ route('login') }}" method="post">
            
            
                <input type="text" name="email" placeholder="email address"/>
                <input type="password" name="password" placeholder="password"/>
                <input type="password" name="password" placeholder="Confirm password"/>
                <button type="submit">Reset Password</button>
               

            </form>
            
        </div>
    </div>

@stop