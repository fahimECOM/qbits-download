@extends('frontend.layouts.master')
@section('title','Ordering and Payment')
@section('content')
<style>
    body {
        overflow-x: hidden;
    }

    .ordering-payment-policy-container {
        max-width: 1386px;
        background: #1D1D1F;
        margin-top: 60px !important;
        margin-bottom: 60px !important;
        border-radius: 30px;
        padding-bottom: 90px;
        padding-top: 55px;
        margin: 0 auto;
    }

    .ordering-payment-policy-title {
        /* color: #A0A0A5; */
        color: #fff;
        text-align: center;
        margin-bottom: 40px;
        font-size: 22px;
        font-weight: 700;
        line-height: 29px;
    }

    .ordering-payment-policy-heading {
        /* color: #A0A0A5; */
        color: #fff;
        font-weight: 500;
        font-size: 22px;
        margin-bottom: 12px;
        font-family: 'Roboto';
        line-height: 29px;
    }

    .ordering-payment-policy-info {
        color: #A0A0A5;
        font-size: 20px;
        margin-bottom: 40px;
        font-weight: 400;
        font-family: 'Roboto';
        line-height: 27px;
    }

    .payment-method {
        display: flex;
        align-items: center;
    }

    .marginRight-40 {
        margin-right: 37px;
    }

    .marginLeft-40 {
        margin-left: 40px;
    }

    .card-body {
        padding: 0 !important;
    }

    img.img-fluid-payment-policy {
        object-fit: cover;
    }

    /* Mobile responsive css */
    @media (max-width: 480px) {
        .img-fluid-payment-policy {
            max-width: 100%;
            height: 225px;
            object-fit: cover;
        }

        .ordering-payment-policy-container {
            max-width: 370px;
            padding-bottom: 80px !important;
            padding-top: 53px !important;
        }

        .ordering-payment-policy-title {
            margin-bottom: 40px;
            font-size: 22px;
        }

        .ordering-payment-policy-heading {
            margin-bottom: 12px;
            line-height: 27px;
        }

        .ordering-payment-policy-info {
            margin-bottom: 28px;
            line-height: 27px;
        }

        .payment-method {
            flex-wrap: wrap;
            justify-content: flex-start;
            line-height: 40px;
            margin-top: -10px;
            margin-bottom: 30px;
        }

        .pl-40 {
            padding-left: 10px;
        }

        .pr-40 {
            padding-right: 10px;
        }
    }

    /* Tab responsive css */
    @media (min-width: 481px) and (max-width: 820px) {
        .ordering-payment-policy-container {
            max-width: 670px;
            padding-bottom: 75px !important;
            padding-top: 60px !important;
        }

        .ordering-payment-policy-title {
            margin-bottom: 25px;
            font-size: 22px;
        }

        .ordering-payment-policy-info {
            margin-bottom: 30px;
            line-height: 29px;
        }

        .payment-method {
            flex-wrap: wrap;
            justify-content: flex-start;
            line-height: 50px;
            margin-bottom: 30px;
            margin-top: -10px;
        }
    }


    @media (min-width: 821px) and (max-width: 991px) {
        .ordering-payment-policy-container {
            max-width: 870px;
            padding-bottom: 80px !important;
            padding-top: 80px !important;
        }

        .ordering-payment-policy-title {
            margin-bottom: 40px;
        }

        .payment-method {
            flex-wrap: wrap;
            justify-content: flex-start;
            line-height: 55px !important;
            margin-bottom: 45px !important;
        }

        .ordering-payment-policy-heading {
            margin-bottom: 22px;
            line-height: 29px;
        }

        .ordering-payment-policy-info {
            margin-bottom: 50px;
            line-height: 29px;
        }
    }

    @media (min-width: 1400px) {

        .container,
        .container-lg,
        .container-md,
        .container-sm,
        .container-xl,
        .container-xxl {
            max-width: 1400px;
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
<!-- <div class="qbits-menu-bottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="text-center">We will offer 10% off. <a href="javascript:void(0)" style="text-decoration: none"
                        onclick="offerCode()">Click for code ></a></p>
            </div>
        </div>
    </div>
</div> -->

@include('frontend.discount')

<div class="qbits-slider">
    <div class="">
        <div class="">
            <div class="">
                <div class="">
                    <img style="opacity: 0.8;width: 100%;" class="img-fluid-payment-policy"
                        src="{{ asset('frontend/assets/images/order_payment.jpg') }}" alt="order payment">
                </div>
            </div>
        </div>
    </div>
</div>


{{-- <div class="">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <p class="text-center" style="color: white;font-size:22px;">We’re here for you</p>
                <p class="text-center" style="color: white;font-size:57px;">Contact Qbits Care</p>
            </div>
        </div>
    </div>
</div> --}}

<div class="">
    <div class="container">
        <div class="row ordering-payment-policy-container">
            <div class="col-sm-12">
                <div class="pl-40 pr-40">
                    <p class="ordering-payment-policy-title">Ordering and Payment Policy</p>

                    <p class="ordering-payment-policy-heading">Order on Qbits Online Store</p>
                    <p class="ordering-payment-policy-info">Welcome to Qbits online store. Qbits laptops are available in the online store. Place an order and be worry-free making a purchase through myqbits.com. We offer easy and secure payment methods. Shop from our store by using credit or debit cards and get your Qbits product at your door. We also accept cash transactions. After placing an order you will receive an order confirmation e-mail containing the details of your order.</p>

                    <p class="ordering-payment-policy-heading">Online Support</p>
                    <p class="ordering-payment-policy-info">We offer 24/7 day online support and service. To know more about the current status of Qbits products, contact our online order support center. Your online order support provides you with details and the most current status of your Qbits laptops.</p>

                    <p class="ordering-payment-policy-heading">Qbits Payment Method</p>
                    <p class="ordering-payment-policy-info">We offer easy and secure online ordering services. We offer
                        multiple choices of payment methods including credit and debit cards and bank transfers.</p>

                    <p class="ordering-payment-policy-heading" style="margin-bottom: 0.9vw;">We accept</p>
                    <p class="">
                        <p class="ordering-payment-policy-info payment-method">
                            <span class="marginRight-40">Credit or Debit Card and Cash Transactions</span>
                            {{-- <span class="marginRight-40">Cash Transactions</span> --}}
                            <span>
                                <span><img class="img-fluid" src="{{ asset('frontend/assets/images/visa_card.png') }}"
                                        alt="visa card"></span>
                                <span class="marginLeft-40"><img class="img-fluid"
                                        src="{{ asset('frontend/assets/images/master_card.png') }}"
                                        alt="master card"></span>
                                <span class="marginLeft-40"><img class="img-fluid"
                                        src="{{ asset('frontend/assets/images/dbbl_nexus.png') }}"
                                        alt="dbbl card"></span>
                            </span>
                        </p>
                    </p>

                    <p class="ordering-payment-policy-heading">Secure Payment Process </p>
                    <p class="ordering-payment-policy-info">To pay simply select the card you would like to use and
                        enter your card number and the date of expiry. During checkout, your card will be used
                        exclusively and will be treated with utmost security. Once your order is shipped your card will
                        be charged. However, for authentication Qbits may send a request for a pre-authorization.</p>

                    <p class="ordering-payment-policy-heading">Bank Transaction</p>
                    <p class="ordering-payment-policy-info" style="margin-bottom: -35px !important;">We also accept the
                        pre-payment method. Shortly after placing an order, you will receive an email containing details
                        about the bank transaction. Once the amount is credited to our bank account you will receive a
                        confirmation email and your order will be processed. However, If payment is not received within
                        30 days of the order, your order will be canceled according to our policy.</p>
                </div>
            </div>
        </div>
    </div>







    {{-- <section class="immense-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
               <div class="immense">
                <h1>Immense Power Yet Incredibly Simple</h1>
                    <p>Qbits introduces premium quality laptops with top level performance at affordable prices. Built to power your computing challenges for years to come.</p>
               </div>
            </div>
        </div>
    </div>
</section> --}}

    {{-- <div class="qbits-slider-section">
    <div class="container">
        <div class="slider-text">
            <p class="slider-heading">Immense Power Yet Incredibly Simple</p>
            <p class="slider-details">Qbits introduces premium quality laptops with top level performance at affordable prices. Built to power your computing challenges for years to come.</p>
        </div>
    </div>
</div> --}}










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
