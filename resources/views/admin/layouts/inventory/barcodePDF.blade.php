<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode Serial List</title>
</head>
<style>
    * {
        margin: 0.7px !important;
    }

    span {
        margin: 0 !important;
        padding: 0 !important;
    }

</style>

<body>


    <div style=" position: relative;">
        @foreach($barcodes as $key=>$barcode)
        @if($key == (count($barcodes)-1))
        <span style=" position: absolute; top: 10px !important;">{!!
            DNS1D::getBarcodeHTML($barcode,'C128',1,20,'black') !!}</span>
        <span
            style=" position: relative;margin-left: 50px !important; top: 0px !important; font-size: 8px;">{{$barcode}}</span>
        @else
        <span style=" position: absolute; top: 10px !important;">{!!
            DNS1D::getBarcodeHTML($barcode,'C128',1,20,'black') !!}</span>
        <span
            style=" position: relative;margin-left: 50px !important; top: -7px !important; font-size: 8px;">{{$barcode}}</span>
        @endif
        @endforeach
    </div>

</body>

</html>
