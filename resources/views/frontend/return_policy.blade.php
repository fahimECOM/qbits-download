@extends('frontend.layouts.master')
@section('title','Qbits')
@section('content')
<style>
    body {
        overflow-x: hidden;
    }

    .return-policy-container {
        max-width: 1386px !important;
        background: #1D1D1F;
        margin-top: 60px !important;
        margin-bottom: 60px !important;
        border-radius: 30px;
        padding-bottom: 58px;
        padding-top: 55px;
        margin: 0 auto;
    }

    .return-policy-title {
        /* color: #A0A0A5; */
        color: #fff;
        text-align: center;
        margin-bottom: 40px;
        font-size: 22px;
        font-weight: 700;
        line-height: 29px;
    }

    .return-policy-heading {
        /* color: #A0A0A5; */
        color: #fff;
        font-weight: 500;
        font-size: 22px;
        margin-bottom: 11px;
        font-family: 'Roboto';
        line-height: 29px;
    }

    .return-policy-info {
        color: #A0A0A5;
        font-size: 20px;
        margin-bottom: 40px;
        font-weight: 400;
        font-family: 'Roboto';
        line-height: 27px;
    }

    .return-policy-info-p {
        color: #A0A0A5;
        font-size: 20px;
        margin-bottom: 20px;
        font-weight: 400;
        font-family: 'Roboto';
        line-height: 27px;
    }

    .card-body {
        padding: 0 !important;
    }

    img.img-fluid-return-policy {
        object-fit: cover;
    }

    /* Mobile responsive css */
    @media (max-width: 480px) {

        .img-fluid-return-policy {
            max-width: 100%;
            height: 225px;
            object-fit: cover;
        }

        .return-policy-container {
            max-width: 370px;
            padding-bottom: 37px !important;
            padding-top: 33px !important;
        }

        .return-policy-title {
            margin-bottom: 25px;
            font-size: 22px;
        }

        .return-policy-heading {
            margin-bottom: 12px;
            line-height: 27px;
        }

        .return-policy-info,
        .return-policy-info-p {
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
                    <img style="opacity: 0.8;width: 100%;" class="img-fluid-return-policy"
                        src="{{ asset('frontend/assets/images/qbits_return_policy.jpg') }}" alt="qbits return policy">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="">
    <div class="container">
        <div class="row return-policy-container">
            <div class="col-sm-12">
                <div class="pl-40 pr-40">
                    <p class="return-policy-title">Return Policy</p>

                    <p class="return-policy-heading">Cancellation and Return</p>
                    <p class="return-policy-info">Qbits always make life easier, and we ensure a 100% customer satisfaction guarantee. If the customers are not satisfied with our product, we offer an easy and hassle-free return and replacement or repair for damaged or wrong delivery that is covered by our return policy.</p>

                    <p class="return-policy-heading">Order Cancellation</p>
                    <p class="return-policy-info">For canceling an order Qbits customers need to contact the support
                        center or you may cancel an order directly through the order detail pages. A cancellation
                        request will be accepted if it is found eligible after being reviewed and verified by our expert
                        team. No order will be canceled that has already been shipped or received.</p>

                    <p class="return-policy-heading">Return Policy</p>
                    <p class="return-policy-info-p">If the customer purchases from our shop, the customer will be responsible to check. If there is any defect/error on the product or the parts used to manufacture, the return request will not be accepted. In this case, the customer will be provided with a warranty service covered by the warranty policy.</p>
                    <p class="return-policy-info-p">If the customer purchases from Qbits online store and finds any
                        manufacturing defect or imperfection, customers are advised to submit a return request within 24
                        hours.</p>
                    <p class="return-policy-info-p">If any problem or error is not reported to the Qbits support center within 24 hours, it will be entitled to the warranty policy. The returned product should be sent to Qbits Store within 5 working days from the date of delivery.</p>
                    <p class="return-policy-info-p">Qbits will be responsible for the wrong shipment by the Qbits Online
                        Store. Return will be accepted if it is found eligible after verifying.</p>
                    <p class="return-policy-info-p">In case of an incorrect order placed by a customer, Qbits will not
                        be
                        responsible after having been shipped.</p>
                    <p class="return-policy-info-p">The customer must send the return with its original package all inbox, warranty/ guarantee card, freebies, and accessories including mice, keyboards, etc. The package should be unopened with the original sticker.</p>
                    <p class="return-policy-info-p">Customers will be responsible for return shipping and handling fees
                        and any applicable restocking fees.</p>
                    <p class="return-policy-info-p">In the case of shipped orders, 50% of the return charge will be applied inside Dhaka city and for outside Dhaka city, a 100% return charge will be applied.</p>
                    <p class="return-policy-info">If there is damage, scratched, or missing major components, the customers are advised to report to the respective courier. If the customer receives any product damaged during the transaction Qbits will not be responsible in this case.</p>

                    <p class="return-policy-heading">How will I return a Product?</p>
                    <p class="return-policy-info-p">1. Contact the seller Center of the Qbits Online Store.</p>
                    <p class="return-policy-info-p">2. Make a return request within 24 hours through the order details
                        page.</p>
                    <p class="return-policy-info-p">3. Provide detailed information such as - Product model, Serial number, and Product number.</p>
                    <p class="return-policy-info">4. Report the problems in detail.</p>

                    <p class="return-policy-heading">Refund Policy</p>
                    <p class="return-policy-info" style="margin-bottom: 0px;">If the product does not work properly or
                        any manufacturing defect is reported from the day of receiving the product, customers are
                        suggested to bring it back to the Qbits store. After verifying the issues payment will be
                        refunded within 30 days.</p>
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
