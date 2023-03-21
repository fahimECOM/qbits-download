@extends('frontend.partials.email')
@section('title','Support Ticket')
@section('content')

<p style="margin-bottom: 1.5em;">Hello {{$fromName}},</p>
<p style="margin-bottom: 1.5em;">Thanks for reaching out to Qbits for support. A ticket has been created for your e-mail
    with the ticket number <b>{{$Tracking}}</b> Our customer service member will get back to you shortly and will keep
    you updated.</p>

<p>The support team already received your ticket <b>{{$Tracking}}</b> and working on its resolution. You will
    receive an email
    with an update on progress soon. </p>
<p>For further query go to this
    <a href="http://myqbits.com/support/ticket/{{$current_ticket_id}}" style="text-decoration: none;color: #3490dc;"
        target="_blank"> Link</a>
</p>

<p style="margin-bottom: 0.25em;">Thank You</p>
<p style="margin: 0;"><a href="https://www.myqbits.com" style="text-decoration: none;color: #444;"
        target="_blank">myqbits.com</a></p>

@endsection
