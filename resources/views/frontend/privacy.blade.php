@extends('frontend.layouts.master')
@section('title','Qbits')
@section('content')
<style>
    body {
        overflow-x: hidden;
    }

    .privacy-container {
        max-width: 1386px !important;
        background: #1D1D1F;
        margin-top: 60px !important;
        margin-bottom: 60px !important;
        border-radius: 30px;
        padding-bottom: 58px;
        padding-top: 55px;
        margin: 0 auto;
    }

    .privacy-title {
        color: #ffffff;
        /* color: #A0A0A5; */
        text-align: center;
        margin-bottom: 40px;
        font-size: 22px;
        font-weight: 700;
        line-height: 29px;
    }

    .privacy-heading {
        color: #ffffff;
        /* color: #A0A0A5; */
        font-weight: 500;
        font-size: 22px;
        margin-bottom: 11px;
        font-family: 'Roboto';
        line-height: 29px;
    }

    .privacy-info {
        color: #A0A0A5;
        font-size: 22px;
        margin-bottom: 40px;
        font-weight: 400;
        font-family: 'Roboto';
        line-height: 27px;
    }

    .privacy-info-p {
        color: #A0A0A5;
        font-size: 22px;
        margin-bottom: 22px;
        font-weight: 400;
        font-family: 'Roboto';
        line-height: 27px;
    }

    .card-body {
        padding: 0 !important;
    }

    img.img-fluid-faq {
        object-fit: cover;
    }

    /* Mobile responsive css */
    @media (max-width: 480px) {
        .img-fluid-faq {
            max-width: 100%;
            height: 225px;
            object-fit: cover;
        }

        .privacy-container {
            max-width: 370px;
            padding-bottom: 37px !important;
            padding-top: 33px !important;
        }

        .privacy-title {
            margin-bottom: 25px;
            font-size: 22px;
        }

        .privacy-heading {
            margin-bottom: 12px;
            line-height: 27px;
        }

        .privacy-info,
        .privacy-info-p {
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
                        <a>Drivers & Manuals</a>
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
                    <img style="opacity: 0.8;width: 100%;" class="img-fluid-faq"
                        src="{{ asset('frontend/assets/images/privacy.jpg') }}" alt="qbits-privacy-policy">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="">
    <div class="container">
        <div class="row privacy-container">
            <div class="col-sm-12">
                <div class="pl-40 pr-40">
                    <p class="privacy-title">Qbits Privacy Policy</p>

                    <p class="privacy-info-p">Qbits's Privacy Policy manifests how Qbits collects, protects, uses, and shares personal data provided by website users. We are committed to the privacy of our visitors. The privacy policy is designed to clarify explicitly how we disclose, transfer, and store your information. This Privacy Policy includes all the types of information that is collected and recorded by Qbits.</p>
                    <p class="privacy-info-p">This Privacy Policy statement acknowledges fundamental human rights, privacy protection, and personal data security. We strive to comply with legal entities, and business processes, all applicable laws on privacy, and consistent, rigorous policies and procedures.</p>
                    {{-- <p class="privacy-info-p">This Privacy Policy statement acknowledges the fundamental human rights,
                        privacy protection and personal data security. We strive to comply with legal entities, business
                        processes, with all applicable laws on privacy and consistent, rigorous policies and procedures.
                    </p> --}}
                    <p class="privacy-info">The privacy of users is a priority. We collect and store personal data
                        lawfully and in a fair manner with utmost transparency. We only collect and process data when it
                        is absolutely necessary for the legitimate purposes of operating our business, advancing
                        innovation, and providing an improved customer experience.</p>

                    <p class="privacy-heading">How Do We Collect Data?</p>
                    <p class="privacy-info">The personal data that Qbits collects depends on the customer's interaction
                        with Qbits products and services. We collect information provided by you while ordering or
                        registering your product on our site. When you browse our site or receive customer support
                        services, we collect only the data that we need for specific purposes, understanding your
                        interest and improving your experience.</p>

                    <p class="privacy-heading">How Qbits Uses Data?</p>
                    <p class="privacy-info-p">Qbits may use your personal data to advance our services, enhance the quality of Qbits products, provide a premium user experience, to communicate with you for security and fraud prevention.</p>
                    <p class="privacy-info-p">To help you with delivery services assisting you in completing transactions and giving updates about the shipment facilitating repairs and returns as well as with the issue of invoices.</p>
                    <p class="privacy-info-p">Qbits collect data to improve our offerings, for auditing surveys or data
                        analysis. Your daily activities and the activity results will be stored and analyzed to power
                        our services.</p>
                    <p class="privacy-info-p">We collect data and scrutinize your question, interest, and request to provide you with comprehensive customer support services and fulfill your product repair requests.</p>
                    <p class="privacy-info-p">To process and fulfill your Qbits product registration you have signed up
                        for and to keep you up to date with the latest technologies, news, promotions, and upcoming
                        events. We collect information to administer your account and process shipment.</p>
                    <p class="privacy-info-p">To communicate with you by maintaining accurate contact and registration
                        data. We also use your data to personalize your experience and communications you receive to
                        deliver comprehensive services by creating recommendations based on your use of Qbits Services.
                    </p>
                    <p class="privacy-info">To provide you with improved performance and operation of our products,
                        personalized marketing services, solutions, and support, including warranty support.</p>

                    <p class="privacy-heading">Do We Use Cookies</p>
                    <p class="privacy-info">Qbits Uses Cookies to store information about your preferences and interests
                        as you interact with Qbits services. The information is used for various purposes including
                        optimizing the users’ experience by customizing our web page content based on visitors’ browser
                        type, authentication, session monitoring, storage of information on specific configurations
                        regarding users accessing the server, storage of preferences, etc.</p>

                    <p class="privacy-heading">Privacy and Security</p>
                    <p class="privacy-info" style="margin-bottom: 0px;">Qbits always guarantee privacy and security with
                        heightened priority. We strive to ensure the protection of personal information from
                        unauthorized access, alteration, disclosure, or destruction. To make sure your personal data is
                        secure we take precautions and conduct internal reviews of our data collection, storage, and
                        processing practices and technical and organizational security measures to protect your personal
                        data and manage customers' privacy.</p>
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
