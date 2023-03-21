@extends('frontend.partials.email')
@section('title','Order Placed')
@section('content')

<?php
$today = date('F j, Y');

// add 3 days to date
$newDate=Date('F j, Y', strtotime('+3 days'));
?>
<p style="margin-bottom: 1.5em;">Dear {{$name}},</p>
<p style="margin-bottom: 1.5em;">Your shipment is on its way. We are happy to inform you that the following item is ready to dispatch from our warehouse and will be delivered between {{$today}} to {{$newDate}}. Here are your shipment details and tracking information.</p>

<p style="margin-bottom: 1.5em;">Order ID: {{$order}}</p>
<p style="margin-bottom: 1.5em;">Tracking Number: <a href="#" style="text-decoration: none;" target="_blank">{{$order_tracking}}</a></p>

<p style="margin-bottom: 1.5em;">For more information please visit: <a href="https://www.myqbits.com" target="_blank">Link</a></p>

<p style="margin-bottom: 0.25em;">Thank You,</p>
<p style="margin: 0;">Team Qbits</p>

@endsection
