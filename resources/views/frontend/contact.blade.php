@extends('frontend.layouts.master')
@section('title','Contact')
@section('content')
<style>
    .card {
        min-height: 335px;
        border-radius: 15px;
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
        position: absolute;
        bottom: 4px;
    }

    a.phone-number {
        font-size: 20px;
        line-height: 24px;
        font-family: "Roboto", sans-serif;
        font-style: normal;
        text-decoration: none;
        display: inline-block;
        color: #ffffff;
        opacity: 100%;
    }

    a.phone-number::after {
        content: "";
        display: block;
        width: 0;
        height: 2px;
        background: #0071e3;
        transition: width 0.3s;
    }


    a.phone-number:hover::after {
        width: 0%;
    }

    /* Mobile responsive css */
    @media (max-width: 480px) {
        .img-fluid {
            max-width: 100%;
            height: 225px;
            object-fit: cover;
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
                        <?php } ?><a href="{{ route('contact')}}">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</Section>

@include('frontend.discount')

<div class="qbits-slider" style="margin-bottom: 60px;">
    <div class="">
        <div class="">
            <div class="">
                <div class="">
                    <img class="img-fluid" src="{{ asset('frontend/assets/images/banner1212.png') }}"
                        alt="qbits-banner ">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- <p class="text-center" style="color: white;font-size:22px;">We’re here for you</p> -->
                <p class="return-policy-title"> Contact Qbits Care</p>
            </div>
        </div>
    </div>
</div>

<div class="">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="card" style="background-color:#1D1D1F;padding:20px;font-size:22px;margin-bottom:20px;">
                    <div class="card-body">
                        <p class="return-policy-heading ">Message us</p>
                        <p class="return-policy-info">Get support from Qbits experts and Qbits care<br>
                            pros, 24 hours a day, 7 days a week.</p>
                        <h1 style="color: #A0A0A5;">02-58055541</h1>
                        <p class="return-policy-info-p">Chat with us</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="card" style="background-color:#1D1D1F;padding:16px;font-size:22px;margin-bottom:20px;">
                    <div class="card-body">
                        <p class="return-policy-heading ">Help with your order</p>
                        <p class="return-policy-info">Get assistance or track your order status</p>
                        <p class="return-policy-info mt-5"><a href="https://myqbits.com/order/listing" class="social-icon order-button" style="text-decoration: none;">View order status</a></p>
                        <p class="return-policy-info-p">Order Help</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="card" style="background-color:#1D1D1F;padding:20px;font-size:22px;margin-bottom:20px;">
                    <div class="card-body">
                        <p class="return-policy-heading ">Find us on social media</p>
                        <p class="return-policy-info">Like, connect and follow on us Instagram or Facebook<br> and stay
                            informed of the latest updates, and special<br> offers.</p>
                            <a target="_blank" href="https://www.facebook.com/myqbits/"><i class="fa-brands fa-facebook social-icon" style="font-size:30px;color: white;"></i></a>
                            <a target="_blank"  href="https://www.youtube.com/channel/UCEdZdmUfUuZWqhDT1CnUjZw"> <i class="fa-brands fa-youtube social-icon" style="font-size:30px;color: white;"></i></a>
                        <p class="return-policy-info-p">Chat with us</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="card" style="background-color:#1D1D1F;padding:16px;font-size:22px;margin-bottom:20px;">
                    <div class="card-body">
                        <p class="return-policy-heading ">Ask the community</p>
                        <p class="return-policy-info">Browse answers, ask questions and get<br>solutions from other
                            Qbits
                            customers.</p>
                        <p class="return-policy-info-p">Join discussion</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card" style="background-color:#1D1D1F;padding:20px;font-size:22px;margin-bottom:20px;">
                    <div class="card-body">
                        <p class="return-policy-heading ">Give us a call</p>
                        <p class="return-policy-info">Speak directly with a Qbits or schedule a time for us to call
                            you.
                            Qbits is working to support you and <br>
                            keep our staff safe. Because of this, our phone hours of operation have changed.
                        </p>
                        <p class="return-policy-info">Mobile support</p>
                        <address class="return-policy-info">
                            <span>8 AM - 12 AM Daily</span><br>
                            T & Computing Support<br>
                            8 AM - 9 PM, Mon, Thu, Fri<br>
                            Closed Sunday<br>
                            <a class="phone-number" href="tel: 02-58055541">02-58055541</a>

                            <!-- <abbr title="Phone">00-000-000</abbr><br>
                            <abbr title="Phone">00-000-000</abbr><br> -->
                        </address>
                    </div>
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
