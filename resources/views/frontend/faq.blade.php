@extends('frontend.layouts.master')
@section('title','FAQ')
@section('content')
<style>
    body {
        overflow-x: hidden;
    }

    .faq-container {
        max-width: 1386px;
        background: #1C1C1E;
        margin-top: 60px !important;
        margin-bottom: 60px !important;
        border-radius: 30px;
        padding-bottom: 50px;
        padding-top: 55px;
        margin: 0 auto;
    }

    .faq-title {
        color: #ffffff;
        /* color: #A0A0A5; */
        text-align: center;
        margin-bottom: 40px;
        font-size: 22px;
        font-weight: 700;
        line-height: 29px;
    }

    .faq-bottomContentBox {
        margin-bottom: 105px;
    }

    .faq_accordian {
        max-width: 1020px;
        margin: 0 auto;
    }

    .faq_accordian .contentBox {
        position: relative;
        margin: 10px 20px;
    }

    .faq_accordian .contentBox .faq_label {
        position: relative;
        padding: 15px 25px;
        background: #272727;
        color: #ffffff;
        /* color: #A0A0A5; */
        font-size: 22px;
        font-family: Roboto;
        font-weight: 500;
        line-height: 29px;
        cursor: pointer;
        border-radius: 10px;
        height: 55px;
    }

    .faq_accordian .contentBox .faq_label::before {
        content: '+';
        position: absolute;
        font-size: 22px;
        font-family: Roboto;
        font-weight: 400;
        line-height: 28px;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
        border: 1px solid #A0A0A5;
        height: 30px;
        width: 30px;
        border-radius: 50%;
        padding-left: 9px;
    }

    .faq_accordian .contentBox.active .faq_label::before {
        content: '-';
        font-size: 25px;
        font-family: Roboto;
        font-weight: 400;
        line-height: 27px;
        right: 20px;
        border: 1px solid #A0A0A5;
        height: 30px;
        width: 30px;
        border-radius: 50%;
        padding-left: 11px;
    }

    .faq_accordian .contentBox .faq_content {
        position: relative;
        background: #272727;
        color: #707070;
        font-size: 22px;
        font-family: Roboto;
        font-weight: 400;
        max-height: 0;
        overflow: hidden;
        transition: 0.5s;
        overflow-y: hidden;

    }

    .faq_accordian .contentBox.active .faq_content {
        max-height: 250px;
        padding: 10px 25px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        padding-bottom: 30px !important;

    }

    .faq_accordian .contentBox.active .faq_label {
        border-bottom-right-radius: 0px;
        border-bottom-left-radius: 0px;
    }

    .marginTop-40 {
        margin-top: 2vw !important;
    }

    img.img-fluid-faq {
        object-fit: cover;
    }

    /* Mobile responsive styles */
    @media (max-width: 480px) {
        .faq-container {
            max-width: 370px;
            padding-bottom: 30px;
            padding-top: 35px;
        }

        .faq_accordian .contentBox {
            margin: 10px -20px;
        }

        .faq_accordian .contentBox .faq_label {
            padding: 15px 15px;
            font-size: 15px;
            line-height: 17px;
            max-height: 100px;
            padding-right: 48px !important;
        }

        .faq_accordian .contentBox .faq_label::before {
            right: 10px;
        }

        .faq_accordian .contentBox.active .faq_content {
            max-height: 250px;
            padding: 10px 15px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            font-size: 15px;
            padding-bottom: 25px !important;
        }

        .faq_accordian .contentBox .faq_label::before {
            font-size: 15px;
            line-height: 29px;
            height: 28px;
            width: 28px;
            border-radius: 50%;
            padding-left: 9px;
        }

        .faq_accordian .contentBox.active .faq_label::before {
            font-size: 25px;
            line-height: 25px;
            right: 10px;
            height: 28px;
            width: 28px;
            border-radius: 50%;
            padding-left: 10px;
        }

        .faq_accordian .contentBox .faq_content {
            font-size: 15px;
        }
    }

    @media (min-width: 481px) and (max-width: 820px) {
        .faq-container {
            max-width: 520px;
            padding-bottom: 30px;
            padding-top: 35px;
        }

        .faq_accordian .contentBox {
            margin: 10px -20px;
        }

        .faq_accordian .contentBox .faq_label {
            padding: 21px 15px;
            font-size: 18px;
            line-height: 17px;
            max-height: 100px;
            padding-right: 48px !important;
        }

        .faq_accordian .contentBox .faq_label::before {
            right: 10px;
        }

        .faq_accordian .contentBox.active .faq_content {
            max-height: 250px;
            padding: 10px 15px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            font-size: 18px;
            padding-bottom: 25px !important;
        }

        .faq_accordian .contentBox .faq_label::before {
            font-size: 18px;
            line-height: 26px;
            height: 28px;
            width: 28px;
            border-radius: 50%;
            padding-left: 8px;
        }

        .faq_accordian .contentBox.active .faq_label::before {
            font-size: 18px;
            line-height: 27px;
            right: 10px;
            height: 28px;
            width: 28px;
            border-radius: 50%;
            padding-left: 11px;
        }

        .faq_accordian .contentBox .faq_content {
            font-size: 18px;

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
                    <img style="opacity: 0.8;width: 100%;" class="img-fluid-faq"
                        src="{{ asset('frontend/assets/images/faq.png') }}" alt="faq banner">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="">
    <div class="container">
        <div class="row faq-container">
            <div class="col-sm-12">
                <div class="pl-40 pr-40">
                    <p class="faq-title">FAQ</p>

                    <div class="faq_accordian">
                        <div class="contentBox">
                            <div class="faq_label">How do I check my order status?</div>
                            <div class="faq_content">
                                To check your order status, please contact our support center.
                            </div>
                        </div>

                        <div class="contentBox marginTop-40">
                            <div class="faq_label">Can I change the shipping address on my order?</div>
                            <div class="faq_content">
                                Qbits does not make any changes once the order is placed. Before placing an order make sure you have provided your desired address.
                            </div>
                        </div>

                        <div class="contentBox marginTop-40">
                            <div class="faq_label">What payment methods does Qbits accept?</div>
                            <div class="faq_content">
                                We accept Credit or Debit Card, VISA, Master Card, DBBL Nexus, and Cash Transactions
                            </div>
                        </div>

                        <div class="contentBox marginTop-40">
                            <div class="faq_label">How can I register my laptop?</div>
                            <div class="faq_content">
                                If you purchased a Qbits, go to the product registration page of our website and enter your verified email and the serial number of your laptop.
                            </div>
                        </div>

                        <div class="contentBox marginTop-40">
                            <div class="faq_label">How long does the Qbits laptop have a warranty?</div>
                            <div class="faq_content">
                                We offer a 2-year limited hardware warranty.
                            </div>
                        </div>

                        <div class="contentBox marginTop-40">
                            <div class="faq_label">How can I check my laptop warranty?</div>
                            <div class="faq_content">
                                To check your laptop warranty go to the Qbits website, enter your serial number, and check your warranty status. Or you can contact our support center. To check your laptop warranty go to your website, enter your serial number, and check your warranty status. Or you can contact our support center.
                            </div>
                        </div>

                        <div class="contentBox marginTop-40">
                            <div class="faq_label">Where can I buy Qbits products?</div>
                            <div class="faq_content">
                                Shop either on our physical store or online store.
                            </div>
                        </div>

                        <div class="contentBox marginTop-40 faq-bottomContentBox">
                            <div class="faq_label">What is the coverage of the warranty policy?</div>
                            <div class="faq_content">
                                The authorized service provider provides immediate service for any defect in the parts/components that are covered by the warranty policy.
                            </div>
                        </div>
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
    $(document).ready(function () {
        const accordion = document.getElementsByClassName('contentBox');

        for (i = 0; i < accordion.length; i++) {
            accordion[i].addEventListener('click', function () {
                this.classList.toggle('active')
            })
        }
    });


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
