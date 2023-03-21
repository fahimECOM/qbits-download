@extends('frontend.partials.email')
@section('title','Promo Code')
@section('content')

<p style="margin-bottom: 1.5em;">Dear Customer,</p>
<p style="margin-bottom: 1.5em;">Thanks for your next purchase!</p>
<p style="margin-bottom: 1.5em;">As a token of appreciation, we would like to offer a discount coupon for your next
    purchase in our Qbits Online Store. You have received a coupon code. Enjoy 5% off!</p>
<p style="margin-bottom: 1.5em;">Promo Code: <span style="color: #3490dc;">{{$coupon}}</span></p>

<p style="margin-bottom: 0.25em;">Thank You</p>
<p style="margin: 0;"><a href="https://www.myqbits.com" style="text-decoration: none;color: #444;"
        target="_blank">myqbits.com</a></p>

@endsection
