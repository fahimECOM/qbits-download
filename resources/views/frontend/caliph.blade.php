@extends('frontend.layouts.master')
@section('title','Caliph')
@section('content')
<style>
    .qbits-top-menu {
        color: #fff;
        background-color: #000;
        font-family: "Roboto", sans-serif;
        width: 100%;
        position: -webkit-sticky;
        position: relative;
        display: flex;
        z-index: 1;
        top: 0;
        height: 80px;
        align-items: center;
    }

</style>
<section class="sigma-middle-menu">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg">
                <div class="col-sm-2">
                    <div class="sigma-logo">
                        <a href="#">Caliph</a>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="sigma-menu-right d-flex justify-content-end">
                        <ul>
                            <li><a style="color: #CCCCCC;" href="#">Overview</a></li>
                            <li><a href="{{ route('caliph_tech_specs') }}">Tech Specs</a></li>
                            <li><a href="{{ route('driver') }}">Drivers</a></li>
                            <li><a href="{{ route('buy') }}" class="buy-button">Buy</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div id="search-section" class="clearfix">
        <form id="searchformsection" action="{{ route('search')}}" method="get">
            @csrf
            <input type="search" class="form-control" name="search" id="search"
                placeholder="Search here for what you need?" autocomplete="off">
        </form>
    </div>
</section>
<!-- <div class="qbits-menu-bottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="text-center">We will offer 10% off. <a href="">*Click for code</a></p>
            </div>
        </div>
    </div>
</div> -->

<div class="qbits-slider">
    <div class="container">
        <div class="text-center">
            <img class="img-fluid" src="{{ asset('frontend/assets/images/caliph-banner.png') }}"
                alt="qbits-banner ">
        </div>
    </div>
</div>

<section class="immense-area" style="margin-top: 0px !important;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="immense">
                    <h1>Built for Powerful and Versatile Gaming</h1>
                    <p>Built to unleash breakthrough power and performance. It enables you to do what you need to do.
                        From professional-grade photo/video editing to powerful and versatile gaming, Qbits Caliph lets
                        you do it all. Powered by Intel i9-8950 HK with integrated Intel® UHD Graphics 360 and Nvidia
                        Geforce GTX1650 graphics for improved productivity and smooth gameplay. FHD IPS display for
                        lifelike images of your game like never before, large battery storage and dual fan advanced
                        thermal architecture for optimized airflow, all combine to elevate gaming experiences.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <div class="qbits-slider-section">
    <div class="container">
        <div class="slider-text">
            <p class="slider-heading">Immense Power Yet Incredibly Simple</p>
            <p class="slider-details">Qbits introduces premium quality laptops with top level performance at affordable prices. Built to power your computing challenges for years to come.</p>
        </div>
    </div>
</div> --}}

{{-- <div class="mobile-slider-details">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="mobile-slider-text">
                   <p class="mobile-slider-heading">Immense Power Yet Incredibly Simple</p>
                   <p class="mobile-slider-details">Qbits introduces premium quality laptops with top level performance at affordable prices. Built to power your computing challenges for years to come.</p>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<section class="processor-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="processor">
                    <div class="processor-heading">
                        <img src="frontend/sigma/chip.png" class="img-responsive" alt="Sigma Laptop">
                        <h1>Intel Coffee Lake-H45W i9-8950 HK</h1>
                    </div>
                    <p>Designed with Intel i9-8950 HK. With the 2.90ghz to 4.80ghz speed and core 6 with 12 threads, it
                        will take your workflow to the next level.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ram-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="ram">
                    <div class="ram-heading justify-content-end">
                        <img src="frontend/sigma/Ram1.png" alt="Sigma Laptop" class="mobile-ram-image img-responsive">
                        <h1>16GB DDR4 for Dynamic Performance </h1>
                        <img src="frontend/sigma/Ram1.png" alt="Sigma Laptop" class="desktop-ram-image">
                    </div>

                    <p style="text-align: right;">16GB DDR4 RAM with 2666 MHz to boost your Qbits workstation. It will
                        let
                        your system run faster and smoother while you are escaping into an epic battle.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="display-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="display-details">
                    <h1>Gaming Supercharger GTX 1650</h1>
                    <p>This slim and portable laptop packs the GeForce® GTX 1650 for high-quality content creation,
                        faster and quieter gaming. Uses adaptive shading technology delivering 1.4X power efficiency
                        over the previous generations for faster and smoother gameplay. Up to 2X the GeForce GTX 950 and
                        up to 70% faster than the GTX 1050 on the latest games.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="display-image" style="margin-top: 100px !important;">
                    <img src="{{ asset('frontend/assets/images/GeForce_cards.png') }}" class="img-responsive" alt=""
                        style="margin-bottom: 100px !important;display:block !important;width:80% !important;">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- nvm Part --}}


