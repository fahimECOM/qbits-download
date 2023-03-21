<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D-Cover Lasering</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    img {
        margin: 0;
        padding: 0;
    }

</style>



<body>
   <div class="container-png" id="container-png">
        @if($prod_id == '1')
            <img src="{{public_path('leaser/model-S15-5F5G-old.svg')}}" alt="Sigma 15" style=" width: 13.322%;" />
            @elseif($prod_id == '2')
            <img src="{{public_path('leaser/model-S15-613G.svg')}}" alt="Sigma 15" style=" width: 13.322%;" />
            @elseif($prod_id == '3' || $prod_id == '4')
            <img src="{{public_path('leaser/model-S15-631G.svg')}}" alt="Sigma 15" style=" width: 13.322%;" />
            @endif
            <div style=" position: relative;">
                <span style=" position: absolute; left:72px; bottom: 34px !important;">{!!
                    DNS1D::getBarcodeHTML($barcodes,'C128',1.4,36,'black') !!}</span>
                <span
                    style="position: relative;margin-left: 140px !important; top: 96px !important; font-size: 11px; color: black;">{{$barcodes}}</span>
            </div>
            <div style=" position: relative;">
                
                <span style=" position: absolute; left:328px; bottom: 160px !important;font-family:'Quicksand-Medium';color: #D1D6E8;font-size: 9px;">S15-5F5G</span>
            </div>
   </div> 

   <script type="text/javascript" src="{{ asset('js/dom-to-image.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/downloadpng.js') }}"></script>

</body>
</html>
