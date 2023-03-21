@extends('frontend.layouts.master')
@section('title','Qbits-Education')
@section('content')
<style>
    body {
        overflow-x: hidden;
    }

    .education-container {
        max-width: 1386px !important;
        background: #1D1D1F;
        margin-top: 60px !important;
        margin-bottom: 60px !important;
        border-radius: 30px;
        padding-bottom: 55px;
        padding-top: 55px;
        margin: 0 auto;
    }

    .education-title {
        color: #ffffff;
        text-align: center;
        margin-bottom: 22px;
        font-size: 22px;
        font-weight: 700;
        line-height: 29px;
    }

    .education-heading {
        color: #ffffff;
        font-weight: 500;
        font-size: 22px;
        margin-bottom: 12px;
        font-family: 'Roboto';
        line-height: 29px;
    }

    .education-info {
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

    img.img-fluid-education {
        object-fit: cover;
    }

    /* Mobile responsive css */
    @media (max-width: 480px) {
        .education-container {
            max-width: 370px;
            padding-bottom: 40px !important;
            padding-top: 35px !important;
        }

        .education-title {
            margin-bottom: 25px;
            font-size: 22px;
        }

        .education-heading {
            margin-bottom: 12px;
            line-height: 27px;
        }

        .education-info {
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
                    <div class="middle-menu-li d-flex justify-content-center" style="margin-left: 2.1vw;">
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
                    <img style="opacity: 0.8;width: 100%;" class="img-fluid-education"
                        src="{{ asset('frontend/assets/images/qbits_education.jpg') }}" alt="qbits-education-banner">
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
        <div class="row education-container">
            <div class="col-sm-12">
                <div class="pl-40 pr-40">
                    <p class="education-title">Qbits for Education</p>

                    <p class="education-heading">An Inspiring Journey to Excellence</p>
                    <p class="education-info">Explore excellence beyond the limits. Qbits technology and resources are designed to create diverse learning opportunities. Every individual is different and has their own ideas - Qbits laptops help build independent and creative thinkers, with their own purpose. Built tools for education that inspires - every student and enthusiastic learner.</p>

                    <p class="education-heading">Global Academic Experience</p>
                    <p class="education-info">Better
                        learning shapes the future. Qbits laptops have been built for young minds to unlock their
                        potential. Let you experience the differences. We developed the technology the way you learn
                        best. Explore and learn cultural diversity and share uncommon excellence of thought. Qbits
                        tech turns the world into a modern, global school for a modern, global academic experience.
                    </p>

                    <p class="education-heading">Revolutionary Way to Educate</p>
                    <p class="education-info">Turn the school into a modern classroom. Engage your student in creative work, and research and conduct experiments using the best technology for the best outcome. Let them learn through discovery. Incredibly powerful tools help staff and faculty create a success-oriented learning environment for students to experience the challenges of the changing world and discover the best possible solutions.</p>

                    <p class="education-heading">Educational Innovation</p>
                    <p class="education-info">Qbits technology keeps students ahead of the curve. Set up an institution with the best laptops and discover how technology in learning boosts student outcomes. The intuitive tools with power flexibility help staff and faculties create collaboration and amazing classroom experiences and students to innovate all things possible.</p>

                    <p class="education-heading marginBottom-30">Integrating technology into your
                        lesson plans can make a significant impact in the classroom while teaching. </p>

                    <p class="education-heading">Powerful. Smart.Unstoppable</p>
                    <p class="education-info">Deliver the
                        power to be your best. Do your innovative projects, timely research, assignments, and
                        presentations. Qbits technology keeps you unstoppable and seamless. So you can focus on what
                        matters most.</p>

                    <p class="education-heading">Remote Learning</p>
                    <p class="education-info">Explore the universe and learn about diverse cultures from anywhere. Qbits technology have you connected to the world.</p>

                    <p class="education-heading">Remote Learning Works Best on Qbits</p>
                    <p class="education-info" style="margin-bottom: 0px;">Without a good laptop, you can't get through school or college nowadays. Remote learning is the beginning of a revolutionary way to educate students. When all of the machine's gears are turning smoothly and efficiently, remote learning works best. Qbits offers a laptop you can count on for your journey to excellence. We have the best laptops to use in a distance learning setting. Our laptops are designed to last a long time, making them a good choice. You can use the laptop not only at home, but also in college, graduate school, or in your future job. The ideal opportunity for learners to study, explore, and even change the world.</p>
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