<section class="ssd-area-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="ssd-area">
                    <div class="ssd-speed">
                        <h1>Accelerates Gaming and Multi-task</h1>
                        <p>Superfast 512GB M.2 NVMe SSD accelerates load times in gameplay, heavy multi-task, and
                            productivity. Blazing fast load times make gaming and multitasking speedier than ever. Lets
                            you load massive files instantly at lighting speed and enter games with zero wait time. </p>
                    </div>

                    <div class="ssd-difference">
                        <h3>Speed Difference: Hard Disk vs SSD vs M.2 NGFF vs M.2 NVMe</h3>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="ssd-speed-list">
                                    <ul>
                                        <li>
                                            <a href="#" style="color: #1486F9 !important;">M.2 NVMe</a>
                                        </li>
                                        <li>
                                            <a href="#" style="color: #999999 !important;">M.2 NGFF</a>
                                        </li>
                                        <li>
                                            <a href="#" style="color: #777777 !important;">SSD</a>
                                        </li>
                                        <li>
                                            <a href="#" style="color: #5C5C5C !important;">HDD</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <div class="progress-graph">
                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                            <tr class="">
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                            </div>
                            <div class="col-sm-10">
                                <div class="progres-value">
                                    <ul>
                                        <li>0</li>
                                        <li>400</li>
                                        <li>800</li>
                                        <li>1200</li>
                                        <li>1600</li>
                                        <li>2000</li>
                                        <li>2400</li>
                                        <li>2800</li>
                                        <li>3200</li>
                                        <li>3600</li>
                                    </ul>
                                </div>
                                <p style="color:#A1A1A6; font-size: 16px; text-align:center; margin-top: 20px;">Speed (
                                    in MBPS)</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="progress-area">
                                    <ul>
                                        <li>
                                            <div class="progress" style="width: 100%;">
                                                <div class="progress-bar bg-progress-color-1" role="progressbar"
                                                    style="width: 100%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="progress" style="width: 20%;">
                                                <div class="progress-bar bg-progress-color-2" role="progressbar"
                                                    style="width: 100%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="progress" style="width: 15%;">
                                                <div class="progress-bar bg-progress-color-3" role="progressbar"
                                                    style="width: 100%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="progress" style="width: 5%;">
                                                <div class="progress-bar bg-progress-color-4" role="progressbar"
                                                    style="width: 100%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-ssd-difference">
                        <h3>Speed Difference: Hard Disk vs SSD vs M.2 NGFF vs M.2 NVMe</h3>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="mobile-ssd-speed-list">
                                    <ul>
                                        <li>
                                            <a href="#" style="color: #1486F9 !important;">M.2 NVMe</a>
                                        </li>
                                        <li>
                                            <a href="#" style="color: #999999 !important;">M.2 NGFF</a>
                                        </li>
                                        <li>
                                            <a href="#" style="color: #777777 !important;">SSD</a>
                                        </li>
                                        <li>
                                            <a href="#" style="color: #5C5C5C !important;">HDD</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <div class="mobile-progress-graph">
                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                            <tr class="">
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                            </div>
                            <div class="col-sm-10">
                                <div class="mobile-progres-value">
                                    <ul>
                                        <li>0</li>
                                        <li>900</li>
                                        <li>1800</li>
                                        <li>2700</li>
                                        <li>3600</li>
                                    </ul>
                                </div>
                                <p style="color:#A1A1A6; font-size: 16px; text-align:center; margin-top: 20px;">Speed (
                                    in MBPS)</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mobile-progress-area">
                                    <ul>
                                        <li>
                                            <div class="progress">
                                                <div class="progress-bar bg-progress-color-1" role="progressbar"
                                                    style="width: 100%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="progress" style="width: 45%;">
                                                <div class="progress-bar bg-progress-color-2" role="progressbar"
                                                    style="width: 100%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="progress" style="width: 35%;">
                                                <div class="progress-bar bg-progress-color-3" role="progressbar"
                                                    style="width: 100%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="progress" style="width: 15%;">
                                                <div class="progress-bar bg-progress-color-4" role="progressbar"
                                                    style="width: 100%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="display-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="display-details">
                    <h1>Immersive Gameplay and Visuals</h1>
                    <p>Play games at superb speed on the fast 16.1 inches 120hz FHD display. With an anti-glare feature
                        and 100% sRGB Qbits Caliph 16 produces outstanding color accuracy. A nearly bezel-free - 4.9mm -
                        display with its naturally wide color gamut and a 90% screen-to-body ratio immerses you with
                        exceptional visuals for ultra-smooth and immersive gameplay.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="display-mobile-image">
                    <img src="{{ asset('frontend/assets/images/Group-913.png') }}" class="img-responsive" alt="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="display-menu">
                    <ul>
                        <li>
                            <span class="desplay-list-heading">21mm</span><br>
                            <span class="desplay-list-info">21mm slim<br> Edge Bezel</span>
                        </li>

                        <li>
                            <span class="desplay-list-heading">95.1%</span><br>
                            <span class="desplay-list-info">Screen to<br> Body Ratio</span>
                        </li>

                        <li>
                            <span class="desplay-list-heading">16.1"</span><br>
                            <span class="desplay-list-info">UHD IPS<br> Display</span>
                        </li>

                        <li>
                            <span class="desplay-list-heading">1000:1</span><br>
                            <span class="desplay-list-info">Contrast</span>
                        </li>

                        <li style="margin-right: 3px !important;">
                            <span class="desplay-list-heading">170&#xb0;</span><br>
                            <span class="desplay-list-info">Wide Angle</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="display-image">
                    <img src="{{ asset('frontend/assets/images/Group-913.png') }}" class="img-responsive" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="classy-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="classy-content">
                    <h1>Seamless Connectivity to Multitask</h1>
                    <p>Your thin and slim Qbits laptop packs every port you need allowing you to connect versatile
                        devices. Two USB-A 2.0 and a USB-A 3.1 for comprehensive connectivity. The HDMI and DisplayPort
                        altogether with Type-C can drive dual external displays and execute multitasking faster than
                        ever.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="container">
                <div class="col-sm-12">
                    <div class="classy-menu">
                        <ul>
                            <li>
                                <img src="frontend/sigma/icons/1.png" class="img-responsive" alt=""><br>
                            </li>

                            <li>
                                <img src="frontend/sigma/icons/2.png" class="img-responsive" alt=""><br>
                            </li>

                            <li>
                                <img src="frontend/sigma/icons/3.png" class="img-responsive" alt=""><br>
                            </li>

                            <li>
                                <img src="frontend/sigma/icons/4.png" class="img-responsive" alt=""><br>
                            </li>

                            <li>
                                <img src="frontend/sigma/icons/5.png" class="img-responsive" alt=""><br>
                            </li>

                            <li>
                                <img src="frontend/sigma/icons/6.png" class="img-responsive" alt=""><br>
                            </li>

                            <li>
                                <img src="frontend/sigma/icons/7.png" class="img-responsive" alt=""><br>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="container">
                <div class="col-sm-12">
                    <div class="mobile-classy-menu">
                        <ul>
                            <li>
                                <img src="frontend/sigma/icons/sound.png" class="img-responsive" alt=""><br>
                                <p>SOUND</p>
                            </li>

                            <li>
                                <img src="frontend/sigma/icons/lan.png" class="img-responsive" alt=""><br>
                                <p>LAN</p>
                            </li>

                            <li>
                                <img src="frontend/sigma/icons/hdmi.png" class="img-responsive" alt=""><br>
                                <p>HDMI</p>
                            </li>

                            <li>
                                <img src="frontend/sigma/icons/usb2.png" class="img-responsive" alt=""><br>
                                <p>USB 2.0</p>
                            </li>

                            <li>
                                <img src="frontend/sigma/icons/usbc3.png" class="img-responsive" alt=""><br>
                                <p>USB-C 3.0</p>
                            </li>

                            <li>
                                <img src="frontend/sigma/icons/usb3.png" class="img-responsive" alt=""><br>
                                <p>USB 3.0</p>
                            </li>

                            <li>
                                <img src="frontend/sigma/icons/charging.png" class="img-responsive" alt=""><br>
                                <p>CHARGING</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="classy-image">
                    <img src="{{ asset('frontend/assets/images/Group-846.png') }}" class="img-responsive" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid px-0">
        <div class="row no-gutters">
            <div class="mobile-classy-image">
                <img src="{{ asset('frontend/assets/images/Group-846.png') }}" class="img-responsive" alt="">
            </div>
        </div>
    </div>

