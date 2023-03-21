@extends('frontend.layouts.master')
@section('title','Sigma')
@section('content')
<style>
    .img-responsive-1 {
        width: 100%;
    }

    .tech_specs_nav {
        font-size: 14px;
        color: #a1a1a1 !important;
    }

    .ssd-image {
        width: 100%;
    }

    a.down-arrow {
        color: #c6c6c6 !important;
        font-size: 16px !important;
        padding-left: 2px;
    }

    .classy-area .classy-menu-sigma {
        overflow: hidden;
        width: 100%;
        margin: 0 auto;
    }

    .classy-area .classy-menu-sigma ul {
        display: grid;
        padding: 97px 139px;
        margin: 0px -38px !important;
        grid-template-columns: repeat(7, 1fr);
        align-items: center;
        justify-content: start;
        justify-items: stretch;
    }

    .classy-area .classy-menu-sigma ul li {
        list-style: none;
        padding: 0px;
        margin: 0px;
        place-self: center;
    }

    .number {
        display: flex;
        flex-wrap: nowrap;
        padding-left: 86px !important;
    }

    .number ul>li {
        padding-left: 20px !important;
    }

    .row-ssd-difference {
        position: relative;
    }

    .mobile-ssd-speed-list {
        width: 100%;
        position: relative;
        top: 1px;
    }

    .line {
        position: absolute;
        top: 0px;
        padding-left: 90px;
    }

    img.sigma-table {
        width: 100%;
    }

    img.sigma-table-tab {
        width: 100%;
    }

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

    .sigma-middle-menu-list {
        display: none;
    }

    .intro {
        display: none;
    }

    /* Loading Spinner Css Start */
    .spinner-container {
        min-width: 225px;
        position: absolute;
        top: 50%;
        left: 50%;
        text-align: center;
        transform: translate(-50%, -50%);
        /* display: none; */
    }
    /* Loading Spinner Css End*/

    @media (max-width: 821px) {
        .display-area .display-image {
            display: none;
        }

        .display-area .display-details {
            padding-bottom: 34px;
        }
    }

    @media (max-width: 480px) {
        .classy-area .classy-menu-sigma ul {
            display: grid;
            padding: 42px 45px;
            grid-template-columns: repeat(3, 0.2fr);
            column-gap: 22px;
            row-gap: 43px;
        }

        body .qbits-mobile-menu {
            background-color: #000 !important;
            width: 100%;
            height: 68px;
            position: -webkit-sticky;
            position: unset;
            z-index: 1;
            top: 0;
            display: block;
            padding: 4px 4px 0px;
        }

        .sigma-middle-menu-list {
            display: none;
        }

        .display-image {
            display: none;
        }

        .display-area .display-details {
            padding-bottom: 36px !important;
        }
    }

    @media (min-width: 481px) and (max-width: 820px) {
        .classy-area .classy-menu-sigma ul {
            display: grid;
            padding: 42px 42px;
            grid-template-columns: repeat(4, 0.2fr);
            column-gap: 107px;
            row-gap: 43px;
        }

        body .qbits-mobile-menu {
            width: 100%;
            height: 68px;
            position: unset;
            padding: 4px 4px 0px;

        }

        .sigma-middle-menu-list {
            display: none;
        }
    }

