@extends('frontend.partials.email')
@section('title','Lania Preorder')
@section('content')

<p style="margin-bottom: 1.5em;color:rgb(20, 20, 20);">Hi Qbits team,</p>
<p style="margin-bottom: 1.5em;color:rgb(20, 20, 20);">New Pre-Order Request of Lania PC By Customer.</p>
<p style="margin-bottom: 1.5em;">Customer Name: <span style="color: #3490dc;">{{$data['name']}}</span></p>
<p style="margin-bottom: 1.5em;">Customer Phone: <span style="color: #3490dc;">{{$data['phone']}}</span></p>
<p style="margin-bottom: 1.5em;">Customer Email: <span style="color: #3490dc;">{{$data['email']}}</span></p>

<p style="margin-bottom: 0.25em;">Thanks,</p>
<p style="margin: 0;">Qbits Tech Team</p>
@endsection
