@extends('frontend.layouts.master')
@section('title','Caliph')
@section('content')
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
                            <li><a href="{{ route('tech_spec') }}">Tech Specs</a></li>
                            <li><a href="{{ route('driver') }}">Drivers</a></li>
                            <li><a href="#" class="buy-button">Buy</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div id="search-section" class="clearfix">
        <form id="searchformsection" method="get" action="searchpage.php">
            <input type="search" class="form-control" name="s" id="search" placeholder="Search here for what you need?"
                autocomplete="off">
        </form>
    </div>
</section>

<div class="sigma-mobile-middle-menu">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="sigma-menu-content">
                        <div class="sigma-logo">
                            <a href="#">Sigma</a>
                        </div>
                        <div class="sigma-menu-right">
                            <ul>
                                <li><a href="#"><i class="fas fa-angle-down"></i></a></li>
                                <li><a href="#" class="buy-button">Buy</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="sigma-middle-menu-list">
                        <ul>
                            <li><a href="#">Overview</a></li>
                            <li><a href="{{ route('tech_spec') }}">Tech Specs</a></li>
                            <li><a href="{{ route('driver') }}">Drivers</a></li>
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
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:700">Series</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300">Caliph 16</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:700">Model</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300">GLT163 </th>
                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:700">Price</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300">৳120000<br><br><span
                                            style="background-color: #1486F9;border-radius: 50px;font-size: 14px;padding: 8px 25px;color: #fff;font-weight:bold;">Buy</span><br>
                                    </th>
                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:700">CPU</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300">Intel® Core™
                                        i9-8950HK<br> Processor with 2.90 GHz to 4.80<br> GHz,<br>
                                        12 MB Intel® Smart Cache,4<br> Cores, 8 Threads<br>
                                        Processor Graphics:<br>
                                        GEFORCE GTX 1650
                                    </th>
                                </tr>
                                <tr>
                                    <td style="color:#e1e1e1;padding: 20px 0px;font-weight:700">Processor Graphics</td>
                                    <td style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6">Intel® UHD
                                        Graphics 630</td>

                                </tr>
                                <tr>
                                    <td style="color:#e1e1e1;padding: 20px 0px;font-weight:700">Memory</td>
                                    <td style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6">16GB DDR4
                                        3200 MHz RAM<br>
                                        Max Memory Size: 64GB</td>

                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:700">Storage</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6">M.2 512GB
                                        NVMe SSD</th>

                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:700">Display</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6">16.1 inches
                                        Full HD IPS Display<br>
                                        Refreshing Rate: 120hz<br>
                                        Resolution: 1920 x 1080 pixels <br>
                                        Backlight type: LED<br>
                                        Display Type: IPS display<br>
                                        Screen to Body Ratio: 95.1%<br>
                                        Contrast Ratio: 1000:1<br>
                                        sRGB: 100%<br>
                                        Viewing angle: 170 degree IPS screen<br>

                                    </th>
                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:700">Power Storage</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6">Battery
                                        Type: Li-ion Battery<br>Capacity: 4800 mAh/73.92Wh</th>

                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:700">Extended Slots<br>
                                        and Ports</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6">2 X M.2<br>
                                        2 X USB-A 2.0<br>
                                        1 X SO-DIMM<br>
                                        1 X USB-C<br>
                                        1 X USB-A 3.1<br>
                                        1 X HDMI<br>
                                        1 X rj45/Ethernet<br>
                                        1 X 3.5mm Headphone jack<br>
                                    </th>

                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:700">Key­board and <br>
                                        Touchpad</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6">RGB backlit
                                        keyboard<br>
                                        1.5mm travel distance<br>
                                        Intuitive Touchpad
                                    </th>

                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:700">Wireless</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6">WI-FI<br>
                                        Realtek 8821CE Wireless LAN 802.11ac PCI-E NIC<br>
                                        Bluetooth: 4.2 (LMP-8.34849)
                                    </th>

                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:700">Camera</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6">720p Webcam
                                    </th>

                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:700">Audio Support</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6">Realtek
                                        High Definition Audio<br>3.5mm Headphone / Mic Jack</th>

                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:700">Size and <br>
                                        Weight</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6">Height:
                                        18mm (1.8cm)<br>
                                        Width: 368mm (36.8cm) <br>
                                        Depth: 240mm (24cm)<br>
                                        Weight: 5.29lbs (2.4Kg)</th>

                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:700">Operating <br>
                                        System</th>
                                    <td style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6"><span
                                            style="font-weight:bold;">Windows 10 Pro (Trial)</span> <br>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:700">In the Box</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6">15.6 inches
                                        Qbits Sigma
                                        Charger and Adapter</th>

                                </tr>
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>

            <div class="tech-details-button">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="">Shop Now &nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                        {{-- <a href="">Compare With Other Model &nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i></a> --}}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="display-image" style="margin-bottom:160px">
                        <img src="frontend/sigma/High quality/IMG_9971.png" class="img-fluid" alt="">
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
