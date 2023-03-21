@extends('frontend.layouts.master')
@section('title','Accessories')
@section('content')
<style>
    .sigma-title {
        /* text-align: center; */
        padding-right: 19px;
        font-size: 22px;
        text-decoration: none;
        line-height: 27px;
        color: #000000;
    }

    .sigma-title:hover {
        color: #000000;
    }

    .blur {
        background: #ffffff30;
        backdrop-filter: blur(5px);
    }


    body .qbits-mobile-menu {
        position: fixed;
    }

    img {
        object-fit: cover;
    }

    .starting {
        text-decoration: none;
        font-size: 22px;
        line-height: 17px;
        font-weight: 500;
    }

    .thumbnails {
        overflow: hidden;
        margin-top: 20px;
        padding: 0;
        text-align: center;
        display: flex;
    }

    input#prd-qty {
        font-size: 16px;
        font-weight: 500;
        line-height: 21px;
        width: 30%;
        border: 0;
        outline: 0;
        text-align: center;
    }

    .thumbnails img {
        display: block;
        object-fit: cover;
        /* min-width: 0% !important;
        max-width: none !important; */
    }

    body {
        overflow-x: hidden !important;
    }

    nav.breadcrumb-nav {
        position: relative;
        /* margin: 0px 427px; */
        /* left: 20vw; */
        width: 100%;
    }

    .breadcrumb {
        margin-right: 765px;
    }

    .gray {
        background-color: #F3F3F3;
    }

    .productpage-area-section {
        overflow: hidden;
        width: 100%;
        background: #ffffff;
    }

    .productpage-area-section .productpage-section {
        max-width: 979px;
        margin: 0 auto;
        font-family: "Roboto", sans-serif;
        margin-bottom: 2px;
        margin-top: 40px;
    }

    .productpage-area-section .productpage-section .sigma-category-contant-section .product_button button {
        background-color: #2699fb;
        border-radius: 50px;
        color: #ffffff;
        padding: 10px 50px;
        float: left;
    }

    .productpage-area-section .social_icon ul {
        list-style: none;
        display: inline-flex;
    }

    .product-details-titel {
        font-weight: 500;
        font-size: 28px;
        line-height: 35px;
    }

    .product-details-series p {
        margin-bottom: 0px;
        font-size: 11px;
        /* font-weight: 400; */
        line-height: 21px;
    }

    .quick-review {
        /* font-size: 14px;
        line-height: 24px !important; */
        margin: 25px 0px 30px 0px;
    }

    .quick-review h1 {
        font-size: 16px;
        line-height: 21px !important;
    }

    .quick-review p {
        margin-bottom: 5px;
        font-size: 14px;
        line-height: 16px;
    }

    .product-details-add-cart {
        display: inline-flex;
        align-items: center;
        margin: 17.3568px 0px 30px 38px;
        gap: 5px;
    }

    /* Najmul Ovi - your cart section css */
    .prod-qty {
        border: 2px solid #707070;
        height: 55px;
        width: 114px;
        margin-left: -40px;
        display: inline-flex;
        align-items: center;
        border-radius: 36px;
        font-size: 18px;
    }

    .add-cart-btn {
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        border-radius: 30px;
        margin-left: 5px;
        font-size: 16px;
        width: 174px;
        height: 55px;
        line-height: 21px;
        padding: 12px 25px;
        color: white;
        background-color: #2699FB;
        align-content: center;
        justify-content: center;
    }

    .add-cart-btn:hover {
        color: white;
        background-color: #1486F9;
    }

    .product-details-list {
        border: 1px solid #E1E1E1;
        /* padding: 35px 35px 0px; */
        border-radius: 14px;
        margin-bottom: 148px;
    }

    .product-details-list-title {
        /* margin-bottom: 3vw; */
        margin-bottom: 50px;
        padding: 27px 19px 0px 28px;
    }

    .product-details-list-title h1 {
        font-size: 22px;
        font-weight: 500;
        padding-bottom: 9px;
        line-height: 30px;
    }

    .product-details-list-title strong {
        font-weight: 500;
    }

    .product-details-list-title h2,
    .product-details-list-title h3,
    .product-details-list-title h2 {
        font-size: 16px;
        font-weight: 500;
        padding-bottom: 9px;
        line-height: 30px;
    }

    .product-details-list-title p {
        font-size: 16px;
        font-weight: 400;
    }

    .product-details-list-info h1 {
        /* font-size: 22px;
        font-weight: 500;
        padding-bottom: 9px;
        line-height: 30px; */
        font-size: 22px;
        font-weight: 500;
        line-height: 30px;
        margin-bottom: 22px;
        padding-left: 30px;
    }

    .product-details-list-information p {
        display: flex;
        /* background: red; */
        border-top: 1px solid #E1E1E1;
        flex-direction: row;
        padding: 15px 15px;
        /* margin-left: -1.8vw;
        margin-right: -1.8vw; */
        margin-bottom: -0.1vw;
    }

    /* .product-details-list {
        border: 1px solid #E1E1E1;
        padding: 35px 35px 0px;
        border-radius: 14px;
        margin-bottom: 148px;
    }

    .product-details-list-title {
        margin-bottom: 3vw;
    }

    .product-details-list-title h1 {
        font-size: 22px;
        font-weight: 500;
        padding-bottom: 9px;
        line-height: 30px;
    }

    .product-details-list-title p {
        font-size: 16px;
    }

    .product-details-list-info h1 {
        font-size: 22px;
        font-weight: 500;
        padding-bottom: 9px;
        line-height: 30px;
    }

    .product-details-list-information p {
        display: flex;
        border-top: 1px solid #E1E1E1;
        flex-direction: row;
        padding: 15px 22px;
        margin-left: -1.8vw;
        margin-right: -1.8vw;
        margin-bottom: -0.1vw;
    } */



    .also-like-title {
        text-align: center;
        margin-bottom: 2.8vw;
    }



    .sigma-category-contant-section .checked {
        color: #2699fb;
    }

    .sigma-category-contant-section .buy-button {
        background-color: #1486f9;
        border-radius: 2.6vw;
        font-size: 14px;
        font-family: "Roboto", sans-serif;
        padding: 1.04vw 4.16vw;
        color: #fff;
    }

    .sigma-category-contant-section .sigma-buy-button {
        background-color: #1486f9;
        border-radius: 50px;
        font-size: 20px;
        /* font-family: "Roboto", sans-serif; */
        padding: 13.44px 44.16px;
        color: #fff;
        border: 1px solid;
    }

    .sigma-category-contant-section .sigma-buy-button:hover {
        background-color: #0071E3F7;
    }

    .sigma-category-contant-section .list {
        font-size: 16px;
        margin-top: 40px;
    }

    .card-customize {
        min-height: 750px;
        /* padding:20px; */
        padding-bottom: 44px;
        box-shadow: 0px 2px 4px 2px #00000014;
        border-radius: 20px;
        border: 0.5px solid #f7f7f7;
    }

    img.img-fluid {
        width: 100%;
        object-fit: cover;
    }


    .wish-icon g path {
        fill: transparent;
        stroke: rgb(99, 95, 95);
        stroke: 20;
    }

    .wish-icon g path:hover {
        fill: #1486F9;
        stroke: #1486F9;
        stroke: 20;
    }

    .wish-icon-fill g path {
        fill: #1486F9;
        stroke: #1486F9;
        stroke: 20;
    }

    .free-bagpack-modal-area {
        max-width: 875px !important;
        margin: 0 auto;
        margin-top: 100px;
    }

    .free-bagpack-modal-content {
        height: auto;
        background-color: #000;
        border-radius: 20px;
        padding: 50px 0;
    }

    .bagpack-area-content {
        display: flex;
    }

    .free-backpack-modal-title {
        color: #A0A0A5;
        font-size: 35px;
        line-height: 27px;
        font-weight: 500;
        font-family: 'Roboto', sans-serif;
        text-align: center;

    }

    .free-backpack-modal-text {
        color: #A0A0A5;
        font-size: 16px;
        line-height: 22px;
        font-weight: 400;
        font-family: 'Roboto', sans-serif;
        max-width: 565px;
        margin: 0 auto;

    }

    .select-bag-area {
        padding: 13px 26px;
        position: relative;
        cursor: pointer;
    }

    .selected-bag-bg {
        background: #7070708c;
    }

    .unselected-bag-bg {
        background: #70707047;
    }

    .select-bag-area_secondClmn {
        padding: 13px 26px;
        position: relative;
    }

    .bag-checked {
        position: absolute;
        margin-top: -5px;
        margin-left: 3px;
    }

    .bag-unchecked {
        position: absolute;
        margin-top: -5px;
        margin-left: 3px;
    }

    .border-line {
        margin: 30px auto;
        width: 645px;
        border-top: 1px solid #707070;
        opacity: 0.2;
    }

    .border-line-last {
        width: 645px;
        border-top: 1px solid #707070;
        opacity: 0.2;
        margin: 0 auto;
    }

    .bag-select-area-title-top {
        color: #A0A0A5;
        font-size: 16px;
        line-height: 22px;
        font-weight: 400;
        font-family: 'Roboto', sans-serif;
        text-align: center;
    }

    .bag-select-area-title-bottom {
        color: #A0A0A5;
        font-size: 16px;
        line-height: 22px;
        font-weight: 400;
        font-family: 'Roboto', sans-serif;
        text-align: center;
        display: none;
    }

    .bag-select-title {
        color: #A0A0A5;
        font-size: 16px;
        line-height: 21px;
        font-weight: 400;
        font-family: 'Roboto', sans-serif;
        text-align: center;
        margin-top: 12px;
    }

    .selected-bagarea {
        padding-top: 25px;
        margin-left: -3px;
    }

    .select-bag-row {
        margin-bottom: 25px;
        /* gap: -10px; */
        max-height: 344px;
        overflow-y: auto;
    }

    .select-bag-row::-webkit-scrollbar {
        width: 0.4em;
    }

    .select-bag-row::-webkit-scrollbar-track {
        box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    }

    .select-bag-row::-webkit-scrollbar-thumb {
        background-color: #70707047;
        /* outline: 1px solid slategrey; */
    }

    .bag-card {
        margin-bottom: 25px;
    }

    .stock-out-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        cursor: not-allowed;
        opacity: 0.2;
    }

    .zoom-bag-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all .3s ease;
    }

    .zoom-bag-img:hover {
        transform: scale(1.1);
    }

    .disabled-bag-area {
        cursor: not-allowed;
    }

    /*---------*/

    #slide-wrapper {
        max-width: 510px;
        display: flex;
        min-height: 90px;
        align-items: center;
        margin-left: 28px;
        margin-top: 5px;
    }

    #slider {
        max-width: 500px;
        overflow-x: auto;
        /* margin-top: 10px; */
        /* margin-top: 20px;
        padding: 0;
        text-align: center; */
        display: flex;
        flex-wrap: nowrap;
    }

    #slider::-webkit-scrollbar {
        width: 0px;
    }

    .slider-thumbnails {
        object-fit: cover;
        max-width: 60px;
        max-height: 60px;
        cursor: pointer;
        margin: 5px;
        opacity: 0.5;
        padding: 3px;
    }

    .slider-thumbnails:hover {
        border: 1px solid grey;
        padding: 3px;
        opacity: 1;
    }

    .thumbnail {
        width: 50px;
        height: 50px;
        object-fit: cover;
    }

    .myactive {
        border: 1px solid grey;
        opacity: 1 !important;
        padding: 3px;
    }

    .arrow {
        width: 20px;
        height: 20px;
        cursor: pointer;
        /* margin-top: -10px; */
        color: grey;
        /* transition: .3s; */
    }

    .arrow_2 {
        width: 20px;
        height: 20px;
        cursor: pointer;
        margin-top: -10px;
        color: grey;
        /* transition: .3s; */
    }


    .arrow:hover {
        /* opacity: .5; */
        color: #000;
    }

    .left_arrow {
        margin-left: 10px;
        margin-right: -10px;
        padding-right: 25px;
    }

    .right_arrow {
        padding-left: 10px;
    }

    @media (max-width: 359px) {
        .product-details-add-cart {
            display: inline-flex;
            align-items: center;
            margin-left: 31px;
            gap: 5px;
        }

        .prod-qty {
            height: 52px;
            width: 90px;
        }

        .add-cart-btn {
            width: 132px;
            height: 52px;

        }

        .col-xl-7.col-lg-7.mb-4.ps-5.thumbails-padding {
            padding-left: 16px !important;
        }

        .img-thumbnails {
            max-width: 100%;
            height: 197px;
        }

        #slide-wrapper {
            max-width: 350px !important;
        }

        #slider {
            max-width: 335px !important;
        }

        .arrow {
            margin-top: -15px !important;
        }

        .arrow_2 {
            margin-top: -15px !important;
        }

        .right_arrow {
            padding-right: 15px !important;
        }

        .free-bagpack-modal-area {
            max-width: 360px;
            margin: 0 5px;
            margin-top: 80px;
            margin-bottom: 20px;
        }

        .free-bagpack-modal-content {
            padding: 30px 0;
        }

        .bagpack-area-content {
            flex-direction: column;
        }

        .bag-select-area-title-top {
            display: none;
        }

        .bag-select-area-title-bottom {
            display: block;
            margin-top: -15px;
        }

        .select-bag-row {
            margin-bottom: 15px;
            display: flex !important;
            flex-direction: row !important;
            max-height: 380px;
        }

        .select-bag-area_firstClmn {
            margin-right: 15px;
        }

        .bag-select-title {
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .border-line {
            display: none;
        }

        .border-line-last {
            display: none;
        }

        .free-backpack-modal-title {
            color: #A0A0A5;
            font-size: 35px;
            line-height: 46px;
            font-weight: 500;
            font-family: 'Roboto', sans-serif;
            text-align: center;

        }
    }

    @media (min-width: 360px) and (max-width: 380px) {
        .product-details-add-cart {
            display: inline-flex;
            align-items: center;
            margin-left: 31px;
            gap: 5px;
        }

        .prod-qty {
            height: 52px;
            width: 90px;
        }

        .add-cart-btn {
            width: 132px;
            height: 52px;

        }

        .col-xl-7.col-lg-7.mb-4.ps-5.thumbails-padding {
            padding-left: 16px !important;
        }

        .img-thumbnails {
            max-width: 100%;
            height: 197px;
        }

        #slide-wrapper {
            max-width: 376px !important;
        }

        #slider {
            max-width: 350px !important;
        }

        .arrow {
            margin-top: 1px !important;
        }

        .arrow_2 {
            margin-top: -10px !important;
        }

        .right_arrow {
            padding-right: 10px !important;
        }

        .free-bagpack-modal-area {
            max-width: 360px;
            margin: 0 5px;
            margin-top: 80px;
            margin-bottom: 20px;
        }

        .free-bagpack-modal-content {
            padding: 30px 0;
        }

        .bagpack-area-content {
            flex-direction: column;
        }

        .bag-select-area-title-top {
            display: none;
        }

        .bag-select-area-title-bottom {
            display: block;
            margin-top: -15px;
        }

        .select-bag-row {
            margin-bottom: 15px;
            display: flex !important;
            flex-direction: row !important;
            max-height: 380px;
        }

        .select-bag-area_firstClmn {
            margin-right: 15px;
        }

        .bag-select-title {
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .border-line {
            display: none;
        }

        .border-line-last {
            display: none;
        }

        .free-backpack-modal-title {
            color: #A0A0A5;
            font-size: 35px;
            line-height: 46px;
            font-weight: 500;
            font-family: 'Roboto', sans-serif;
            text-align: center;

        }
    }

    @media (min-width: 381px) and (max-width: 480px) {
        .product-details-add-cart {
            display: inline-flex;
            align-items: center;
            margin-left: 31px;
            gap: 5px;
        }

        .prod-qty {
            height: 52px;
            width: 90px;
        }

        .add-cart-btn {
            width: 132px;
            height: 52px;

        }

        .col-xl-7.col-lg-7.mb-4.ps-5.thumbails-padding {
            padding-left: 16px !important;
        }

        .img-thumbnails {
            max-width: 100%;
            height: 197px;
        }

        #slide-wrapper {
            max-width: 376px !important;
        }

        #slider {
            max-width: 350px !important;
        }

        .arrow {
            margin-top: 1px !important;
        }

        .arrow_2 {
            margin-top: -9px !important;
        }

        .right_arrow {
            padding-right: 10px !important;
        }

        .free-bagpack-modal-area {
            max-width: 360px;
            margin: 0 5px;
            margin-top: 80px;
            margin-bottom: 20px;
        }

        .free-bagpack-modal-content {
            padding: 30px 0;
        }

        .bagpack-area-content {
            flex-direction: column;
        }

        .bag-select-area-title-top {
            display: none;
        }

        .bag-select-area-title-bottom {
            display: block;
            margin-top: -15px;
        }

        .select-bag-row {
            margin-bottom: 15px;
            display: flex !important;
            flex-direction: row !important;
            max-height: 380px;
        }

        .select-bag-area_firstClmn {
            margin-right: 15px;
        }

        .bag-select-title {
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .border-line {
            display: none;
        }

        .border-line-last {
            display: none;
        }

        .free-backpack-modal-title {
            color: #A0A0A5;
            font-size: 35px;
            line-height: 46px;
            font-weight: 500;
            font-family: 'Roboto', sans-serif;
            text-align: center;

        }
    }

    @media (min-width: 481px) and (max-width: 820px) {
        .img-thumbnails {
            width: 701px;
            height: 406px;
        }

        /* .thumbnails {
            margin-right: -11px;
            gap: 36px;
        } */

        img.img-fluid {
            height: 171.76999999999998px !important;
            object-fit: cover;
            max-width: 283px;
        }

        .free-bagpack-modal-area {
            max-width: 670px !important;
        }

        #slide-wrapper {
            max-width: 480px !important;
        }

        #slider {
            max-width: 465px !important;
        }

        .arrow_2 {
            margin-top: -12px !important;
        }
    }

