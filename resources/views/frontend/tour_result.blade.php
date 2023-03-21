@extends('frontend.layouts.master')
@section('title','Sigma')
@section('content')

<style>
    .product-row {
        display: grid;
        /* justify-content: space-between; */
        /* width: 967px; */
        gap: 38px;
        /* flex-direction: row; */
        grid-template-columns: repeat(2, 1fr)
    }

    .tour-result-page {
        max-width: 974px;
        margin: 0 auto;
        margin-bottom: 48px;
        font-family: "Roboto", sans-serif;
    }

    .tour-result-page h3 {
        font-size: 35px;
        color: #000000;
        /* color: #f5f5f7; */
        font-weight: 500;
    }

    .tour-result-page p {
        font-size: 20px;
        /* color: #a1a1a6; */
        color: #000000;
        margin-bottom: 0px !important;
    }

    .tour-result-page .searching-result {
        background-color: #ffffff;
        /* background-color: #eeeeee; */
        border-radius: 20px;
        padding: 50px 40px;
        display: flex;
        flex-wrap: wrap;
        box-shadow: 0px 1px 4px 1px #00000014;

    }

    .tour-result-page .searching-result .result-output h3 {
        font-size: 22px;
        line-height: 25px;
        color: #232323;
        font-weight: 300;
    }

    .tour-result-page .searching-result .result-output p {
        font-size: 18px;
        line-height: 25px;
        color: #707070;
        font-weight: 300;
    }

    .tour-result-page .searching-result .result-output p .fa-long-arrow-right {
        padding-right: 10px;
    }

    .tour-result-page .page-result {
        background-color: #2b2b2b;
        margin-top: 40px;
        border-radius: 35px;
    }

    .tour-result-page .page-result .result-value {
        text-align: center;
    }

    .tour-result-page .page-result .result-value img {
        padding: 30px 30px 0px 30px;
    }

    .tour-result-page .page-result .result-value h3 {
        font-size: 21px;
    }

    .tour-result-page .page-result .result-value-row {
        width: 312px;
        margin: 0 auto;
        margin-top: 40px;
    }

    .tour-result-page .page-result .result-value-row ul {
        list-style: none;
        color: #ffffff;
    }

    .tour-result-page .page-result .result-value-row ul li {
        padding-bottom: 40px;
        font-size: 20px;
    }

    .tour-result-page .page-result .result-value-row ul li:last-child {
        padding-bottom: 0px;
    }

    .tour-result-page .page-result .result-value-row .result-value-footer {
        text-align: center;
        width: 280px;
        margin: 0 auto;
        padding-bottom: 30px;
        padding-top: 30px;
    }

    .tour-result-page .page-result .result-value-row .result-value-footer a {
        font-size: 14px;
        font-weight: 300;
        color: #e1e1e1;
        margin-bottom: 40px;
        text-decoration: none;
    }

    .tour-section .tour-image-section {
        /* background-color: #f1f1f1; */
    }

    .tour-section {
        /* margin-left: -3px; */
        margin-top: 46px;
        width: 200%;

    }

    .tour-section .checked {
        color: #2699fb;
    }

    .tour-section .buy-button {
        background-color: #1486f9;
        border-radius: 2.6vw;
        font-size: 14px;
        font-family: "Roboto", sans-serif;
        padding: 1.04vw 4.16vw;
        color: #fff;
    }

    .tour-section .tour-buy-button {
        background-color: #1486f9;
        border-radius: 25px;
        font-size: 20px;
        /* font-family: "Roboto", sans-serif; */
        padding: 14px 44px;
        color: #fff;
        border: 1px solid #0071E3F7;
    }

    .tour-section .tour-buy-button:hover {
        background-color: #0071E3F7;
    }

    .tour-section .list {
        font-size: 16px;
        margin-top: 40px;
        color: rgb(0, 0, 0);
        /* color: white; */
        text-align: start;
    }

    .tour-card-customize {
        background-color: #ffffff;
        /* background-color: #232323; */
        min-height: 840px;
        margin: 0px !important;
        /* padding: 0px 20px; */
        padding-bottom: 7vh;
        /* box-shadow: 0px 2px 4px 2px #00000014;
        border-radius: 20px;
        border: 0.5px solid #000000; */
        box-shadow: 0px 2px 4px 1px #00000014;
        border-radius: 20px;
        border: 0.5px solid #00000000;
        width: 50%;
    }


    .tour-title {
        /* text-align: center; */
        padding-right: 19px;
        font-size: 22px;
        text-decoration: none;
        line-height: 27px;
        color: #000000;
    }

    .tour-title:hover {
        color: #000000;
    }

    img.img-fluid {
        width: 100%;
        /* max-height: 201px; */
        object-fit: cover;
    }

    @media (max-width: 480px) {
        .product-row {
            gap: 0px;
            grid-template-columns: repeat(1, 1fr)
        }

        .tour-section {

            width: 100%;
        }

        .tour-result-page h3 {
            font-size: 22px;
            color: #000000;
            /* color: #f5f5f7; */
            font-weight: 500;
        }

        .tour-card-customize {
            width: 100%;
        }
    }

    @media (min-width: 481px) and (max-width: 820px) {
        .tour-section {

            width: 100%;
        }

        .tour-result-page h3 {
            font-size: 22px;
            color: #000000;
            /* color: #f5f5f7; */
            font-weight: 500;
        }

        .tour-card-customize {
            width: 100%;
        }
    }