</section>

<section class="architecture-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="architecture-content">
                    <h1>Comprehensive Cooling System</h1>
                    <p>The thermal architecture of Sigma has been designed to keep the laptop temperature always in
                        between the safe range even if it's running at max load with a large heatsink for optimal
                        airflow and more heat dispersion. The resulting gain in cooling capacity ensures a premium
                        experience with long-lasting performance in the years to come.</p>

                    <div class="image-section">
                        <img src="frontend/sigma/new/Spin-3se.gif" class="img-responsive" alt="">
                        <img src="frontend/sigma/new/Spin-3sec1.png" class="img-responsive bottom-image" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="performance-caliph-section">
    <div class="container">
        <div class="row">
            <div class="performance-caliph">
                <div class="col-sm-12">
                    <div class="performace-details">
                        <h1>Power Through Gaming</h1>
                        <div class="col-sm-6">
                            <p>Play hard, take full advantage of the Qbits Caliph's power. Geared with Intel® Core™
                                i9-8950HK Processor to power through gaming, delivers big thrust for enthusiast-level
                                gameplay. 16GB of DDR4-3200 RAM keeps you seamless when you switch gears between tasks
                                and let you run heavy games smoothly. Built to create victory, a laptop for gamers and
                                creators who defy the limits. Do what you need to do. Play games at blazing speeds - it
                                keeps you one step ahead of the enemy.</p>
                        </div>
                        <div class="col-sm-6">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="productivity-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="productivity-details">
                    <h1>Effortless Keystrokes & RGB Backlit</h1>
                    <p>The fully optimized keyboard with comfortable mechanical keys delivers smooth gameplay and a
                        premium user experience. The translucent accent behind the RGB backlit keyboard gives a glimpse
                        that reflects the spirits of gamers. A truly awesome keyboard with a travel distance of 1.5mm
                        for effortless keystrokes. The spaces between function keys ensure precision key command to
                        accelerate your input speed while playing your favorite game.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 ml-0">
                <div class="mobile-productivity-image">
                    <img src="frontend/sigma/new/IMG_00070.png" class="img-responsive" alt="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="productivity-menu">
                    <ul>
                        <li>
                            <img src="frontend/sigma/icons/8.png" class="img-responsive" alt=""><br>
                        </li>

                        <li style="padding-top: 10px;">
                            <img src="frontend/sigma/icons/9.png" class="img-responsive" alt=""><br>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 ml-0">
                <div class="productivity-image" style="margin-bottom: 160px;">
                    <img src="frontend/sigma/new/IMG_00070.png" class="img-responsive" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="display-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="display-details" style="margin-bottom: 100px;">
                    <h1>Dynamic & Crystal Clear Sound </h1>
                    <p>Two speakers with bottom-firing double cut-outs will ensure that your media consumption and
                        gaming experience is fully immersive. Tight bass speakers deliver a wider dynamic range and
                        fuller sounding audio - completely immerse you in the games with more crystal clear sound output
                        than you would expect. Even in the high volume, it gets no distortion, letting you enjoy the
                        rich sound with exceptional clarity.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="display-image" style="margin-bottom: 100px;">
                    <img src="{{ asset('frontend/sigma/new/Background.png') }}" class="img-responsive" alt="">
                </div>
            </div>
        </div>
    </div>