</style>


<?php $marginLeftWishlist = "style=margin-left:-33px";?>
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
<section class="productpage-area-section" id="productpage-area-section">
    <div class="qbits-top-last gray">
        <nav class="breadcrumb-nav" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none text-secondary"
                        href="{{route('index')}} ">Accessories</a></li>
                <li class="breadcrumb-item"><a class="text-decoration-none text-secondary"
                        href="{{route('accessoriesbuy.buy')}}">Buy</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Product</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="productpage-section">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7 mb-4  thumbails-padding">

                            <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails" style="z-index: 0">
                                <a href="{{ asset($products->galary_photo) }}">
                                    <img class="img-thumbnails" src="{{ asset($products->galary_photo) }}" alt="" />
                                </a>

                            </div>

                            <!-- <ul class="thumbnails"> -->

                            @php
                            $photos = explode('|', $products->photos);
                            // dd($photos);
                            @endphp



                            <div id="slide-wrapper">
                                {{-- <img id="slideLeft" onclick="slideLeftImg()" class="arrow" src="{{asset('frontend/assets/images/arrow-left.png')}}">
                                --}}
                                <?php if(count($photos) < 8){?>
                                <i id="sideLeft" onclick="slideLeftImg()"
                                    class="fas fa-chevron-left arrow left_arrow"></i>
                                <?php } else {?>
                                <i id="sideLeft" onclick="slideLeftImg()"
                                    class="fas fa-chevron-left arrow_2 left_arrow"></i>
                                <?php } ?>
                                <div id="slider">
                                    @foreach ($photos as $key=>$photo)
                                    <?php if($key == 0){?>
                                    <div class="slider-thumbnails myactive" id="myactiveImg_{{$key}}">
                                        <a id="thumbnails" name={{$key}} href="{{ asset($photo) }}"
                                            data-standard="{{ asset($photo) }}">
                                            <img class="thumbnail" src="{{ asset($photo) }}" />
                                        </a>
                                    </div>
                                    <?php } else {?>
                                    <div class="slider-thumbnails" id="myactiveImg_{{$key}}">
                                        <a id="thumbnails" name={{$key}} href="{{ asset($photo) }}"
                                            data-standard="{{ asset($photo) }}">
                                            <img class="thumbnail" src="{{ asset($photo) }}" />
                                        </a>
                                    </div>
                                    <?php } ?>
                                    @endforeach
                                </div>
                                <?php if(count($photos) < 8){?>
                                <i id="sideRight" onclick="slideRightImg()"
                                    class="fas fa-chevron-right arrow right_arrow"></i>
                                <?php } else {?>
                                <i id="sideRight" onclick="slideRightImg()"
                                    class="fas fa-chevron-right arrow_2 right_arrow"></i>
                                <?php } ?>
                                {{-- <img id="slideRight" onclick="slideRightImg()" class="arrow" src="{{asset('frontend/assets/images/arrow-right.png')}}">
                                --}}
                            </div>


                            <!-- <li>
                                    <a id="thumbnails" href="{{ asset($photo) }}" data-standard="{{ asset($photo) }}">
                                        <img src="{{ asset($photo) }}" />
                                    </a>

                                </li> -->



                            <!-- </ul> -->

                        </div>
                        <div class="col-xl-5 col-lg-5" style="margin-bottom:40px">
                            <div class="sigma-category-contant-section">
                                <div class="product_button">
                                    <div class="container">
                                        <p class="product-details-titel">
                                            {{ $products->name}}</p>
                                        <div class="product-details-series">
                                            <p>Series : {{$products->series_name}}</p>
                                            <p>Product Code : {{  $products->sku}}</p>

                                            @if($products->current_stock < 1) <p>Availability : <span
                                                    class="text-danger">Out
                                                    of Stock</span></p>
                                                @else
                                                <p>Availability : In Stock</p>
                                                @endif
                                        </div>
                                        <div class="quick-review">
                                            <h1> Quick Overview:
                                            </h1>
                                            <!-- <p>{{$processor}}</p>
                                            <p>{{$ram}}</p>
                                            <p>{{$storage}}</p>
                                            <p>{{$display}}</p> -->
                                            @foreach (json_decode($products->attributes) as $key => $text)
                                            @if($key <'4') <p>{{$text->attribute_value}}</p>

                                                @endif
                                                @endforeach
                                        </div>



                                        <h3 style="font-size:30px;font-weight:500;line-height:30px">
                                            ৳{{number_format($products->unit_price)}}</h3>



                                    </div>
                                    {{-- <div class="container" style="text-align:center;margin-bottom:20px;"> --}}
                                    <div class="container product-details-add-cart">
                                        <?php if($products->current_stock > 1){
                                            $marginLeftWishlist = '';
                                        ?>
                                        <div class="prod-qty">
                                            <form>
                                                @csrf
                                                <span><input type="button" onclick="change()" value="-"
                                                        style="border: 0; outline: 0; background: none; margin-left: 20px;" /></span>
                                                <input type="text" id="prd-qty" name="prd-qty" value="1" />
                                                <span><input type="button" onclick="change('plus')" value="+"
                                                        style="border: 0; outline: 0; background: none" /></span>
                                            </form>
                                        </div>
                                        <?php
                                    if(session()->has('ADMIN_LOGIN') || $products->current_stock < 1) {
                                    
                                    ?>
                                        <div class="">
                                            <form class="form-inline" action="{{ route('carts.store') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $products->id }}">
                                                <button type="button" class="add-cart-btn"
                                                    style="border: none;outline: none;padding: 0px;cursor: not-allowed;"
                                                    disabled>Add to Cart</button>
                                            </form>
                                        </div>
                                        <?php } else { ?>
                                        <div class="">
                                            <form class="form-inline" action="{{ route('carts.store') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $products->id }}">
                                                <button type="button" class="add-cart-btn" href="javascript:void(0)"
                                                    style="border: none;outline: none;padding: 0px;"
                                                    onclick="add_to_cart('{{$products->id}}','{{$products->unit_price}}')"
                                                    id="add_to_cart_btn">Add
                                                    to Cart</button>
                                            </form>
                                        </div>
                                        <?php } } ?>
                                        <!-- {{-- <a type="button" class="btn btn-default btn-lg" style="" href="{{ route('carts',$products->id)}}">Add
                                        to Cart</a> --}} -->
                                        <?php
                                            if(session()->has('USER_LOGIN')) {
                                        ?>
                                        <form class="form-inline" action="" {{$marginLeftWishlist}}>
                                            @csrf
                                            <input type="hidden" name="prod_id" value="{{ $products->id }}">
                                            @if(App\Models\Wishlist::isWishlisted($products->id))
                                            <a href="javascript:void(0)" onclick="removeWishlist('{{$products->id}}')"
                                                id="wish-fill">
                                                <!-- <img src="{{ asset('frontend/assets/images/product_page/Icon ionic-ios-heart.png') }}"
                                                    alt="wishlist"> -->
                                                <span class="svg-icon svg-icon-primary svg-icon-2x wish-icon-fill">
                                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Heart.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="60px"
                                                        height="60px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                            <path id="wish-fill"
                                                                d="M16.5,4.5 C14.8905,4.5 13.00825,6.32463215 12,7.5 C10.99175,6.32463215 9.1095,4.5 7.5,4.5 C4.651,4.5 3,6.72217984 3,9.55040872 C3,12.6834696 6,16 12,19.5 C18,16 21,12.75 21,9.75 C21,6.92177112 19.349,4.5 16.5,4.5 Z"
                                                                fill="#000000" fill-rule="nonzero" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon--></span>
                                                <!-- <i class="fa fa-regular fa-heart"></i> -->
                                            </a>
                                            @else
                                            <a href="javascript:void(0)" onclick="addWishlist('{{$products->id}}')"
                                                id="without-fill">
                                                <!-- <img src="{{ asset('frontend/assets/images/product_page/Icon ionic-ios-heart.png') }}"
                                                    alt="wishlist"> -->
                                                <span class="svg-icon svg-icon-primary svg-icon-2x wish-icon">
                                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Heart.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="60px"
                                                        height="60px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                            <path
                                                                d="M16.5,4.5 C14.8905,4.5 13.00825,6.32463215 12,7.5 C10.99175,6.32463215 9.1095,4.5 7.5,4.5 C4.651,4.5 3,6.72217984 3,9.55040872 C3,12.6834696 6,16 12,19.5 C18,16 21,12.75 21,9.75 C21,6.92177112 19.349,4.5 16.5,4.5 Z"
                                                                fill="#000000" fill-rule="nonzero" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon--></span>
                                                <!-- <i class="fa fa-regular fa-heart"></i> -->
                                            </a>
                                            @endif

                                        </form>
                                        <?php } else {?>
                                        <a href="javascript:void(0)" onclick="wishlistModal()" {{$marginLeftWishlist}}>
                                            <!-- <img src="{{ asset('frontend/assets/images/product_page/Icon ionic-ios-heart.png') }}"
                                                alt="wishlist"> -->
                                            <span class="svg-icon svg-icon-primary svg-icon-2x wish-icon">
                                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Heart.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="60px"
                                                    height="60px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <path
                                                            d="M16.5,4.5 C14.8905,4.5 13.00825,6.32463215 12,7.5 C10.99175,6.32463215 9.1095,4.5 7.5,4.5 C4.651,4.5 3,6.72217984 3,9.55040872 C3,12.6834696 6,16 12,19.5 C18,16 21,12.75 21,9.75 C21,6.92177112 19.349,4.5 16.5,4.5 Z"
                                                            fill="#000000" fill-rule="nonzero" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon--></span>
                                            <!-- <i class="fa fa-regular fa-heart"></i> -->
                                        </a>
                                        <?php }?>
                                    </div>
                                    <div class="container">
                                        <!-- <p style="font-weight: 500;">Share</p> -->
                                        <div class="social_icon">
                                            <ul style="margin-left: -30px">
                                                <li><img src="{{ asset('frontend/assets/images/product_page/facebook.png') }}"
                                                        alt="facebook"></li>
                                                <li style="padding-left: 10px;"><img
                                                        src="{{ asset('frontend/assets/images/product_page/twitter-bird.png') }}"
                                                        alt="facebook"></li>
                                                <li style="padding-left: 10px;"><img
                                                        src="{{ asset('frontend/assets/images/product_page/linkedin.png') }}"
                                                        alt="facebook"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="table-responsive">
                        <table class=" table-bordered">
                            <thead>
                                <tr>
                                    <td colspan="5" style="padding: 20px;">
                                        <p>Description</p>
                                        <p>{{$products->description}}</p>
                                        <p>Specification</p>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (json_decode($products->attributes) as $key => $choice)
                                <tr>
                                    <td style="padding: 20px;">{{$choice->attribute_name}} </td>
                                    <td colspan="4" style="padding: 20px;">{{$choice->attribute_value}}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div> -->

                    <div class="product-details-list">
                        <div class="product-details-list-title">
                            <h1>Description</h1>
                            <p>{!! $products->description !!}</p>
                        </div>
                        <div class="product-details-list-info">
                            <h1>Specification</h1>
                            <div class="product-details-list-information">
                                @foreach (json_decode($products->attributes) as $key => $choice)
                                <p>
                                    <span>{{$choice->attribute_name}}</span>
                                    <span>{{$choice->attribute_value}}</span>
                                </p>
                                @endforeach
                                <!-- <p>
                                    <span>Brand :</span>
                                    <span>{{$brand}}</span>
                                </p>
                                <p>
                                    <span>Series :</span>
                                    <span>{{$series}}</span>
                                </p>
                                <p>
                                    <span>Processor :</span>
                                    <span>{{$processor}}</span>
                                </p>
                                <p>
                                    <span>Ram :</span>
                                    <span>{{$ram}}</span>
                                </p>
                                <p>
                                    <span>Storage :</span>
                                    <span>{{$storage}}</span>
                                </p>
                                <p>
                                    <span>Graphics :</span>
                                    <span>{{$graphics}}</span>
                                </p>
                                <p>
                                    <span>Display :</span>
                                    <span>{{$display}}</span>
                                </p>
                                <p>
                                    <span>Battery :</span>
                                    <span>{{$battery}}</span>
                                </p>
                                <p>
                                    <span>Operating System :</span>
                                    <span>{{$operating}}</span>
                                </p>
                                <p>
                                    <span>Networking :</span>
                                    <span>{{$networking}}</span>
                                </p>
                                <p>
                                    <span>Audio :</span>
                                    <span>{{$audio}}</span>
                                </p>
                                <p>
                                    <span>Webcam :</span>
                                    <span>{{$webcam}}</span>
                                </p>
                                <p>
                                    <span>Ports & Connectors:</span>
                                    <span>{{$ports}}</span>
                                </p>
                                <p>
                                    <span>Color :</span>
                                    <span>{{$color}}</span>
                                </p>
                                <p>
                                    <span>Weight :</span>
                                    <span>{{$weight}}</span>
                                </p>
                                <p>
                                    <span>Warranty :</span>
                                    <span>{{$warranty}}</span>
                                </p> -->
                            </div>
                        </div>

                    </div>
                    <div class="also-like-title">
                        <h1>You may also like</h1>
                    </div>
                    @php
                    $like = $amount =
                    App\Models\Product::where('sub_category','Sigma')->where('status','1')->limit(2)->get();
                    @endphp
                    <div class="row px-1 also-like">
                        @foreach($like as $key=>$product)
                        <div class="col-sm-6" style="margin-bottom:40px">
                            <div class="sigma-category-contant-section">
                                <div class="card card-customize">
                                    <div class="sigma-category-image-section">
                                        <a href="{{ route('product_details',$product->slug)}}">
                                            <div class="item" style="padding: 30px;"><img
                                                    src="{{ asset($product->galary_photo) }}" alt="The Last of us"
                                                    class="img-fluid"></div>
                                        </a>
                                    </div>
                                    <div class="container">
                                        <a class="sigma-title" href="{{ route('product_details',$product->slug)}}">
                                            <p>
                                                <?php if(strlen($product->name) > 120) {?>
                                                {{ substr($product->name,0,120)}}
                                                <?php } else {?>
                                                {{$product->name}}
                                                <?php } ?></p>
                                        </a>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                            </div>
                                            <div class="col-sm-6">
                                                <span style="float: right">{{  $product->sku}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container list">
                                        <ul>
                                            @foreach (json_decode($product->attributes) as $key => $text)
                                            @if($text->attribute_name == 'processor' || $text->attribute_name == 'ram'
                                            ||
                                            $text->attribute_name == 'storage' || $text->attribute_name == 'display')
                                            <li>{{$text->attribute_value}}</li>
                                            @endif
                                            @endforeach
                                            </ui>
                                    </div>
                                    <div class="container" style="text-align:start;margin-bottom:20px;">
                                        <a href="{{ route('product_details',$product->slug)}}"
                                            style="text-decoration: none;">More details</a>
                                    </div>
                                    <div class="container" style="text-align:center;margin-bottom:20px;">
                                        <a href="#" class="starting">Starting at
                                            ৳{{ number_format($product->unit_price) }}</a>
                                    </div>
                                    <div class="container" style="text-align:center;">

                                        <a href="{{ route('product_details',$product->slug)}}"
                                            style="text-decoration: none">
                                            <button type="button" class="sigma-buy-button">Buy Now</button>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- <div class="row">
                        <div class="col-sm-6" style="margin-bottom:40px">
                            <div class="sigma-category-contant-section">
                                <div class="card" style="padding-bottom: 20px;box-shadow: 0px 1.2px 1px 0px #70707040;">
                                    <div class="sigma-category-image-section">
                                        <div class="item" style="padding: 30px;"><img
                                                src="{{ asset('frontend/assets/images/sigma-model.png') }}"
                                                alt="The Last of us" class="img-fluid"></div>
                                    </div>
                                    <div class="container">
                                        <p style="text-align: center;margin-top:20px;font-size: 22px;">Qbits Sigma 15 -
                                            10th
                                            Generation i7<br> Intel® Core™ Processor, 15.6 Inches FHD<br> Non Touch IPS
                                            Display</p>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                            </div>
                                            <div class="col-sm-6">
                                                <span style="float: right">L15-29F2S</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container list">
                                        <ul>
                                            <li>Intel Core i7</li>
                                            <li>8GB DDR4 3200 MHz Memory</li>
                                            <li>M.2 512GB NVMe SSD</li>
                                            <li>15.6 Inches Full HD IPS Display</li>
                                        </ul>
                                    </div>
                                    <div class="container" style="text-align:center;margin-bottom:20px;">
                                        <a href="#" style="text-decoration: none;">See all offers</a>
                                    </div>
                                    <div class="container" style="text-align:center;margin-bottom:20px;">
                                        <a href="#" style="text-decoration: none;font-size:24px;">Starting at
                                            ৳72,000</a>
                                    </div>
                                    <div class="container" style="text-align:center;margin-bottom:20px;">
                                        <button type="button" class="btn btn-default btn-lg"
                                            style="background-color: #2699FB;border-radius: 20px;color:#FFFFFF;padding:10px 60px;">Buy
                                            Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6" style="margin-bottom:40px">
                            <div class="sigma-category-contant-section">
                                <div class="card" style="padding-bottom: 20px;box-shadow: 0px 1.2px 1px 0px #70707040;">
                                    <div class="sigma-category-image-section">
                                        <div class="item" style="padding: 30px;"><img
                                                src="{{ asset('frontend/assets/images/sigma-model.png') }}"
                                                alt="The Last of us " class="img-fluid"></div>
                                    </div>
                                    <div class="container">
                                        <p style="text-align: center;margin-top:20px;font-size: 22px;">Qbits Sigma 15 -
                                            10th
                                            Generation i7<br> Intel® Core™ Processor, 15.6 Inches FHD<br> Non Touch IPS
                                            Display</p>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                            </div>
                                            <div class="col-sm-6">
                                                <span style="float: right">L15-29F2S</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container list">
                                        <ul>
                                            <li>Intel Core i7</li>
                                            <li>8GB DDR4 3200 MHz Memory</li>
                                            <li>M.2 512GB NVMe SSD</li>
                                            <li>15.6 Inches Full HD IPS Display</li>
                                        </ul>
                                    </div>
                                    <div class="container" style="text-align:center;margin-bottom:20px;">
                                        <a href="#" style="text-decoration: none;">See all offers</a>
                                    </div>
                                    <div class="container" style="text-align:center;margin-bottom:20px;">
                                        <a href="#" style="text-decoration: none;font-size:24px;">Starting at
                                            ৳72,000</a>
                                    </div>
                                    <div class="container" style="text-align:center;margin-bottom:20px;">
                                        <button type="button" class="btn btn-default btn-lg"
                                            style="background-color: #2699FB;border-radius: 20px;color:#FFFFFF;padding:10px 60px;">Buy
                                            Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <form id="frmAddToCart">
        <input type="hidden" id="pqty" name="pqty" />
        <input type="hidden" id="product_id" name="product_id" />
        <input type="hidden" id="product_price" name="product_price" />
        @csrf
    </form>

    <form id="frmAddToWishlist">
        <input type="hidden" id="p_qty" name="p_qty" />
        <input type="hidden" id="prod_id" name="prod_id" />
        @csrf
    </form>


</section>

<script src="{{asset('frontend/assets/exzoom/easyzoom.js')}}"></script>
<script>
    // Instantiate EasyZoom instances
    var $easyzoom = $('.easyzoom').easyZoom();

    // Setup thumbnails example
    var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

    $('.slider-thumbnails').on('click', 'a', function (e) {
        var $this = $(this);
        var divId = $this.attr('name');
        let activeImages = document.getElementsByClassName('myactive');
        let divElem = document.getElementById('myactiveImg_' + divId);
        // alert(divElem);
        if (activeImages.length > 0) {
            activeImages[0].classList.remove('myactive');
        }
        // $this.addClass('myactive');
        divElem.classList.add('myactive');
        e.preventDefault();

        // Use EasyZoom's `swap` method
        api1.swap($this.data('standard'), $this.attr('href'));
    });
    // $('.thumbnails').on('click', 'a', function (e) {
    //     var $this = $(this);
    //     var divId = $this.attr('name');
    //     let activeImages = document.getElementsByClassName('myactive');
    //     let divElem = document.getElementById('myactiveImg_'+divId);
    //     // alert(divElem);
    //     if (activeImages.length > 0){
    //         activeImages[0].classList.remove('myactive');
    //     }			
    //     // $this.addClass('myactive');
    //     divElem.classList.add('myactive');
    //     e.preventDefault();

    //     // Use EasyZoom's `swap` method
    //     api1.swap($this.data('standard'), $this.attr('href'));
    // });

    // Setup toggles example
    var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

    $('.toggle').on('click', function () {
        var $this = $(this);
        if ($this.data("active") === true) {
            $this.text("Switch on").data("active", false);
            api2.teardown();
        } else {
            $this.text("Switch off").data("active", true);
            api2._init();
        }
    });

</script>
<script>
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
            '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();

    function slideLeftImg() {
        var element = document.getElementById("slider");
        element.scrollLeft -= 65;
    }

    function slideRightImg() {
        var element = document.getElementById("slider");
        element.scrollLeft += 65;
    }

    // Najmul Ovi

    function change(type) {
        var cur_val = document.getElementById("prd-qty").value;
        if (type == "plus") {
            cur_val++;
        } else if (cur_val > 1) {
            cur_val--;
        }
        document.getElementById("prd-qty").value = cur_val;
    }

    function add_to_cart(id, prod_price) {
        jQuery('#add_to_cart_msg').html('');
        jQuery('#product_id').val(id);
        jQuery('#product_price').val(parseInt(prod_price));
        jQuery('#pqty').val(jQuery('#prd-qty').val());
        $("#add_to_cart_btn").attr('disabled', true);
        jQuery.ajax({
            url: '/add_to_cart',
            data: jQuery('#frmAddToCart').serialize(),
            type: 'post',
            success: function (result) {
                if (result.totalItem == 0) {
                    jQuery('#cart-menu').hide();
                    jQuery('#mob-cart-menu').hide();
                } else {
                    var cart_val = jQuery('#cart-val').html();
                    var mob_cart_val = jQuery('#mob-cart-val').html();
                    // alert(cart_val);
                    if (cart_val == undefined || mob_cart_val == undefined) {
                        var html =
                            '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" id="cart-menu" style="margin-top: -5px !important;margin-left: 5px;display: flex;justify-content: center;"><span style="margin-bottom: 1px" id="cart-val">' +
                            result.totalItem + '</span></span>';
                        var html1 =
                            '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" id="cart-menu" style="margin-top: -5px !important;margin-left: 5px;display: flex;justify-content: center;"><span style="margin-bottom: 1px" id="cart-val">' +
                            result.totalItem + '</span></span>';
                        jQuery('.shopping-cart-icon').html(html);
                        jQuery('.mob-shopping-cart-icon').html(html1);
                        document.getElementById("productpage-area-section").style.opacity = "0.5";
                        document.getElementById("cart-box").style.display = "block";
                        document.getElementById("mob-cart-box").style.display = "block";
                    } else {
                        jQuery('#cart-val').html(result.totalItem);
                        jQuery('#mob-cart-val').html(result.totalItem);
                        document.getElementById("productpage-area-section").style.opacity = "0.5";
                        document.getElementById("cart-box").style.display = "block";
                        document.getElementById("mob-cart-box").style.display = "block";
                        // location.reload();
                    }
                }
            }
        });
    }


    function addWishlist(id) {
        jQuery('#prod_id').val(id);
        jQuery('#p_qty').val(jQuery('#prd-qty').val());
        var data = jQuery('#frmAddToWishlist').serialize();
        // toastr.options = {
        //     "closeButton": true,
        //     "newestOnTop": true,
        //     "progressBar": true,
        //     "timeOut": "1000",
        //     "positionClass": "toast-top-right"
        // };
        jQuery.ajax({
            url: '/add_to_wishlist',
            data: data,
            type: 'post',
            success: function (result) {
                if (result.type == 'success') {

                    location.reload();
                }
                // toastr.success(result.msg);
            }
        });
    }

    function removeWishlist(pid) {
        // toastr.options = {
        //     "closeButton": true,
        //     "newestOnTop": true,
        //     "progressBar": true,
        //     "timeOut": "1000",
        //     "positionClass": "toast-top-right"
        // };
        jQuery.ajax({
            url: '/remove_from_wishlist',
            data: 'product_id=' + pid + '&_token=' + jQuery("[name='_token']").val(),
            type: 'post',
            success: function (result) {
                if (result.type == 'success') {

                    location.reload();
                }
                // toastr.success(result.msg);
            }
        });
    }

    function wishlistModal() {
        $('#wishlistModalShow').modal('show');
    }

    function wishlistModalSignIn() {
        window.location.href = "{{route('signin')}}";
    }

    function change_free_bag(bagphoto, bagid, bagcolor, bag_id_arr, is_stock) {
        $allBagsId = JSON.parse(bag_id_arr);
        if (is_stock == 'yes') {
            for (let i = 0; i < $allBagsId.length; i++) {

                if ($allBagsId[i] == bagid) {
                    document.getElementById('bag_mark_' + i).src = window.location.origin + "/" +
                        'frontend/assets/images/bag_check.png';
                    document.getElementById('select_bag_area_' + i).style.background = "#7070708c";
                } else {
                    document.getElementById('bag_mark_' + i).src = window.location.origin + "/" +
                        'frontend/assets/images/bag_uncheck.png';
                    document.getElementById('select_bag_area_' + i).style.background = "#70707047";
                }
            }
            document.getElementById('bag_galary_photo').src = window.location.origin + "/" + bagphoto;

            document.getElementById('bag_color').innerText = bagcolor;

            jQuery('#free_bag_id').val(bagid);
        } else {
            return;
        }

        // for(let i = 0; i < allbags.length; i++){
        //     console.log(allbags[i]);
        // }
        // alert($bagcolor);
    }

</script>

<!-- Modal for signin to add wishlist -->
<div class="modal fade" id="wishlistModalShow" tabindex="-1" role="dialog"
    aria-labelledby="wishlistModalShow_modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="place-content: center;" role="document">
        <div class="modal-content" style="background-color: #272727; border-radius: 20px;width:auto;">
            <div class="modal-body pt-md-0 pb-5 px-4 px-md-5 text-center">
                <div class="success_circle">
                    <img style="padding-top: 0.4vw;padding-left: 0.1vw;" src="{{ asset('error_icon.png') }}"
                        alt="error" />
                </div>
                <p class="email-subscribe-success-modal-heading" style="margin-bottom: 0.1vw;" id="subscribe-error">Need
                    to sign in for add wishlist</p>
                <button type="button" class="modal-continue-btn" style="margin-bottom: -0.6vw;"
                    onclick="wishlistModalSignIn()">Sign in</button>
            </div>
        </div>
    </div>
</div>

<!-- <button type="button" onclick="testModal()">Test Modal</button> -->



@endsection
