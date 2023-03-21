@extends('frontend.partials.email')
@section('title','Support Ticket')
@section('content')

<p style="margin-bottom: 1.5em;">Hi,</p>
<p style="margin-bottom: 1.5em;">A new ticket has been created with ID: <strong>{{$Tracking}}</strong>.</p>
<strong>Nmae:</strong> {{$fromName}}<br>
<strong>Email:</strong> {{$fromEmail}}<br>
<strong>Problem:</strong> {{$subject}}<br>
<strong>Status:</strong> <span style="color: green;">{{$status}}</span><br>
<strong>Messsage:</strong> {{$body}}</p>
<p style="margin-bottom: 1.5em;">Please respond to it as soon as possible.</p>

<p style="margin-bottom: 0.25em;">Thank You</p>
<p style="margin: 0;"><a href="https://www.myqbits.com" style="text-decoration: none;color: #444;"
        target="_blank">myqbits.com</a></p>

@endsection
