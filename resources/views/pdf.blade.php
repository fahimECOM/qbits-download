<!DOCTYPE html>
<html>
<head>
<title>Laravel 8 PDF File Download using JQuery Ajax Request Example</title>
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<style type="text/css">

h2{
text-align: center;
font-size:22px;
margin-bottom:50px;
}
body{
background:#f2f2f2;
}
.section{
margin-top:30px;
padding:50px;
background:#fff;
}
.pdf-btn{
margin-top:30px;
}
.panel-heading {
    display: flex;
}
</style>
<body>
<div class="container">
<div class="col-md-8 section offset-md-2">
<div class="panel panel-primary">
<div class="panel-heading">
    <h2>Raw Material Entry Report</h2>
    <P>Date:
        <?php 
            date_default_timezone_set("Asia/Dhaka");
            echo date('M d, Y | h:i:s A');
        ?>
    </P>
</div>
<div class="panel-body">

<div class="main-div">
    <p><span style="font-weight: 900;font-size: 22px;">Total Raw Material Entry Request: </span>{{$total}} Pcs.</p>
<br>
    <p><span style="font-weight: 900;font-size: 22px;">Total Raw Material Successfully Entry : </span>{{count($success_list)}} Pcs.</p>
<br>
@if(count($invalid_list) > 0)
    <h5>Invalid Serial List ({{count($invalid_list)}} Pcs) :</h5>
    <div>
        <p>
            @foreach($invalid_list as $key=>$serial)
            <span>{{$serial}}</span>
            @if($key < (count($invalid_list)-1))
            &nbsp;&nbsp;&nbsp;
            @endif
            @endforeach
        </p>
    </div>
@endif
<br>
@if(count($exist_list) > 0)
    <h5>Already Exist Serial List ({{count($exist_list)}} Pcs) :</h5>
    <div>
        <p>
            @foreach($exist_list as $key=>$serial)
            <span>{{$serial}}</span>
            @if($key < (count($exist_list)-1))
            &nbsp;&nbsp;&nbsp;
            @endif
            @endforeach
        </p>
    </div>
@endif
</div>
</div>
</div>
</div>
</div>
</body>
</html>