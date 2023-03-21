@extends('frontend.partials.email')
@section('title','Order Canceled')
@section('content')

<p style="margin-bottom: 1.5em;">Dear {{$name}},</p>
<p style="margin-bottom: 1.5em;">We have received the refund request. This email is a notification to confirm that your refund request is being processed.  Qbits team will scrutinize the issue you mentioned and refund as per Qbits refund policy. The refund request can be canceled for any violation of Qbits return and refund policy.</p>
<p style="margin-bottom: 1.5em;">For more information please visit: <a href="https://www.myqbits.com" target="_blank">Link</a></p>

<p style="margin-bottom: 0.25em;">Thank You,</p>
<p style="margin: 0;">Team Qbits</p>

@endsection
