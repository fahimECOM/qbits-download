@extends('frontend.partials.email')
@section('title','verification Code')
@section('content')

<p style="margin-bottom: 1.5em;">Dear Customer,</p>
<p style="margin-bottom: 1.5em;">We just need to verify your email address before you can access Qbits Online Service.
    To complete your Account Verification use the following code.</p>
<p style="margin-bottom: 1.5em;">Code: <span
        style="color: #3490dc;font-size: 18px;font-weight: 900;">{{$verification_code}}</span></p>
<p style="margin-bottom: 1.5em;">Enter this code on our website to activate your account.</p>

<p style="margin-bottom: 0.25em;">Thank You</p>
<p style="margin: 0;"><a href="https://www.myqbits.com" style="text-decoration: none;color: #444;"
        target="_blank">myqbits.com</a></p>
@endsection