</style>
<section class="sigma-middle-menu">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg">
                <div class="col-sm-2">
                    <div class="sigma-logo">
                        <a href="#">Sigma 15</a>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="sigma-menu-right d-flex justify-content-end">
                        <ul>
                            <li><a style="color: #F5F5F7;" href="{{ route('sigma')}}">Overview</a></li>
                            <li><a href="{{ route('tech_spec') }}">Tech Specs</a></li>
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
@include('frontend.discount')
<div class="sigma-mobile-middle-menu">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="sigma-menu-content">
                        <div class="sigma-logo">
                            <a href="#">Sigma</a>
                            <a href="#" class="down-arrow"><i class="fa-solid fa-angle-down"></i></a>
                        </div>
                        <div class="sigma-menu-right">
                            <ul>
                                <!-- <li><a href="#"><i class="fas fa-angle-down"></i></a></li> -->

                                <li><a href="{{ route('tech_spec') }}" class="tech_specs_nav">Tech Specs</a></li>
                                <li><a href="{{ route('buy') }}" class="buy-button">Buy</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="sigma-middle-menu-list">
                        <ul>
                            <li><a href="{{ route('sigma')}}">Overview</a></li>
                            <li><a href="{{ route('tech_spec') }}">Tech Specs</a></li>
                            <li><a href="{{ route('driver') }}">Drivers</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="spacer s0" id="trigger"></div> -->
<section class="scrolling-slider-area">
    <div class="intro" id="intro">
        <img id="image" src="/frontend/sigma/83/0001.webp" alt="">
    </div>
    <div class="loading-spinner" id="loading-spinner">
        <div class="spinner-container"><img src="{{asset('loading-gif.gif')}}" style="width: 80px;" alt="Loading..."></div>
    </div>
</section>


<section class="sigma-mobile-slider-area">
    <div class="sigma-intro">
        <img id="image" src="/frontend/assets/images/mobile/sigma-mobile.png" class="img-responsive" alt="">
    </div>
</section>

