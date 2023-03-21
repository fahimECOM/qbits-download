@extends('frontend.partials.email')
@section('title','Support Ticket Close')
@section('content')
 
 <p style="margin-bottom: 1.5em;">Hello {{$fromName}},</p>
 <p style="margin-bottom: 1.5em;">We hope you are doing great. We have some good news for you! Kindly refer to your ticket <span style="color: #3490dc;">{{$Tracking}}</span>. Your reported issue has been resolved by our team and we are closing the ticket from our end. Thanks for your patience! Please check if you are still facing the issue. In case, the issue persists, you can reopen the ticket at any time. You can visit this link for further query <a href="http://myqbits.com/support/ticket/lists" style="text-decoration: none;color: #3490dc;" target="_blank">Link</a>.</p>

 <p style="margin-bottom: 0.25em;">Thank You</p>
 <p style="margin: 0;"><a href="https://www.myqbits.com" style="text-decoration: none;color: #444;"
        target="_blank">myqbits.com</a></p>

@endsection