</style>
<Section class="qbits-top-middle">
    <div class="container">
        <div class="middle-qbits-menu">
            <div class="row">
                <div class="col-sm-3">
                    <div class="middle-menu-li d-flex justify-content-start">
                        <a href="{{ route('driver')}}">Drivers & Manuals</a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="middle-menu-li d-flex justify-content-center">
                        <a href="{{ route('product_registration')}}">Registration</a>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="middle-menu-li d-flex justify-content-center" style="margin-left: 60px;">
                        <a href="{{route('warranty')}}">Warranty</a>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="middle-menu-li d-flex justify-content-end">
                        <?php
                            if(session()->has('USER_LOGIN')) {
                        ?>
                        <a href="{{route('wishlists')}}">Wishlist</a>
                        <?php } else {?>
                        <a href="javascript:void(0)" onclick="wishlistCartModal()">Wishlist</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</Section>
@include('frontend.discount')
<?php 
$question_answers = json_decode($question_answers, TRUE);

?>

<section class="middle-tab-area-tour">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="tour-result-page">
                    <h3 style="margin-top: 30px;">Tour Result</h1>
                        <p style="margin-bottom: 30px !important;">{{count($tour_products)}} Laptops are found based on
                            your searching.</p>

                        <div class="">
                            <div class="searching-result">
                                <div class="col-sm-6">
                                    <div class="result-output">
                                        <h3>Which type of laptop are you looking for?</h3>
                                        <p style="padding-bottom: 20px;"><i class="fa fa-long-arrow-right"
                                                aria-hidden="true"></i>{{$question_answers['1']}}</p>

                                        <h3>What type of processor you preferred?</h3>
                                        <p style="padding-bottom: 20px;"><i class="fa fa-long-arrow-right"
                                                aria-hidden="true"></i> {{$question_answers['0']}}</p>

                                        <h3>What is your best budget?</h3>
                                        <?php if($question_answers['4'] == '20'){?>
                                        <p style="padding-bottom: 20px;"><i class="fa fa-long-arrow-right"
                                                aria-hidden="true"></i> 20,000৳ to 40,000৳</p>
                                        <?php } else if($question_answers['4'] == '40'){?>
                                        <p style="padding-bottom: 20px;"><i class="fa fa-long-arrow-right"
                                                aria-hidden="true"></i> 40,000৳ to 60,000৳</p>
                                        <?php } else if($question_answers['4'] == '60'){?>
                                        <p style="padding-bottom: 20px;"><i class="fa fa-long-arrow-right"
                                                aria-hidden="true"></i> 60,000৳ to 1,00,000৳</p>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="result-output ">
                                        <h3>How much Memory do
                                            you need?</h3>
                                        <p style="padding-bottom: 20px;"><i class="fa fa-long-arrow-right"
                                                aria-hidden="true"></i> {{$question_answers['2']}}</p>

                                        <h3>How much storage you preferred?</h3>
                                        <p style="padding-bottom: 20px;"><i class="fa fa-long-arrow-right"
                                                aria-hidden="true"></i> {{$question_answers['3']}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-row">
                            @foreach($tour_products as $key=>$product)

                            <div class="tour-section">
                                <div class="card tour-card-customize">
                                    <div class="tour-image-section">

                                        <a href="{{ route('product_details',$product->slug)}}">
                                            <div class="item" style="padding: 30px;"><img
                                                    src="{{ asset($product->galary_photo) }}" alt="The Last of us"
                                                    class="img-fluid"></div>
                                        </a>
                                    </div>
                                    <div class="container">
                                        <a class="tour-title" href="{{ route('product_details',$product->slug)}}">
                                            <p> <?php if(strlen($product->name) > 120) {?>
                                                {{ substr($product->name,0,120)}}
                                                <?php } else {?>
                                                {{$product->name}}
                                                <?php } ?></p>
                                        </a>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-6 text-start">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                            </div>
                                            <div class="col-sm-6">
                                                <span
                                                    style="float: right; color: rgb(0, 0, 0);">{{  $product->sku}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container list">
                                        <ul>
                                            @foreach (json_decode($product->attributes) as $key => $text)

                                            <?php
                                                if($key == '4'){
                                                    break;
                                                }
                                            ?>
                                            <li>{{$text->attribute_value}}</li>


                                            @endforeach
                                            </ui>
                                    </div>
                                    <div class="container" style="text-align:start;margin-bottom:20px;">
                                        <a href="{{ route('product_details',$product->slug)}}"
                                            style="text-decoration: none;">More details</a>
                                    </div>
                                    <div class="container" style="text-align:center;margin-bottom:20px;">
                                        <?php if($product->sub_category == 'Lania'){?>
                                        <a href="#" style="text-decoration: none;font-size:24px;">Starting at
                                            ৳{{ number_format($product->unit_price + $question_answers['5'] + $question_answers['6'])}}</a>
                                        <?php } else {?>
                                        <a href="#" style="text-decoration: none;font-size:24px;">Starting at
                                            ৳{{ number_format($product->unit_price)}}</a>
                                        <?php } ?>
                                    </div>
                                    <div class="container" style="text-align:center;">
                                        <?php if($product->sub_category == 'Lania'){?>
                                        <a href="{{ route('product_details_minipc',$product->slug)}}"
                                            style="text-decoration: none">
                                            <button type="button" class="tour-buy-button">Buy Now</button>
                                        </a>
                                        <?php } else {?>
                                        <a href="{{ route('product_details',$product->slug)}}"
                                            style="text-decoration: none">
                                            <button type="button" class="tour-buy-button">Buy Now</button>
                                        </a>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>

                            @endforeach
                        </div>

                </div>
            </div>
        </div>
    </div>
</section>



<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();

</script>

@endsection
