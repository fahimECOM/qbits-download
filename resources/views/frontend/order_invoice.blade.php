@extends('frontend.layouts.master')
@section('title','Sigma')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        .invoice-content-section {
            background-color: #e1e1e1;
            font-family: "Roboto", sans-serif;
        }

        .invoice-area {
            max-width: 986px;
            background-color: #ffffff;
            margin: 0 auto;
            overflow: auto;
        }

        .print-btn {
            width: 175px;
            height: 55px;
            padding: 15px;
            border-radius: 30px;
            color: rgb(255, 255, 255);
            background-color: #2699FB;
            font-size: 16px;
            font-weight: 500;
            margin-right: 20px;
            outline: none;
            border: none;
        }

        .print-btn:hover {
            background-color: #0071E3;
            color: #fff;
        }



        .print-cancel-btn {
            width: 175px;
            height: 55px;
            padding: 15px 65px;
            border-radius: 30px;
            color: #272727;
            background-color: #E1E1E1;
            font-size: 16px;
            font-weight: 500;
            outline: none;
            border: none;
        }

        .print-cancel-btn:hover {
            background-color: #1486F9;
            color: #fff;
        }

        @media (max-width: 340px) {
            .invoice-thankyou {
                max-width: 100% !important;
            }

            .invoice-area {
                max-width: 100% !important;
            }

            .invoice-table {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-header {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-logo-date {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-billing {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-print-area {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-print-btn {
                flex-direction: column;
            }

            .print-btn {
                width: 100% !important;
                margin-bottom: 20px !important;
            }

            .print-cancel-btn {
                width: 100% !important;
                margin-bottom: 20px !important;
            }

            .qty-clmn {
                vertical-align: middle !important;
            }

            .mobile-lania-prod-qty-free-keyboard {
                padding-top: 170px !important;
                margin-bottom: -95px !important;
            }

            .mobile-lania-prod-qty-free-keyboard-multipleRow {
                padding-top: 170px !important;
                margin-bottom: -95px !important;
            }

            .mobile-lania-prod-qty-wireless-keyboard {
                padding-top: 135px !important;
                margin-bottom: -65px !important;
            }

            .mobile-lania-prod-qty-wireless-keyboard-multipleRow {
                padding-top: 135px !important;
                margin-bottom: -65px !important;
            }

            .mobile-lania-free-keyboard-qty {
                padding-top: 250px !important;
            }

            .mobile-lania-wireless-keyboard-qty {
                padding-top: 270px !important;
            }

            .mobile-lania-bag-free-keyboard-qty {
                margin-top: 65px !important;
                margin-bottom: 20px !important;
            }

            .mobile-lania-bag-wireless-keyboard-qty {
                margin-top: 60px !important;
                margin-bottom: 15px !important;
            }

            .mobile-lania-prod-price-free-keyboard {
                padding-top: 170px !important;
                margin-bottom: -65px !important;
            }

            .mobile-lania-prod-price-free-keyboard-multipleRow {
                padding-top: 170px !important;
                margin-bottom: -65px !important;
            }

            .mobile-lania-prod-price-wireless-keyboard {
                padding-top: 125px !important;
                margin-bottom: 95px !important;
            }

            .mobile-lania-prod-price-wireless-keyboard-multipleRow {
                padding-top: 125px !important;
                margin-bottom: 95px !important;
            }

            .mobile-lania-free-keyboard-price {
                padding-top: 220px !important;
            }

            .mobile-lania-wireless-keyboard-price {
                padding-top: 110px !important;
            }

            .mobile-lania-bag-price-free-keyboard {
                margin-top: 60px !important;
                margin-bottom: 18px !important;
            }

            .mobile-lania-bag-price-wireless-keyboard {
                margin-top: 55px !important;
                margin-bottom: 5px !important;
            }

            .mobile-sigma-prod-qty {
                padding-top: 70px !important;
            }

            .mobile-sigma-prod-qty-multipleRow {
                padding-top: 70px !important;
            }

            .mobile-sigma-bag-qty {
                padding-top: 160px !important;
                margin-bottom: -60px !important;
            }

            .mobile-sigma-bag-qty-multipleRow {
                padding-top: 160px !important;
                margin-bottom: -60px !important;
            }

            .mobile-sigma-prod-price {
                padding-top: 80px !important;
            }

            .mobile-sigma-prod-price-multipleRow {
                padding-top: 80px !important;
            }

            .mobile-sigma-bag-price {
                padding-top: 160px !important;
                margin-bottom: -55px !important;
            }

            .mobile-sigma-bag-price-multipleRow {
                padding-top: 160px !important;
                margin-bottom: -55px !important;
            }

            .mobile-gross-total {
                padding-right: 0px !important;
            }
        }

        @media (min-width: 341px) and (max-width: 360px) {
            .invoice-thankyou {
                max-width: 100% !important;
            }

            .invoice-area {
                max-width: 100% !important;
            }

            .invoice-table {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-header {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-logo-date {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-billing {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-print-area {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-print-btn {
                flex-direction: column;
            }

            .print-btn {
                width: 100% !important;
                margin-bottom: 20px !important;
            }

            .print-cancel-btn {
                width: 100% !important;
                margin-bottom: 20px !important;
            }

            .qty-clmn {
                vertical-align: middle !important;
            }

            .mobile-lania-prod-qty-free-keyboard {
                padding-top: 70px !important;
                margin-bottom: -154px !important;
            }

            .mobile-lania-prod-qty-free-keyboard-multipleRow {
                padding-top: 85px !important;
                margin-bottom: -120px !important;
            }

            .mobile-lania-prod-qty-wireless-keyboard {
                padding-top: 60px !important;
                margin-bottom: -105px !important;
            }


            .mobile-lania-prod-qty-wireless-keyboard-multipleRow {
                padding-top: 80px !important;
                margin-bottom: -80px !important;
            }

            .mobile-lania-free-keyboard-qty {
                padding-top: 250px !important;
            }

            .mobile-lania-wireless-keyboard-qty {
                padding-top: 250px !important;
            }

            .mobile-lania-bag-free-keyboard-qty {
                margin-top: 40px !important;
                margin-bottom: 3px !important;
            }

            .mobile-lania-bag-wireless-keyboard-qty {
                margin-top: 50px !important;
                margin-bottom: 5px !important;
            }

            .mobile-lania-prod-price-free-keyboard {
                padding-top: 30px !important;
                margin-bottom: -10px !important;
            }

            .mobile-lania-prod-price-free-keyboard-multipleRow {
                padding-top: 45px !important;
                margin-bottom: 25px !important;
            }

            .mobile-lania-prod-price-wireless-keyboard {
                padding-top: 65px !important;
                margin-bottom: 35px !important;
            }

            .mobile-lania-prod-price-wireless-keyboard-multipleRow {
                padding-top: 85px !important;
                margin-bottom: 59px !important;
            }

            .mobile-lania-free-keyboard-price {
                padding-top: 170px !important;
                margin-bottom: -145px;
            }

            .mobile-lania-wireless-keyboard-price {
                padding-top: 110px !important;
            }

            .mobile-lania-bag-price-free-keyboard {
                margin-top: 52px !important;
                margin-bottom: 24px !important;
            }

            .mobile-lania-bag-price-wireless-keyboard {
                margin-top: 45px !important;
                margin-bottom: 5px !important;
            }

            .mobile-sigma-prod-qty {
                padding-top: 25px !important;
            }

            .mobile-sigma-prod-qty-multipleRow {
                padding-top: 55px !important;
            }


            .mobile-sigma-bag-qty {
                padding-top: 80px !important;
                margin-bottom: -40px !important;
            }

            .mobile-sigma-bag-qty-multipleRow {
                padding-top: 100px !important;
                margin-bottom: -40px !important;
            }

            .mobile-sigma-prod-price {
                padding-top: 75px !important;
            }

            .mobile-sigma-prod-price-multipleRow {
                padding-top: 105px !important;
            }

            .mobile-sigma-bag-price {
                padding-top: 75px !important;
                margin-bottom: 5px !important;
            }

            .mobile-sigma-bag-price-multipleRow {
                padding-top: 95px !important;
                margin-bottom: 5px !important;
            }

            .mobile-gross-total {
                padding-right: 0px !important;
            }
        }

        @media (min-width: 361px) and (max-width: 380px) {
            .invoice-thankyou {
                max-width: 100% !important;
            }

            .invoice-area {
                max-width: 100% !important;
            }

            .invoice-table {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-header {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-logo-date {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-billing {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-print-area {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-print-btn {
                flex-direction: column;
            }

            .print-btn {
                width: 100% !important;
                margin-bottom: 20px !important;
            }

            .print-cancel-btn {
                width: 100% !important;
                margin-bottom: 20px !important;
            }

            .qty-clmn {
                vertical-align: middle !important;
            }

            .mobile-lania-prod-qty-free-keyboard {
                padding-top: 70px !important;
                margin-bottom: -154px !important;
            }

            .mobile-lania-prod-qty-free-keyboard-multipleRow {
                padding-top: 65px !important;
                margin-bottom: -150px !important;
            }

            .mobile-lania-prod-qty-wireless-keyboard {
                padding-top: 70px !important;
                margin-bottom: -145px !important;
            }

            .mobile-lania-prod-qty-wireless-keyboard-multipleRow {
                padding-top: 80px !important;
                margin-bottom: -110px !important;
            }

            .mobile-lania-free-keyboard-qty {
                padding-top: 250px !important;
            }

            .mobile-lania-wireless-keyboard-qty {
                padding-top: 250px !important;
            }

            .mobile-lania-bag-free-keyboard-qty {
                margin-top: 40px !important;
                margin-bottom: 3px !important;
            }

            .mobile-lania-bag-wireless-keyboard-qty {
                margin-top: 35px !important;
                margin-bottom: 5px !important;
            }

            .mobile-lania-prod-price-free-keyboard {
                padding-top: 30px !important;
                margin-bottom: -10px !important;
            }

            .mobile-lania-prod-price-free-keyboard-multipleRow {
                padding-top: 25px !important;
                margin-bottom: -5px !important;
            }

            .mobile-lania-prod-price-wireless-keyboard {
                padding-top: 75px !important;
                margin-bottom: -6px !important;
            }

            .mobile-lania-prod-price-wireless-keyboard-multipleRow {
                padding-top: 85px !important;
                margin-bottom: 25px !important;
            }

            .mobile-lania-free-keyboard-price {
                padding-top: 170px !important;
                margin-bottom: -145px;
            }

            .mobile-lania-wireless-keyboard-price {
                padding-top: 110px !important;
            }

            .mobile-lania-bag-price-free-keyboard {
                margin-top: 52px !important;
                margin-bottom: 24px !important;
            }

            .mobile-lania-bag-price-wireless-keyboard {
                margin-top: 32px !important;
                margin-bottom: 5px !important;
            }

            .mobile-sigma-prod-qty {
                padding-top: 25px !important;
            }

            .mobile-sigma-prod-qty-multipleRow {
                padding-top: 40px !important;
            }

            .mobile-sigma-bag-qty {
                padding-top: 65px !important;
                margin-bottom: -30px !important;
            }

            .mobile-sigma-bag-qty-multipleRow {
                padding-top: 70px !important;
                margin-bottom: -40px !important;
            }

            .mobile-sigma-prod-price {
                padding-top: 75px !important;
            }

            .mobile-sigma-prod-price-multipleRow {
                padding-top: 93px !important;
            }

            .mobile-sigma-bag-price {
                padding-top: 60px !important;
                margin-bottom: 15px !important;
            }

            .mobile-sigma-bag-price-multipleRow {
                padding-top: 65px !important;
                margin-bottom: 5px !important;
            }

            .mobile-gross-total {
                padding-right: 0px !important;
            }
        }

        @media (min-width: 381px) and (max-width: 399px) {
            .invoice-thankyou {
                max-width: 100% !important;
            }

            .invoice-area {
                max-width: 100% !important;
            }

            .invoice-table {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-header {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-logo-date {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-billing {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-print-area {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-print-btn {
                flex-direction: column;
            }

            .print-btn {
                width: 100% !important;
                margin-bottom: 20px !important;
            }

            .print-cancel-btn {
                width: 100% !important;
                margin-bottom: 20px !important;
            }

            .qty-clmn {
                vertical-align: middle !important;
            }

            .mobile-lania-prod-qty-free-keyboard {
                padding-top: 90px !important;
                margin-bottom: -155px !important;
            }

            .mobile-lania-prod-qty-free-keyboard-multipleRow {
                padding-top: 65px !important;
                margin-bottom: -150px !important;
            }

            .mobile-lania-prod-qty-wireless-keyboard {
                padding-top: 70px !important;
                margin-bottom: -145px !important;
            }

            .mobile-lania-prod-qty-wireless-keyboard-multipleRow {
                padding-top: 80px !important;
                margin-bottom: -150px !important;
            }

            .mobile-lania-free-keyboard-qty {
                padding-top: 250px !important;
            }

            .mobile-lania-wireless-keyboard-qty {
                padding-top: 250px !important;
            }

            .mobile-lania-bag-free-keyboard-qty {
                margin-top: 40px !important;
                margin-bottom: 3px !important;
            }

            .mobile-lania-bag-wireless-keyboard-qty {
                margin-top: 30px !important;
                margin-bottom: -15px !important;
            }

            .mobile-lania-prod-price-free-keyboard {
                padding-top: 50px !important;
                margin-bottom: -12px !important;
            }

            .mobile-lania-prod-price-free-keyboard-multipleRow {
                padding-top: 25px !important;
                margin-bottom: -5px !important;
            }

            .mobile-lania-prod-price-wireless-keyboard {
                padding-top: 77px !important;
                margin-bottom: -6px !important;
            }

            .mobile-lania-prod-price-wireless-keyboard-multipleRow {
                padding-top: 85px !important;
                margin-bottom: -15px !important;
            }

            .mobile-lania-free-keyboard-price {
                padding-top: 170px !important;
                margin-bottom: -145px;
            }

            .mobile-lania-wireless-keyboard-price {
                padding-top: 110px !important;
            }

            .mobile-lania-bag-price-free-keyboard {
                margin-top: 52px !important;
                margin-bottom: 24px !important;
            }

            .mobile-lania-bag-price-wireless-keyboard {
                margin-top: 30px !important;
                margin-bottom: -15px !important;
            }

            .mobile-sigma-prod-qty {
                padding-top: 35px !important;
            }

            .mobile-sigma-prod-qty-multipleRow {
                padding-top: 45px !important;
            }

            .mobile-sigma-bag-qty {
                padding-top: 80px !important;
                margin-bottom: -30px !important;
            }

            .mobile-sigma-bag-qty-multipleRow {
                padding-top: 60px !important;
                margin-bottom: -15px !important;
            }

            .mobile-sigma-prod-price {
                padding-top: 60px !important;
            }

            .mobile-sigma-prod-price-multipleRow {
                padding-top: 93px !important;
            }

            .mobile-sigma-bag-price {
                padding-top: 75px !important;
                margin-bottom: -8px !important;
            }

            .mobile-sigma-bag-price-multipleRow {
                padding-top: 60px !important;
                margin-bottom: 31px !important;
            }

            .mobile-gross-total {
                padding-right: 0px !important;
            }
        }

        @media (min-width: 400px) and (max-width: 480px) {
            .invoice-thankyou {
                max-width: 100% !important;
            }

            .invoice-area {
                max-width: 100% !important;
            }

            .invoice-table {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-header {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-logo-date {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-billing {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-print-area {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .invoice-print-btn {
                flex-direction: column;
            }

            .print-btn {
                width: 100% !important;
                margin-bottom: 20px !important;
            }

            .print-cancel-btn {
                width: 100% !important;
                margin-bottom: 20px !important;
            }

            .qty-clmn {
                vertical-align: middle !important;
            }

            .mobile-lania-prod-qty-free-keyboard {
                padding-top: 65px !important;
                margin-bottom: -170px !important;
            }

            .mobile-lania-prod-qty-free-keyboard-multipleRow {
                padding-top: 75px !important;
                margin-bottom: -140px !important;
            }

            .mobile-lania-prod-qty-wireless-keyboard {
                padding-top: 60px !important;
                margin-bottom: -180px !important;
            }

            .mobile-lania-prod-qty-wireless-keyboard-multipleRow {
                padding-top: 55px !important;
                margin-bottom: -150px !important;
            }

            .mobile-lania-free-keyboard-qty {
                padding-top: 250px !important;
            }

            .mobile-lania-wireless-keyboard-qty {
                padding-top: 250px !important;
            }

            .mobile-lania-bag-free-keyboard-qty {
                margin-top: 20px !important;
                margin-bottom: 3px !important;
            }

            .mobile-lania-bag-wireless-keyboard-qty {
                margin-top: 30px !important;
                margin-bottom: -15px !important;
            }

            .mobile-lania-prod-price-free-keyboard {
                padding-top: 50px !important;
                margin-bottom: -35px !important;
            }

            .mobile-lania-prod-price-free-keyboard-multipleRow {
                padding-top: 65px !important;
                margin-bottom: -5px !important;
            }

            .mobile-lania-prod-price-wireless-keyboard {
                padding-top: 65px !important;
                margin-bottom: -45px !important;
            }

            .mobile-lania-prod-price-wireless-keyboard-multipleRow {
                padding-top: 64px !important;
                margin-bottom: -15px !important;
            }

            .mobile-lania-free-keyboard-price {
                padding-top: 110px !important;
            }

            .mobile-lania-wireless-keyboard-price {
                padding-top: 110px !important;
            }

            .mobile-lania-bag-price-free-keyboard {
                margin-top: 18px !important;
                margin-bottom: -15px !important;
            }

            .mobile-lania-bag-price-wireless-keyboard {
                margin-top: 30px !important;
                margin-bottom: -15px !important;
            }

            .mobile-sigma-prod-qty {
                padding-top: 35px !important;
            }

            .mobile-sigma-prod-qty-multipleRow {
                padding-top: 35px !important;
            }

            .mobile-sigma-bag-qty {
                padding-top: 60px !important;
                margin-bottom: -30px !important;
            }

            .mobile-sigma-bag-qty-multipleRow {
                padding-top: 70px !important;
                margin-bottom: -40px !important;
            }

            .mobile-sigma-prod-price {
                padding-top: 60px !important;
            }

            .mobile-sigma-prod-price-multipleRow {
                padding-top: 85px !important;
            }

            .mobile-sigma-bag-price {
                padding-top: 55px !important;
                margin-bottom: -8px !important;
            }

            .mobile-sigma-bag-price-multipleRow {
                padding-top: 65px !important;
                margin-bottom: 5px !important;
            }

            .mobile-gross-total {
                padding-right: 0px !important;
            }
        }

        /* Tab responsive css */
        @media (min-width: 481px) and (max-width: 820px) {
            .invoice-thankyou {
                max-width: 100% !important;
            }
        }

        @media (min-width: 821px) and (max-width: 1080px) {
            .invoice-area {
                max-width: 760px !important;
            }

            .invoice-thankyou {
                max-width: 100% !important;
            }

            .invoice-print-section {
                max-width: 760px !important;
            }
        }

    </style>

</head>
<?php
    $guestId = '';
    if(session()->has('GUEST_ID')){
        $guestId = session()->get('GUEST_ID');
        $guestUser = App\Models\User::where('id',$guestId)->where('user_type_status','non-reg')->get();
    }
?>

<body>
    <div id="print-body">
        <div class="qbits-top-middle">
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
        </div>

        <!-- <div class="qbits-top-bottom">
            <div class="container">
                <div class="middle-qbits-menu">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="d-flex justify-content-center align-items-center">
                                <span class="me-2">We will offer 5% off. *</span><a href="javascript:void(0)"
                                style="text-decoration: none" onclick="offerCode()">Click for code ></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        @include('frontend.discount')

        <div class="invoice-content-section" id="invoice-content-section">
            <div class="invoice-area" id="invoice-print-area">
                <div class="container d-flex justify-content-center align-items-center invoice-thankyou"
                    style="width: 986px; height: 60px;background: #2699FB !important; color: #F5F5F7 !important; font-weight: bold; font-size: 16px; line-height: 21px;">
                    <span>Thank you for your order</span>
                </div>
                <div style="max-width: 701px;border-bottom: 2px solid #ddd;margin: 40px auto 0;padding-bottom: 20px;"
                    class="invoice-logo-date">
                    <div class="d-flex justify-content-between">
                        <div>
                            <!--begin::Logo-->
                            <a onclick="closePrintInvoice()">
                                <img src="{{ asset('frontend/assets/logo/qbits_logo_black.png')}}"
                                    style="width: 80px;opacity: 0.8" alt="qbits Logo" class="img-responsive">
                            </a>
                            <!--end::Logo-->
                        </div>
                        <div style="color: #272727;font-size: 18px; font-weight: 400;">
                            Date:
                            <?php 
                                $d =  $orders_new->created_at;
                                echo date('M d, Y', strtotime($d));
                            ?>
                        </div>
                    </div>
                </div>
                <div style="width: 701px; margin: 20px auto;" class="invoice-header">
                    <?php if($guestId){?>
                    <p style="color: #272727;font-size: 18px; font-weight: 400;">Hi {{ $guestUser[0]->name}},</p>
                    <?php } else {?>
                    <p style="color: #272727;font-size: 18px; font-weight: 400;">Hi {{ auth()->user()->name}},</p>
                    <?php }?>
                    <?php $order_id = session()->get('ORDER_ID');?>
                    <p style="color: #272727;font-size: 18px; font-weight: 400;margin-bottom: 40px;">Just to let you
                        know, we've received your order {{$order_id}},and it is now being processed:</p>
                    <p style="color: #272727;font-size: 18px; font-weight: 400;margin-bottom: 40px;">Pay with cash upon
                        delivery.</p>
                    <p style="color: #000000;font-size: 16px;font-weight: 500;">[Order {{$order_id}}]</p>
                </div>
                <div style="width: 701px; margin: 0 auto;margin-bottom: 20px;" class="invoice-table">
                    <!--begin::Table-->
                    <div class="table-responsive border-bottom mb-14">
                        <table
                            style="border: 1px solid #ddd;border-width: 1px 0 0 1px !important;border-collapse: collapse;width: 100%;">
                            <thead>
                                <tr>
                                    <th width="70%"
                                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 16px;font-weight: 500;">
                                        Product:</th>
                                    <th width="12%"
                                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 16px;font-weight: 500;">
                                        Quantity</th>
                                    <th width="18%"
                                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 16px;font-weight: 500;">
                                        Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <?php
                                    //bag information
                                    if($order->bag_id){
                                        $bag_name = '';
                                        $bag_color = '';
                                        $bag_price = $order->bag_unit_price * $order->bag_quanity;
                                        $bags = App\Models\Product::where('sub_category','backpack')->where('id',$order->bag_id)->where('status','1')->first();
                                        if($bags) {
                                            $bag_name = $bags->name;
                                            $bag_color = json_decode($bags->attributes)[0]->attribute_value;
                                        }
                                    }
                                    
                                    //keyboard information
                                    if($order->keyboard_id){
                                        $keyboard_name = '';
                                        $keyboard_price = $order->keyboard_unit_price * $order->keyboard_qty;
                                        $keyboard_details = App\Models\Product::where('sub_category','keyboard-mouse')->where('id',$order->keyboard_id)->where('status','1')->first();
                                        if($keyboard_details){
                                            $keyboard_name = $keyboard_details->name;
                                        }
                                    }

                                    //ram information
                                    $ram_name = '';
                                    if($order->ram_id){
                                        $ram_details = App\Models\Product::where('sub_category','ram')->where('id',$order->ram_id)->where('status','1')->first();
                                        if($ram_details){
                                            $ram_name = $ram_details->name;
                                        }
                                    }

                                    //ssd information 
                                    $ssd_name = '';
                                    if($order->ssd_id){
                                        $ssd_details = App\Models\Product::where('sub_category','ssd')->where('id',$order->ssd_id)->where('status','1')->first();
                                        if($ssd_details){
                                            $ssd_name = $ssd_details->name;
                                        }
                                    }
                                    
                                ?>
                                <tr>
                                    <?php if($order->product->sub_category == 'Lania'){?>
                                    <td width="70%"
                                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #222222;font-size: 16px;font-weight: 400;vertical-align:top;padding-top: 15px;padding-bottom: 0px;"
                                        class="qty-clmn">
                                        <p style="min-height: 75px;">{{substr($order->product->name,0,50)}}
                                            {{$ram_name}} {{$ssd_name}} Windows 10
                                            Pro Mini PC</p>
                                        <?php if($order->keyboard_id){?>
                                        <p style="color: #A1A1A6;">
                                            {{$keyboard_name}}
                                        </p>
                                        <?php }?>
                                        <?php if($order->bag_id){?>
                                        <p style="color: #A1A1A6;">
                                            {{$bag_name}} : {{ucfirst($bag_color)}}
                                        </p>
                                        <?php }?>
                                    </td>

                                    <td width="12%"
                                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 16px;font-weight: 400;vertical-align: top;"
                                        class="qty-clmn">
                                        <?php if($order->keyboard_id){
                                                if($order->keboard_type == 'free'){
                                            ?>
                                        <?php if(count($orders) > 1) {?>
                                        <p class="mobile-lania-prod-qty-free-keyboard-multipleRow">{{$order->quantity}}
                                            Pcs</p>
                                        <?php } else {?>
                                        <p class="mobile-lania-prod-qty-free-keyboard">{{$order->quantity}} Pcs</p>
                                        <?php } ?>
                                        <?php } else {?>
                                        <?php if(count($orders) > 1) {?>
                                        <p class="mobile-lania-prod-qty-wireless-keyboard-multipleRow">
                                            {{$order->quantity}} Pcs</p>
                                        <?php } else {?>
                                        <p class="mobile-lania-prod-qty-wireless-keyboard">{{$order->quantity}} Pcs</p>
                                        <?php } ?>
                                        <?php } } ?>

                                        <?php if($order->keyboard_id){
                                                if($order->keboard_type == 'free'){
                                            ?>
                                        <p style="padding-top: 48px" class="mobile-lania-free-keyboard-qty">
                                            {{$order->keyboard_qty}} Pcs
                                        </p>
                                        <?php } else {?>
                                        <p style="padding-top: 48px" class="mobile-lania-wireless-keyboard-qty">
                                            {{$order->keyboard_qty}} Pcs
                                        </p>
                                        <?php } } ?>

                                        <?php if($order->bag_id){
                                                if($order->keboard_type == 'free'){    
                                            ?>
                                        <p class="mobile-lania-bag-free-keyboard-qty">{{$order->quantity}} Pcs</p>
                                        <?php } else {?>
                                        <p class="mobile-lania-bag-wireless-keyboard-qty">{{$order->quantity}} Pcs</p>
                                        <?php } } ?>
                                    </td>

                                    <td width="18%"
                                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 18px;font-weight: 400;vertical-align: top;"
                                        class="qty-clmn">
                                        <?php if($order->keyboard_id){
                                                if($order->keboard_type == 'free'){
                                            ?>
                                        <?php if(count($orders) > 1) {?>
                                        <p class="mobile-lania-prod-price-free-keyboard-multipleRow">
                                            ৳{{number_format($order->total_price - $keyboard_price)}}</p>
                                        <?php } else {?>
                                        <p class="mobile-lania-prod-price-free-keyboard">
                                            ৳{{number_format($order->total_price - $keyboard_price)}}</p>
                                        <?php } ?>
                                        <?php } else {?>
                                        <?php if(count($orders) > 1) {?>
                                        <p class="mobile-lania-prod-price-wireless-keyboard-multipleRow">
                                            ৳{{number_format($order->total_price - $keyboard_price)}}</p>
                                        <?php } else {?>
                                        <p class="mobile-lania-prod-price-wireless-keyboard">
                                            ৳{{number_format($order->total_price - $keyboard_price)}}</p>
                                        <?php } ?>
                                        <?php } } ?>

                                        <?php if($order->keyboard_id){
                                                if($order->keboard_type == 'free'){
                                            ?>
                                        <p style="padding-top: 45px" class="mobile-lania-free-keyboard-price">
                                            ৳{{number_format($keyboard_price)}}</p>
                                        <?php } else {?>
                                        <p style="padding-top: 45px" class="mobile-lania-wireless-keyboard-price">
                                            ৳{{number_format($keyboard_price)}}</p>
                                        <?php } } ?>

                                        <?php if($order->bag_id){
                                                if($order->keboard_type == 'free'){    
                                            ?>
                                        <p class="mobile-lania-bag-price-free-keyboard">৳{{number_format($bag_price)}}
                                        </p>
                                        <?php } else {?>
                                        <p class="mobile-lania-bag-price-wireless-keyboard">
                                            ৳{{number_format($bag_price)}}</p>
                                        <?php } } ?>
                                    </td>

                                    <?php } else if($order->product->sub_category == 'Sigma') { ?>
                                    <td width="70%"
                                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #222222;font-size: 16px;font-weight: 400;vertical-align:top;padding-top: 15px;padding-bottom: 0px;"
                                        class="qty-clmn">
                                        <p style="min-height: 75px;">{{ $order->product->name}}</p>
                                        <?php if($order->bag_id){?>
                                        <p style="color: #A1A1A6;">
                                            {{$bag_name}} : {{ucfirst($bag_color)}}
                                        </p>
                                        <?php }?>
                                    </td>

                                    <td width="12%"
                                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 16px;font-weight: 400;vertical-align: top;"
                                        class="qty-clmn">
                                        <?php if(count($orders) > 1) {?>
                                        <p class="mobile-sigma-prod-qty-multipleRow" style="min-height: 45px;">
                                            {{$order->quantity}} Pcs</p>
                                        <?php } else {?>
                                        <p class="mobile-sigma-prod-qty" style="min-height: 45px;">{{$order->quantity}}
                                            Pcs</p>
                                        <?php } ?>

                                        <?php if($order->bag_id){?>
                                        <?php if(count($orders) > 1) {?>
                                        <p style="padding-top: 25px;" class="mobile-sigma-bag-qty-multipleRow">
                                            {{$order->quantity}} Pcs
                                        </p>
                                        <?php } else {?>
                                        <p style="padding-top: 25px;" class="mobile-sigma-bag-qty">
                                            {{$order->quantity}} Pcs
                                        </p>
                                        <?php } ?>
                                        <?php }?>
                                    </td>
                                    <td width="18%"
                                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 18px;font-weight: 400;vertical-align: top;"
                                        class="qty-clmn">
                                        <?php if(count($orders) > 1) {?>
                                        <p class="mobile-sigma-prod-price-multipleRow" style="min-height: 45px;">
                                            ৳{{number_format($order->total_price)}}</p>
                                        <?php } else {?>
                                        <p class="mobile-sigma-prod-price" style="min-height: 45px;">
                                            ৳{{number_format($order->total_price)}}</p>
                                        <?php } ?>

                                        <?php if($order->bag_id){?>
                                        <?php if(count($orders) > 1) {?>
                                        <p style="padding-top: 23px;" class="mobile-sigma-bag-price-multipleRow">
                                            ৳{{number_format($bag_price)}}</p>
                                        <?php } else {?>
                                        <p style="padding-top: 23px;" class="mobile-sigma-bag-price">
                                            ৳{{number_format($bag_price)}}</p>
                                        <?php } ?>
                                        <?php } ?>
                                    </td>

                                    <?php } else { ?>
                                    <td width="70%"
                                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #222222;font-size: 16px;font-weight: 400;vertical-align:top;padding-top: 24px;padding-bottom: 0px;"
                                        class="qty-clmn">
                                        <p>{{ $order->product->name}}</p>
                                    </td>

                                    <td width="12%"
                                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 16px;font-weight: 400;vertical-align: top;padding-top: 24px;padding-bottom: 0px;"
                                        class="qty-clmn">
                                        <p>{{$order->quantity}} Pcs</p>
                                    </td>

                                    <td width="18%"
                                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 18px;font-weight: 400;vertical-align: top;padding-top: 23px;padding-bottom: 0px;"
                                        class="qty-clmn">
                                        <p>৳{{number_format($order->total_price)}}</p>
                                    </td>

                                    <?php } ?>

                                </tr>
                                @endforeach
                                <tr>
                                    <td width="82%" colspan="2"
                                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 16px;font-weight: 500;">
                                        Payment Method : </td>
                                    @if( $orders_new->payment_type == 'Cash On Delivery')
                                    <td width="18%"
                                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px;color: #000000;font-size: 18px;font-weight: 400;">
                                        Cash On Delivery</td>
                                    @endif
                                </tr>
                                <?php if($orders_new->coupon_amount){?>
                                <tr>
                                    <td width="100%" colspan="3"
                                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px 25px 15px 15px;">
                                        <p class="d-flex justify-content-between">
                                            <span style="color: #000000;font-size: 16px;font-weight: 500;">Total :
                                            </span>
                                            <span
                                                style="color: #000000;font-size: 16px;font-weight: 500;">৳{{number_format($amount, 2, '.', ',')}}</span>
                                        </p>
                                        <p class="d-flex justify-content-between">
                                            <span style="color: #000000;font-size: 16px;font-weight: 500;">Discount:
                                            </span>
                                            <span style="color: #000000;font-size: 16px;font-weight: 500;">(-)
                                                ৳{{number_format(($orders_new->coupon_amount),2, '.', ',')}}</span>
                                        </p>
                                        {{-- <?php if($orders_new->coupon_amount){?>
                                            <p class="d-flex justify-content-between">
                                                <span style="color: #000000;font-size: 16px;font-weight: 500;">Tax: </span>
                                                <span style="color: #000000;font-size: 16px;font-weight: 500;">(+) ৳{{number_format($orders_new->tax_amount)}}</span>
                                        </p>
                                        <?php } ?> --}}
                                    </td>
                                </tr>
                                <tr>
                                    <td width="100%" colspan="3"
                                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px 25px 15px 15px;">
                                        <p class="d-flex justify-content-between">
                                            <span style="color: #000000;font-size: 16px;font-weight: 500;">Gross Total :
                                                </strong></span>
                                            <span
                                                style="color: #000000;font-size: 16px;font-weight: 500;">৳{{number_format(($amount - $orders_new->coupon_amount),2, '.', ',')}}</span>
                                        </p>
                                    </td>
                                </tr>
                                <?php }else{?>
                                {{-- <tr>
                                        <td  width="100%" colspan="3" style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px 25px 15px 15px;">
                                            <p class="d-flex justify-content-between">
                                                <span style="color: #000000;font-size: 16px;font-weight: 500;">Total : </strong></span>
                                                <span style="color: #000000;font-size: 16px;font-weight: 500;">৳{{number_format($amount)}}</span>
                                </p>
                                </td>
                                </tr> --}}
                                <tr>
                                    <td width="100%" colspan="3"
                                        style="border: 1px solid #ddd;border-width: 0 1px 1px 0 !important;padding: 15px 25px 15px 15px;page-break-before: always;">
                                        <p class="d-flex justify-content-between">
                                            <span style="color: #000000;font-size: 16px;font-weight: 500;">Gross Total :
                                                </strong></span>
                                            <span
                                                style="color: #000000;font-size: 16px;font-weight: 500;padding-right: 10px;"
                                                class="mobile-gross-total">৳{{number_format($amount,2, '.', ',')}}</span>
                                        </p>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
                <?php if(count($orders) == 3){?>
                <div style="max-width: 701px; margin: 0 auto;" class="pb-4 invoice-billing">
                    <div style="border: 1px solid #ddd;page-break-before: always;">
                        <div class="ps-3 pt-2 pb-1">
                            <p style="color: #000000;font-size: 16px;font-weight: 500;">Billing Address</p>
                            <p style="color: #000000;font-size: 18px;font-weight: 400;">
                                {{$orders_new->billing_flat}}, {{$orders_new->billing_thana}},
                                {{$orders_new->billing_district}} <br>
                                {{$orders_new->billing_division}}
                            </p>
                            <?php if(session()->has('GUEST_ID')){?>
                            <p style="color: #000000;font-size: 18px;font-weight: 400;">{{$guestUser[0]->phone}}
                                <br>
                                {{ $guestUser[0]->email}}
                            </p>
                            <?php } else { if(auth()->user()->phone){?>
                            <p style="color: #000000;font-size: 18px;font-weight: 400;">{{auth()->user()->phone}}
                                <br>
                                {{ auth()->user()->email}}
                            </p>
                            <?php } else {?>
                            <p style="color: #000000;font-size: 18px;font-weight: 400;">
                                {{ auth()->user()->email}}
                            </p>
                            <?php }} ?>
                        </div>
                    </div>
                </div>
                <?php } else {?>
                <div style="max-width: 701px; margin: 0 auto;" class="pb-4 invoice-billing">
                    <div style="border: 1px solid #ddd;">
                        <div class="ps-3 pt-2 pb-1">
                            <p style="color: #000000;font-size: 16px;font-weight: 500;">Billing Address</p>
                            <p style="color: #000000;font-size: 18px;font-weight: 400;">
                                {{$orders_new->billing_flat}}, {{$orders_new->billing_thana}},
                                {{$orders_new->billing_district}} <br>
                                {{$orders_new->billing_division}}
                            </p>
                            <?php if(session()->has('GUEST_ID')){?>
                            <p style="color: #000000;font-size: 18px;font-weight: 400;">{{$guestUser[0]->phone}}
                                <br>
                                {{ $guestUser[0]->email}}
                            </p>
                            <?php } else { if(auth()->user()->phone){?>
                            <p style="color: #000000;font-size: 18px;font-weight: 400;">{{auth()->user()->phone}}
                                <br>
                                {{ auth()->user()->email}}
                            </p>
                            <?php } else {?>
                            <p style="color: #000000;font-size: 18px;font-weight: 400;">
                                {{ auth()->user()->email}}
                            </p>
                            <?php }} ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div style="max-width: 986px;background-color: #ffffff;margin: 0 auto;" class="invoice-print-section">
                <div style="max-width: 701px; margin: 0 auto; padding-bottom: 2vw;" class="invoice-print-area">
                    <div class="d-flex invoice-print-btn">
                        <div class="menu-item">
                            <a target="_blank" href="{{route('invoice',$order->order_id)}}"
                                class="btn print-btn ">Print</a>
                        </div>
                        <!-- <button type="button" class="btn print-btn" onclick="invoicePrint()">Print</button> -->
                        <a type="button" class="btn print-cancel-btn" onclick="closePrintInvoice()">Close</a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function invoicePrint() {
                var backup = document.body.innerHTML;
                var print_content = document.getElementById('invoice-print-area').innerHTML;
                document.body.innerHTML = print_content;
                window.print();
                document.body.innerHTML = backup;
            }

            function closePrintInvoice() {
                window.location.href = "{{route('close_invoice')}}";
            }

        </script>
</body>

</html>

@endsection
