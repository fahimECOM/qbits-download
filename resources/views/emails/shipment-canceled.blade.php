@extends('frontend.partials.email')
@section('title','Order Canceled')
@section('content')

<?php
 $today = date('F j, Y');

 // add 3 days to date
 $newDate=Date('F j, Y', strtotime('+3 days'));

 $baseURL = url('');
?>

<p style="margin-bottom: 1.5em;">Dear {{$name}},</p>
<p style="margin-bottom: 1.5em;">With reference to the order ID ({{$order}}), we would like to let you know that the order, which was supposed to be delivered between {{$today}} to {{$newDate}}, has been canceled due to out of stock.</p>
<p style="margin-bottom: 1.5em;">Also, we would like to let you know that our team is already working on the issue. You will receive an email as a confirmation of the re-shipment date at the earliest.</p>
<p style="margin-bottom: 1.5em;">You are requested to  track the status of your request at any time by visiting this link: <a href="{{$baseURL}}/order/details/{{$orderId}}" target="_blank">LINK</a></p>


<p style="margin-bottom: 0.25em;">Thanks for your patience!</p>
<p style="margin: 0;">Team Qbits</p>

@endsection