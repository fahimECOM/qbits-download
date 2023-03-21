@extends('frontend.layouts.master')
@section('title','Qbits')
@section('content')
<style>
    body {
        overflow-x: hidden;
    }

    .shipping-policy-container {
        max-width: 1386px !important;
        background: #1D1D1F;
        margin-top: 60px !important;
        margin-bottom: 60px !important;
        border-radius: 30px;
        padding-bottom: 60px;
        padding-top: 55px;
        margin: 0 auto;
    }

    .shipping-policy-content ul {
        margin-top: -10px;
        margin-bottom: 10px;
    }

    .shipping-policy-content ul li {
        list-style-type: disc;
        color: #A0A0A5;
        font-size: 22px;
        font-weight: 500;
        font-family: 'Roboto';
        line-height: 29px;
        margin-left: -10px;
    }

    .shipping-policy-title {
        color: #fff;
        /* color: #A0A0A5; */
        text-align: center;
        margin-bottom: 40px;
        font-size: 22px;
        font-weight: 700;
        line-height: 29px;
    }

    .shipping-policy-heading {
        color: #fff;
        /* color: #A0A0A5; */
        font-weight: 500;
        font-size: 22px;
        margin-bottom: 12px;
        font-family: 'Roboto';
        line-height: 29px;
    }

    .shipping-policy-info {
        color: #A0A0A5;
        font-size: 20px;
        margin-bottom: 40px;
        font-weight: 400;
        font-family: 'Roboto';
        line-height: 27px;
    }

    .card-body {
        padding: 0 !important;
    }

    img.img-fluid-shipping-policy {
        object-fit: cover;
    }

    /* Mobile responsive css */
    @media (max-width: 480px) {
        .img-fluid-shipping-policy {
            max-width: 100%;
            height: 225px;
            object-fit: cover;
        }

        .shipping-policy-container {
            max-width: 370px;
            padding-bottom: 40px !important;
            padding-top: 35px !important;
        }

        .shipping-policy-title {
            margin-bottom: 25px;
            font-size: 22px;
        }

        .shipping-policy-heading {
            margin-bottom: 12px;
            line-height: 27px;
        }

        .shipping-policy-info {
            margin-bottom: 25px;
            line-height: 27px;
        }

        .pl-40 {
            padding-left: 10px;
        }

        .pr-40 {
            padding-right: 10px;
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
                    <img style="opacity: 0.8;width: 100%;" class="img-fluid-shipping-policy"
                        src="{{ asset('frontend/assets/images/shipping_policy.jpg') }}" alt="qbits-shipping-policy">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="">
    <div class="container">
        <div class="row shipping-policy-container">
            <div class="col-sm-12">
                <div class="pl-40 pr-40 shipping-policy-content">
                    <p class="shipping-policy-title">Shipping Policy</p>

                    <p class="shipping-policy-heading">Shipping Information</p>
                    <p class="shipping-policy-info">We understand how important it is for you to receive your merchandise quickly and reliably from Qbits. The Qbits team is committed to making the shipping process as simple as possible for their consumers. Qbits Delivery promises faster delivery by allowing for simple and stress-free processing at your preferred time and location. There are two types of approaches to choose from, they are inside Dhaka city or outside Dhaka city.</p>

                    <p class="shipping-policy-heading">Delivery Service</p>
                    <p class="shipping-policy-info">Qbits ensures faster delivery through easy processing in your
                        desired location/time. Inside Dhaka city, we assure delivery within 48 hours and outside Dhaka
                        city, Qbits Delivery service delivers within 5 working days upon completing the purchase.</p>

                    <p class="shipping-policy-heading">Delivery Process</p>
                    <p class="shipping-policy-info">Qbits delivers online ordering products via courier throughout the
                        country. One of the logistics carriers listed below will deliver your Qbits package.</p>

                    <ul>
                        <li>E-Desh</li>
                        <li>Pathao</li>
                        <li>Shop up</li>
                    </ul>

                    <p class="shipping-policy-info">Qbits guarantees speedier delivery by those easy and quick
                        processing systems. The Qbits delivery management team is committed to providing you with the
                        best experience possible while delivering a laptop.</p>

                    <p class="shipping-policy-heading">Free Delivery</p>
                    <p class="shipping-policy-info" style="margin-bottom: 0px;">For Dhaka city, Qbits provides free
                        shipping. For outside Dhaka, the delivery charge is applicable subject to the delivery payment
                        policy.</p>

                </div>
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