<section class="innovation-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="innovation">
                    <h1>Built for Creation and Excelled Innovation</h1>
                    <p>Qbits brand has built Sigma 15 with powerful tools to boost up your workstation. Crafted with
                        superfast boosting processors of intel, high quality graphics and massive storage for providing
                        you with the most demanding working experience. An immersive Full HD IPS display, Qbits enhanced
                        keyboard, touchpad, and advanced audio and video capabilities, make it a perfect workspace for
                        the creation and excelled innovation.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="processor-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="processor">
                    <div class="processor-heading">
                        <img src="/frontend/sigma/chip.png" class="img-responsive" alt="Sigma Laptop">
                        <h1>10th Generation Intel® Core™ Processor</h1>
                    </div>
                    <p>Experience superfast speed and exceptional performance with 10th generation Intel® Core™
                        processor, 1.20 GHz to 3.90 GHz, 8MB intel® smart cache.</p>
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
                        <img src="/frontend/sigma/Ram1.png" alt="Sigma Laptop" class="mobile-ram-image img-responsive">
                        <h1>Dual Channel DDR4 3200MHz RAM </h1>
                        <img src="/frontend/sigma/Ram1.png" alt="Sigma Laptop" class="desktop-ram-image">
                    </div>

                    <p style="text-align: right;">3200MHz DDR4 RAM for optimized performance, can be expanded up to
                        64GB, improved data integrity, faster start-up times and lower power consumption.</p>
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
                        <h1>NVMe SSD for Fastest Speed</h1>
                        <p>M.2 NVMe SSD can be expanded up to 2TB, to give a boost to your Qbits workstation. Delivers
                            enhanced and efficient performance for optimized read/write, 5x faster speed than
                            traditional SATA SSDs. Unleash your potential when creativity inspires. Qbits Sigma 15 has been
                            designed to keep you seamless throughout the day.</p>
                    </div>

                    <div class="ssd-difference">

                        <h3>Speed Difference: Hard Disk vs SSD vs M.2 NGFF vs M.2 NVMe</h3>
                        <img src="{{asset('frontend/web.png')}}" alt="" class="ssd-image">
                        <!-- <div class="row">
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
                        </div> -->
                    </div>



                    <div class="tab-ssd-difference">
                        <h3>Speed Difference: Hard Disk vs SSD vs M.2 NGFF vs M.2 NVMe</h3>

                        <img src="{{asset('frontend/Tab.png')}}" class="sigma-table-tab" alt="">

                        <!-- <div class="row-ssd-difference">
                            <div class="">
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
                            <div class="line">
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
                        <div class="">
                            <div class="">
                            </div>
                            <div class="">
                                <div class="mobile-progres-value">
                                    <span>0</span>
                                    <span>900</span>
                                    <span>1800</span>
                                    <span>2700</span>
                                    <span>3600</span>
                                     <ul class="number">
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
                        </div> -->
                    </div>
                    <div class="mobile-ssd-difference">
                        <h3>Speed Difference: Hard Disk vs SSD vs M.2 NGFF vs M.2 NVMe</h3>


                        <img src="{{asset('frontend/mobile.png')}}" class="sigma-table" alt="">
                        <!-- <div class="row-ssd-difference">
                            <div class="">
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
                            <div class="line">
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
                        <div class="">
                            <div class="">
                            </div>
                            <div class="">
                                <div class="mobile-progres-value">
                                    <span>0</span>
                                    <span>900</span>
                                    <span>1800</span>
                                    <span>2700</span>
                                    <span>3600</span>
                                     <ul class="number">
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
                        </div> -->
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
                    <h1>Immersive Slim Edge IPS Display</h1>
                    <p>Immerse yourself and enjoy crisp and vibrant colors on a slim edge Full HD IPS display. Qbits
                        Sigma 15 offers an exceptional viewing experience with a nearly bezel-free display, making it ideal
                        for big-screen fans. Experience the best views around and see your screen clearly in any
                        setting. Images take on new levels of detail and realism in this gorgeous display.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="display-mobile-image">
                    <img src="frontend/sigma/High quality/desdis.png" class="img-responsive" alt="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="display-menu">
                    <ul>
                        <li>
                            <span class="desplay-list-heading">6.5mm</span><br>
                            <span class="desplay-list-info">6.5mm slim<br> Edge Bezel</span>
                        </li>

                        <li>
                            <span class="desplay-list-heading">96%</span><br>
                            <span class="desplay-list-info">Screen to<br> Body Ratio</span>
                        </li>

                        <li>
                            <span class="desplay-list-heading">15.6"</span><br>
                            <span class="desplay-list-info">FHD IPS<br> Display</span>
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
                    <img src="frontend/sigma/High quality/desdis.png" class="img-responsive" alt="">
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
                    <h1>Classy, Slim, and Ultraportable</h1>
                    <p>Qbits Sigma 15 is more portable than ever. It is sleek, classy, and lightweight yet incredibly
                        compact. A perfect laptop for individuals who are on the go. So create, learn, work and stream
                        from anywhere at any time. This ultra-portable and slim laptop will enable you to explore more,
                        no matter where you go, the Qbits sigma 15 keeps you connected.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="col-sm-12">
                    <div class="classy-menu-sigma">
                        <ul>
                            <li>
                                <img src="/frontend/sigma/icons/1.png" class="img-responsive" alt=""><br>
                            </li>

                            <li>
                                <img src="/frontend/sigma/icons/2.png" class="img-responsive" alt=""><br>
                            </li>

                            <li>
                                <img src="/frontend/sigma/icons/3.png" class="img-responsive" alt=""><br>
                            </li>

                            <li>
                                <img src="/frontend/sigma/icons/4.png" class="img-responsive" alt=""><br>
                            </li>

                            <li>
                                <img src="/frontend/sigma/icons/5.png" class="img-responsive" alt=""><br>
                            </li>

                            <li>
                                <img src="/frontend/sigma/icons/6.png" class="img-responsive" alt=""><br>
                            </li>

                            <li>
                                <img src="/frontend/sigma/icons/7.png" class="img-responsive" alt=""><br>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="row">
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
        </div> -->

        <!-- <div class="row">
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
        </div> -->
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="classy-image">
                    <img src="/frontend/sigma/new/classy.png" class="img-responsive" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid px-0">
        <div class="row no-gutters">
            <div class="mobile-classy-image">
                <!-- <img src="frontend/sigma/new/classy.png" class="img-responsive" alt=""> -->
                <img src="{{asset('sigma-port-mobile.png')}}" class="sigma-table" alt="">
            </div>
            <div class="tab-classy-image">
                <!-- <img src="frontend/sigma/new/classy.png" class="img-responsive" alt=""> -->
                <img src="{{asset('sigma-port-tab.png')}}" class="sigma-table" alt="">
            </div>
        </div>
    </div>

