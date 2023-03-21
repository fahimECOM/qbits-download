@extends('frontend.layouts.master')
@section('title','Qbits-Business')
@section('content')
<style>
    body {
        overflow-x: hidden;
    }

    .bussiness-container {
        max-width: 1386px !important;
        background: #1D1D1F;
        margin-top: 60px !important;
        margin-bottom: 60px !important;
        border-radius: 30px;
        padding-bottom: 55px;
        padding-top: 55px;
        margin: 0 auto;
    }

    .bussiness-title {
        color: #ffffff;
        text-align: center;
        margin-bottom: 22px;
        font-size: 22px;
        font-weight: 700;
        line-height: 29px;
    }

    .bussiness-heading {
        color: #ffffff;
        font-weight: 500;
        font-size: 22px;
        margin-bottom: 12px;
        font-family: 'Roboto';
        line-height: 29px;
    }

    .bussiness-info {
        color: #A0A0A5;
        font-size: 20px;
        margin-bottom: 22px;
        font-weight: 400;
        font-family: 'Roboto';
        line-height: 27px;
    }

    .marginBottom-30 {
        margin-bottom: 30px;
    }

    .card-body {
        padding: 0 !important;
    }

    img.img-fluid-business {
        object-fit: cover;
    }

    /* Mobile responsive css */
    @media (max-width: 480px) {
        .bussiness-container {
            max-width: 370px;
            padding-bottom: 40px !important;
            padding-top: 35px !important;
        }

        .bussiness-title {
            margin-bottom: 25px;
            font-size: 22px;
        }

        .bussiness-heading {
            margin-bottom: 12px;
            line-height: 27px;
        }

        .bussiness-info {
            margin-bottom: 25px;
            line-height: 27px;
        }

        .pl-40 {
            padding-left: 10px;
        }

        .pr-40 {
            padding-right: 10px;
        }

        .marginBottom-30 {
            margin-bottom: 30px;
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
                <p class="text-center">We will offer 10% off. <a href="javascript:void(0)"
                    style="text-decoration: none" onclick="offerCode()">Click for code ></a></p>
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
                    <img style="opacity: 0.8;width: 100%;" class="img-fluid-business"
                        src="{{ asset('frontend/assets/images/qbits_business.jpg') }}" alt="qbits-business">
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
        <div class="row bussiness-container">
            <div class="col-sm-12">
                <div class="pl-40 pr-40">
                    <p class="bussiness-title">Qbits for your Business</p>

                    <p class="bussiness-heading">Your Business Team Always Ready to Help</p>
                    <p class="bussiness-info">Your passion is our satisfaction and we believe in Service. Our support
                        team is always ready to provide you with incredible services. Get the Best Service, Right Time,
                        Right People. They will help you to find the best financing option, special pricing, and offers.
                        Tell you which is why you make your investment.</p>

                    <p class="bussiness-heading">Qbits at Work</p>
                    <p class="bussiness-info">Most Powerful tools allow you to work simply better. Give a big boost to
                        your workstation, run your business all the better, and collaborate with your team like a pro.
                        Qbits at work just make things easier.</p>

                    <p class="bussiness-heading">Keep Productivity Seamless </p>
                    <p class="bussiness-info">Discover potentiality, protect your investment, solve business challenges,
                        and stay focused on reinventing your business. Qbits space saver laptops are made for 48-hour
                        work in a week and will support your business needs. And it’s all compatible with apps from
                        Microsoft and Google, so your team has everything it needs to get any job done to make the
                        business profitable.</p>

                    <p class="bussiness-heading">Make An Excellent Investment</p>
                    <p class="bussiness-info">Choosing the best laptop for business is a significant decision. After
                        all, you need something that is long-lasting, secure, powerful, light, and capable of lasting
                        through a long workday—and you have a lot of choices. You can count on Qbits for this process of
                        decision-making. We offer the best business laptops that can get all the job done. Our laptops
                        are built to last for a long time, making them an excellent investment. After purchasing our
                        products, create an account on our website and stay in touch with us for incredible support and
                        services.</p>

                    <p class="bussiness-heading">Qbits Match to Your Style </p>
                    <p class="bussiness-info">Work with style with the best laptops for maximum productivity and
                        effortless multitasking. Solve your business problems efficiently, Qbits laptops let you get
                        through a full working day — and beyond.</p>

                    <p class="bussiness-heading">Your Ultimate Workstation </p>
                    <p class="bussiness-info">Let you do what you need to do. The ultimate platform for doing big and
                        creative work. Qbits laptops combine surprisingly powerful performance and flexibility, allowing
                        your team to collaborate instantly - like never before. Make content-sharing and presentations
                        easy and effective.</p>

                    <p class="bussiness-heading marginBottom-30">Be the Leader and Solve Problems More Creatively.
                        Manage Your Business Like a Boss. </p>

                    <p class="bussiness-heading">Get Prompt Support from Qbits</p>
                    <p class="bussiness-info" style="margin-bottom: 0px;">At no additional charge, we can help you
                        choose the correct hardware and devices and find financing choices that meet your budget.
                        Support from Qbits is available whenever your company requires assistance.</p>
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
