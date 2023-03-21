@extends('frontend.partials.email')
@section('title','Order Refund')
@section('content')

<p style="margin-bottom: 1.5em;">Dear {{$name}},</p>
<p style="margin-bottom: 1.5em;">Your order has been successfully refunded.</p>
<p style="margin-bottom: 1.5em;">Order Number: <span style="color: #3490dc;">{{$order}}</span></p>
<p style="margin-bottom: 1.5em;">Refund Amount: <span style="color: #3490dc;">&#2547;{{number_format($amount)}}</span></p>
<p style="margin-bottom: 1.5em;">If you have any questions, contact us here or call us on [02-58055541]!</p>

<p style="margin-bottom: 0.25em;">Thank You</p>
<p style="margin: 0;"><a href="https://www.myqbits.com" style="text-decoration: none;color: #444;"
        target="_blank">myqbits.com</a></p>

@endsection