</section>

<section class="architecture-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="architecture-content">
                    <h1>Advanced Thermal Architecture</h1>
                    <p>The thermal architecture of Sigma 15 has been designed to keep the laptop temperature always in
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

<section class="performace-section">
    <div class="container">
        <div class="row">
            <div class="performance">
                <div class="col-sm-12">
                    <div class="performace-details">
                        <h1>Blazing Fast Speed and Power</h1>
                        <div class="col-sm-6">
                            <p>Qbits Sigma 15 has been built for blazing fast speed that sets it apart from rivals. At
                                the core, it features the latest Intel® Core™ i3, i5, and i7 processor with Intel® Iris®
                                Plus/Intel® UHD Graphics, DDR RAM 3200 MHz, and supports up to 64GB. <br> <br>What’s
                                more, It
                                also has 512GB of NVMe SSD storage for high read-write and prompt boot time with low
                                latency. Provide the performance you need for your daily computing tasks. From big
                                project work to high-quality photo or video editing and usual gaming, all will be done
                                with the power of breeze.</p>
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
                    <h1>Unrelenting Productivity</h1>
                    <p>Qbits Sigma 15 is equipped with a full-fledged backlit keyboard and a strong single piece design
                        that provides excellent performance. The extended layout with comfortable keys provides a smooth
                        operation. The ergonomically built-in keyboard offers the optimum typing experience. It's even
                        better with the backlight on! The precision touchpad has been intelligently built for optimal
                        comfort and accuracy, ensuring speedier navigation in any situation.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 ml-0">
                <div class="mobile-productivity-image">
                    <img src="frontend/sigma/new/tbrender_007.png" class="img-responsive" alt="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="productivity-menu">
                    <ul>
                        <li>
                            <img src="frontend/sigma/icons/8.png" class="img-responsive-1" alt=""><br>
                        </li>

                        <li style="padding-top: 10px;">
                            <img src="frontend/sigma/icons/9.png" class="img-responsive-1" alt=""><br>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 ml-0">
                <div class="productivity-image">
                    <img src="frontend/sigma/new/tbrender_007.png" class="img-responsive" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="single-touch-section">
    <div class="container">
        <div class="row">
            <div class="single-touch">
                <div class="col-sm-12">
                    <div class="touch-details">
                        <div class="col-sm-5">
                        </div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-5">
                            <div class="finger-touch">
                                <h1>Access in a Single Touch</h1>
                                <p>Qbits create versatile features for improved user experience. No need to remember a
                                    password every time you log in. The built-in fingerprint sensor in the touchpad
                                    makes it easier and more secure to access. </p>
                                <img src="frontend/sigma/Fingerprint.png" class="img-responsive" alt=""><br><br>
                                <span class="finger-sensor img-responsive">Fingerprint Sensor</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-sm-12">
                
            </div>
        </div> -->
    </div>
    <div class="container-fluid">
        <div class="mobile-finger-touch">
            <img src="frontend/assets/images/mobile/mobile-touch.png" class="img-responsive" alt="">
            <p class="finger-sensor">Fingerprint Sensor</p>
        </div>

    </div>
    <img class="hand" src="frontend/sigma/hand.png" alt="">
</section>


<script>
    $(document).ready(function () {

        var element = document.getElementById('intro');
        var count = element.childElementCount;
        if(count >= 83) {
            document.getElementById("loading-spinner").style.display = "none";
            element.style.display = "block";
        }
        

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

    // $(document).ready(function () {
    //     $(".fa-angle-down").click(function () {
    //         $(".sigma-middle-menu-list").toggle();
    //     });
    // });
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

<!-- footer section -->
@include('frontend.partials.home')

@endsection
