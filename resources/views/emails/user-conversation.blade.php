@extends('frontend.partials.email')
@section('title','Support Ticket')
@section('content')

  <p style="margin-bottom: 1.5em;">
    Status: <span style="color: green">{{$status}}</span> <br>
    Tracking number: <span style="color: #3490dc;">{{$Tracking}}</span>
  </p>  
  <p style="margin-bottom: 1.5em;">Hello {{$fromName}},</p>
  <p style="margin-bottom: 1.5em;">We wanted to send the update to you about the status of your request. It is still in progress and is being worked on by our support team. We’re prioritising your request, and will make sure this issue is resolved over the weekend. You will get notified immediately once it’s done.
    You can also track the status of your request any time by visiting this <a href="http://myqbits.com/support/ticket/lists" style="text-decoration: none;color: #3490dc;" target="_blank">Link</a>.</p>
  <p style="margin-bottom: 1.5em;">Thanks for your patience!<br>
    Have a great weekend. </p>

@endsection