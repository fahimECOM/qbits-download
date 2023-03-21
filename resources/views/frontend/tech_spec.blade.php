@extends('frontend.layouts.master')
@section('title','Sigma')
@section('content')
@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp
<style>
    .tech_specs_nav {
        font-size: 14px;
    }

    a.down-arrow {
        color: #c6c6c6 !important;
        font-size: 16px !important;
        padding-left: 2px;
    }

    .img-fluid-sigma {
        height: auto;
        object-fit: cover;
        width: 100%;
    }

    .display-image-sigma {
        text-align-last: center;
        margin-top: 100px;
        margin-bottom: 160px;
        padding-left: 20px;
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

    th {
        min-width: 134px !important;
        padding-right: 20px !important;
    }

    @media (max-width: 480px) {
        ::-webkit-scrollbar {
            width: 0px;
        }

        .display-image-sigma {
            margin-top: 11px;
            margin-bottom: 54px;
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

        .img-fluid-sigma {
            height: auto;
            object-fit: cover;
            max-width: 330px;
            padding: 0px 0px;
        }
    }

    @media (min-width: 481px) and (max-width: 820px) {
        body .qbits-mobile-menu {
            width: 100%;
            height: 68px;
            position: unset;
            padding: 4px 4px 0px;

        }

        .sigma-middle-menu-list {
            display: none;
        }

        .display-image-sigma {
            margin-top: 60px;
            margin-bottom: 60px;
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
                            <li><a class="{{($route=='sigma')? 'active-nav': '' }}"
                                    href="{{ route('sigma') }}">Overview</a>
                            </li>
                            <li><a class="{{($route=='tech_spec')? 'active-nav': '' }}"
                                    href="{{ route('tech_spec') }}">Tech
                                    Specs</a></li>
                            <li><a class="{{($route=='driver')? 'active-nav': '' }}"
                                    href="{{ route('driver') }}">Drivers</a></li>
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
                                <li><a class="{{($route=='tech_spec')? 'active-nav': '' }} tech_specs_nav "
                                        href="{{ route('tech_spec') }}">Tech
                                        Specs</a></li>
                                <!-- <li><a href="#"><i class="fas fa-angle-down"></i></a></li> -->
                                <li><a href="{{ route('buy') }}" class="buy-button">Buy</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="sigma-middle-menu-list">
                        <ul>
                            <li><a class="{{($route=='sigma')? 'active-nav': '' }}"
                                    href="{{ route('sigma')}}">Overview</a>
                            </li>
                            <li><a class="{{($route=='tech_spec')? 'active-nav': '' }}"
                                    href="{{ route('tech_spec') }}">Tech
                                    Specs</a></li>
                            <li><a class="{{($route=='driver')? 'active-nav': '' }}"
                                    href="{{ route('driver') }}">Drivers</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="tech-spece-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="tech-details">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:500">Series</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300">Sigma</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:500">Model</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300">S15-631G</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300;width:31%;">S15-613G
                                    </th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300;width:24%;">S15-5F5G
                                    </th>
                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:500">Price</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300">৳120,000<br><br><span
                                            style=""><a href="{{ route('buy') }}"
                                                class="buy-button-tech">Buy</a></span><br>
                                    </th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300">৳90,000<br><br><span
                                            style=""><a href="{{ route('buy') }}"
                                                class="buy-button-tech">Buy</a></span><br>
                                    </th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300">৳72,000<br><br><span
                                            style=""><a href="{{ route('buy') }}"
                                                class="buy-button-tech">Buy</a></span><br>
                                    </th>
                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:500">CPU</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300">Intel® Core™ i7-1065G7
                                        <br> Processor with 1.30 GHz <br>to 3.90 GHz<br>
                                        8 MB Intel® Smart Cache, 4 Cores, 8 Threads <br>
                                        Processor Graphics:<br>
                                        Intel® Iris® Plus Graphics
                                    </th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300">Intel® Core™ i5-1035G1<br> Processor with 1.00 GHz <br> to 3.60 GHz<br>
                                        6 MB Intel® Smart Cache, 4 Cores, 8 Threads <br>
                                        Processor Graphics: <br>
                                        Intel® UHD Graphics
                                    </th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300">Intel® Core™
                                        i3-1005G1<br> Processor with 1.20 GHz <br> to 3.40 GHz<br>
                                        4MB Intel® Smart Cache, 2 Cores, 4 Threads <br>
                                        Processor Graphics: <br>
                                        Intel® UHD Graphics</th>
                                </tr>
                                <tr>
                                    <td style="color:#e1e1e1;padding: 20px 0px;font-weight:500">Memory</td>
                                    <td style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6">8GB DDR4
                                        3200 MHz Memory<br>
                                        Max Memory Size: 64GB</td>

                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:500">Storage</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6">M.2 512GB
                                        NVMe SSD</th>

                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:500">Display</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6">15.6 Inches Full HD IPS Display <br>
                                        Resolution: 1920 x 1080 pixels <br>
                                        Backlight type: LED<br>
                                        Display Type: IPS display<br>
                                        Contrast Ratio: 1000:1<br>
                                        Viewing angle: 170 degree <br>
                                        IPS screen<br>
                                    </th>
                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:500">Extended Slots<br>
                                        and Ports</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6">2 X M.2<br>
                                        2 X SODIMM<br>
                                        1 x HDMI, 1 x LAN<br>
                                        2 x USB 3.1 & 1 x USB 2.0<br>
                                        1 x Type-C Port<br>
                                        1 x 3.5mm Headphone/Mic Jack<br>
                                    </th>

                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:500">Key­board and <br>
                                        Touchpad</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6">Full-size backlit keyboard
                                        Higher travel distances feel more clicky with zero keyboard flex.
                                        <br>
                                        Easy Touch Fingerprint
                                        <br>
                                        Windows Precision Touchpad with plenty of room for seamless productivity

                                    </th>

                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:500">Wireless</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6">WI-FI<br>
                                        Realtek 8821CE Wireless LAN 802.11ac PCI-E NIC<br>
                                        Bluetooth: 5.0
                                    </th>

                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:500">Camera</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6">720p Webcam
                                    </th>

                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:500">Audio Support</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6">Realtek
                                        High Definition Audio 3.5mm Headphone / Mic Jack</th>

                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:500">Size and <br>
                                        Weight</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6">Length:
                                        13.78 inches (35 cm) <br>
                                        Width: 9.06 inches (23 cm) <br>
                                        Height: 0.75 inches (1.9 cm) <br>
                                        Weight: 4.08 pounds (1.86 kg)
                                    </th>

                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:500">Operating <br>
                                        System</th>
                                    <td style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6"><span
                                            style="font-weight:bold;">Windows 10 Pro (Trial)</span> <br>

                                        <span>10 is the most popular desktop operating system in the world. Windows 10
                                            pro<br>
                                            introduces powerful new features, sophisticated connectivity and privacy
                                            tools, making <br>
                                            your workstation smarter than ever.</span> </td>

                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:500">In the Box</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6">15.6 inches
                                        Qbits Sigma
                                        Charger and Adapter</th>

                                </tr>
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>

            <!-- <div class="tech-details-button">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="">Shop Now &nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                        {{-- <a href="">Compare With Other Model &nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i></a> --}}
                    </div>
                </div>
            </div> -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="display-image-sigma" style="">
                        <img src="/frontend/sigma/High quality/desdis.png" class="img-fluid-sigma" alt="">
                    </div>
                </div>
            </div>
        </div>
</section>

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
