@extends('frontend.partials.email')
@section('title','Qbits Login Credentials')
@section('content')

<p style="margin-bottom: 1.5em;">Dear {{$fromName}},</p>
<p style="margin-bottom: 1.5em;">We assign you with some role in our Qbits Software. Please login your account using these credentials & also you can reset your password after login.</p>
<p style="margin-bottom: 1.5em;">Login Email: <span
        style="color: #3490dc;font-size: 18px;font-weight: 900;">{{$fromEmail}}</span></p>
<p style="margin-bottom: 1.5em;">Login Password: <span
        style="color: #3490dc;font-size: 18px;font-weight: 900;">{{$fromPass}}</span></p>
<p style="margin-bottom: 1.5em;">Use these credentials for login your Qbits account.</p>

<p style="margin-bottom: 0.25em;">Thank You</p>
<p style="margin: 0;"><a href="https://www.myqbits.com" style="text-decoration: none;color: #444;"
        target="_blank">myqbits.com</a></p>
@endsection