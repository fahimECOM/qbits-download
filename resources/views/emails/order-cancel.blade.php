@extends('frontend.partials.email')
@section('title','Order Cancel')
@section('content')

<p style="margin-bottom: 1.5em;">Dear {{$name}},</p>
<p style="margin-bottom: 1.5em;">With reference to the order ID ({{$order}}), we would like to let you know that your order has been canceled. We are really sorry to see you go, however, we appreciate your time. Thanks for giving us a try!</p>
<p style="margin-bottom: 1.5em;">For more information please visit: <a href="https://www.myqbits.com" target="_blank">Link</a></p>

<p style="margin-bottom: 0.25em;">Thank You,</p>
<p style="margin: 0;">Team Qbits</p>

@endsection
