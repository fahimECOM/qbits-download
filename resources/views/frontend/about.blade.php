@extends('frontend.layouts.master')
@section('title','Qbits')
@section('content')
<style>
    body {
        overflow-x: hidden;
    }

    .aboutus-container {
        max-width: 1386px !important;
        background: #1D1D1F;
        margin-top: 60px !important;
        margin-bottom: 60px !important;
        border-radius: 30px;
        padding-bottom: 55px;
        padding-top: 50px;
        margin: 0 auto;
    }

    .aboutus-title {
        color: #ffffff;
        text-align: center;
        margin-bottom: 22px;
        font-size: 22px;
        font-weight: 700;
        line-height: 29px;
    }

    .aboutus-heading {
        color: #ffffff;
        font-weight: 500;
        font-size: 22px;
        margin-bottom: 12px;
        font-family: 'Roboto';
        line-height: 29px;
    }

    .aboutus-info {
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

    img.img-fluid-about {
        object-fit: cover;
    }

    /* Mobile responsive css */
    @media (max-width: 480px) {
        .img-fluid-about {
            max-width: 100%;
            height: 225px;
            object-fit: cover;
        }

        .aboutus-container {
            max-width: 370px;
            padding-bottom: 40px !important;
            padding-top: 35px !important;
        }

        .aboutus-title {
            margin-bottom: 25px;
            font-size: 22px;
        }

        .aboutus-heading {
            margin-bottom: 12px;
            line-height: 27px;
        }

        .aboutus-info {
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
                    <img style="opacity: 0.8;width: 100%;" class="img-fluid-about"
                        src="{{ asset('frontend/assets/images/qbits_about.jpg') }}" alt="qbits-aboutus-banner">
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
        <div class="row aboutus-container">
            <div class="col-sm-12">
                <div class="pl-40 pr-40">
                    <p class="aboutus-title">About Us</p>

                    <p class="aboutus-heading">Why Qbits?</p>
                    <p class="aboutus-info">Qbits is a developing computer technology company in Bangladesh, which
                        begins its journey with an aspiration to provide you with accessibility to the best technology.
                        We keep inventing and reinventing for the changing world to ensure an improved experience. We
                        dream, we take challenges to create extraordinary tools that make life easier and better and
                        leave you with endless possibilities.</p>

                    <p class="aboutus-heading">Who We Are?</p>
                    <p class="aboutus-info">We are an innovative team influenced by an ambition to make a revolutionary
                        impact for a sustainable future. Powered by Intellect, driven by values to create powerful
                        technology - to redefine what is possible, - to drive human progress, - to move the world
                        forward. We explore challenges for the best possible solutions. Blend unique thought excellence
                        to invent technology that drives social and economic progress. We make technology work for you
                        through innovation and reinvention for changing the world. </p>

                    <p class="aboutus-heading">Our Goals </p>
                    <p class="aboutus-info">We are driven by a dream to create wonderful technologies that function as a
                        bridge between your goals and accomplishment. The universe has changed immensely. We are
                        committed to the future and always in exploration to develop a revolutionary device for the
                        changing world that delivers incredible experiences.</p>

                    <p class="aboutus-heading">Build Technologies that Transform People’s Lives</p>
                    <p class="aboutus-info">We strive to create technology that excels and drives human life. We take sustainability initiatives to engineer amazing tools that make life easier, faster, and better for every individual. Our diverse team is continuously working together to transform people's lives with technology, values, and purpose, to reinvent the future through transformative technologies. We invent devices that are increasingly faster, more portable, and higher-powered ever than before - sure to amaze, delight, and inspire.</p>

                    <p class="aboutus-heading">We Believe in Equity</p>
                    <p class="aboutus-info">We believe everybody is incredibly brilliant and has immense power. All
                        should have access to the best technology for better outcomes and socio-economic development. We
                        are committed to equal opportunities, trust, and advocacy for everyone. We built technologies
                        within an affordable price range for every brilliant young mind. We invent and reinvent tools
                        that are more equitable, inclusive, and sustainable for all. So they can explore their own
                        ingenious ideas, create, and flourish their extraordinary capabilities to make the world a
                        better place.</p>

                    <p class="aboutus-heading">Ethics. Transparency. Accountability</p>
                    <p class="aboutus-info">Qbits conducts business with ethical practices and compliances. We are committed to transparency, accountability, and corporate business principles. We firmly established the principles of fairness, honesty, and ethical values. Our business conduct and compliance reflect ideas on how we conduct business, and how we put our values into activities every day. All the business policies comply with all applicable legal requirements while maintaining the utmost transparency.</p>

                    <p class="aboutus-heading">Remote Learning Works Best on Qbits</p>
                    <p class="aboutus-info" style="margin-bottom: 0px;">Without a good laptop, you can't get through school or college nowadays. Remote learning is the beginning of a revolutionary way to educate students. When all of the machine's gears are turning smoothly and efficiently, remote learning works best. Qbits offers a laptop you can count on for your journey to excellence. We have the best laptops to use in a distance learning setting. Our laptops are designed to last a long time, making them a good choice. You can use the laptop not only at home, but also in college, graduate school, or in your future job. The ideal opportunity for learners to study, explore, and even change the world.</p>
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