</section>



<!-- footer section -->
@include('frontend.partials.home')

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
<script>
    $(document).ready(function () {
        $(".search-btn").hover(function (e) {
            $("#search-section").fadeIn("active");
            $(":input[name=search]").focus();
        });

        $(".shopping-cart-icon").hover(function (e) {
            $("#search-section").fadeOut("active");
        });

        $(".fa-user").hover(function (e) {
            $("#search-section").fadeOut("active");
        });
    });
    $("#search-section").on("mouseleave", function () {
        $(this).fadeToggle(400);
    });

    $(document).ready(function () {
        $(".fa-angle-down").click(function () {
            $(".sigma-middle-menu-list").toggle();
        });
    });

    $(document).ready(function () {
        //     $("#refresh-btn").click(function () {
        //         $("#refresh").load("sigma.php #refresh");
        // });

        $("#refresh-btn").click(function () {
            location.reload("#refresh");
        });

        $(".refresh-icon").click(function () {
            location.reload("#refresh");
        });
    });

    // $('#refresh-btn').on('click', function(event) {
    //     event.preventDefault();
    // });

    //         $(".refresh-icon").click(function () {
    //             $('#refresh').load(location.href + "refresh");
    //         });
    //    }); 

    //    function refreshDiv(){
    //        $('#refresh').load(location.href + "#refresh");
    //    }

    //   function refreshDiv(){
    //   window.location.reload();
    // } 

    function removePadding() {
        document.querySelector(".scrollmagic-pin-spacer").style.paddingBottom = null;
    }

</script>
@endsection
