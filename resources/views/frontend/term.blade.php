@extends('frontend.layouts.master')
@section('title','Qbits')
@section('content')
<style>
    body {
        overflow-x: hidden;
    }

    .term-container {
        max-width: 1386px !important;
        background: #1D1D1F;
        margin-top: 60px !important;
        margin-bottom: 60px !important;
        border-radius: 30px;
        padding-bottom: 53px;
        padding-top: 52px;
        margin: 0 auto;
    }

    .term-title {
        color: #ffffff;
        /* color: #A0A0A5; */
        text-align: center;
        margin-bottom: 40px;
        font-size: 22px;
        font-weight: 700;
        line-height: 29px;
    }

    .term-heading {
        color: #ffffff;
        /* color: #A0A0A5; */
        font-weight: 500;
        font-size: 22px;
        margin-bottom: 11px;
        font-family: 'Roboto';
        line-height: 29px;
    }

    .term-info {
        color: #A0A0A5;
        font-size: 22px;
        margin-bottom: 40px;
        font-weight: 400;
        font-family: 'Roboto';
        line-height: 27px;
    }

    .card-body {
        padding: 0 !important;
    }

    img.img-fluid-terms {
        object-fit: cover;
    }

    /* Mobile responsive css */
    @media (max-width: 480px) {
        .img-fluid-terms {
            max-width: 100%;
            height: 225px;
            object-fit: cover;
        }

        .term-container {
            max-width: 370px;
            padding-bottom: 37px !important;
            padding-top: 33px !important;
        }

        .term-title {
            margin-bottom: 25px;
            font-size: 22px;
        }

        .term-heading {
            margin-bottom: 12px;
            line-height: 27px;
        }

        .term-info {
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

@include('frontend.discount')

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

<div class="qbits-slider">
    <div class="">
        <div class="">
            <div class="">
                <div class="">
                    <img style="opacity: 0.8;width: 100%;" class="img-fluid-terms"
                        src="{{ asset('frontend/assets/images/qbits_about.jpg') }}" alt="qbits-terms-condition">
                </div>
            </div>
        </div>
    </div>
</div>


<div class="privacy-page-content">
    <div class="container">
        <div class="row term-container">
            <div class="col-sm-12">
                <div class="pl-40 pr-40">
                    <p class="term-title">Terms and Conditions</p>

                    <p class="term-info">Thank you for taking the time to visit the Qbits website. These Terms and Conditions are a legally enforceable contract between you and the Qbits, whether you are an individual or a company. Our site's use and access are governed by the following rules and policies. You agree to the standards and policies established on our site by using it. If you do not agree to these terms and the product or support is delivered, do not use, or access the product or support and services. If you have any questions or seek clarification concerning the information provided in the terms and conditions of use, please contact our Customer Service staff through email, or phone so that we can resolve your issues.</p>

                    <p class="term-heading">Updating Terms and Conditions</p>
                    <p class="term-info">These Terms and Conditions may be altered at any moment. You are responsible for reading these Terms and Conditions on a regular basis to ensure that you are aware of any changes. By continuously using our site, you acknowledge that you have agreed to these changes.</p>

                    <p class="term-heading">Privacy</p>
                    <p class="term-info">We value your privacy and invite you to read our Privacy Statement before using
                        our website so that you may make an informed decision about whether or not to use our site.
                        Please contact us for further information if you have any questions or concerns about our
                        policy.</p>

                    <p class="term-heading">Product Warranty Policies</p>
                    <p class="term-info">In accordance with our Product Warranty Policies, we provide technical support for all of our hardware. We suggest that you review our Warranty Policy page for further information concerning warranty support and services. By completing the registration form for a website account, you will be able to take advantage of the numerous offers we make from time to time.</p>

                    <p class="term-heading">Creating a website account</p>
                    <p class="term-info">When you register on our website, you agree to take the responsibility for any
                        activities that occur under your account or password. This means you're in charge of keeping
                        your account and password secure, as well as limiting access to your computer to prevent illegal
                        access.</p>

                    <p class="term-heading">Age restriction to buy our items</p>
                    <p class="term-info">Children under the age of 18 are not permitted to purchase our products. Only
                        adults are allowed to purchase our items. You represent to us that you are at least 18 years old
                        by using this site. The Qbits team will not be held liable for any damages incurred as a result
                        of a user's age misrepresentation on our site.</p>

                    <p class="term-heading">Accuracy of Information</p>
                    <p class="term-info">We make every effort to provide you with up-to-date information on our products
                        and services. With respect to product descriptions, technical specifications, pricing, and
                        availability, the material on our website may occasionally contain typographical errors,
                        inaccuracies, or omissions. We apologize for any inaccuracies and urge. Please inform us if you
                        spot anything that seems incorrect to you.</p>

                    <p class="term-heading">Right Reserved by US</p>
                    <p class="term-info">The Qbits team reserves the right to refuse service, terminate accounts, take
                        away or edit content, or cancel purchases at any time.</p>

                    <p class="term-heading">Copyright</p>
                    <p class="term-info" style="margin-bottom: 0px;">All of the content on this site is owned by Qbits,
                        including text, graphics, logos, button icons, photos, and videos. You are free to use product
                        photographs for non-commercial uses without restriction or approval. Please contact us if you
                        are interested in selling our items.</p>

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
