@extends('frontend.layouts.master')
@section('title','Lania')
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

    .img-fluid-minipc {
        height: auto;
        object-fit: cover;
        width: auto;
    }

    .display-image-minipc {
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

        .display-image-minipc {
            margin-top: 36px;
            margin-bottom: 36px;
        }

        .tech-spece-area .tech-details .table-responsive {
            width: 100% !important;
            margin: 0 auto;
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

        .img-fluid-minipc {
            height: auto;
            object-fit: cover;
            max-width: 242px;
            padding: 0px 20px;
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

        .display-image-minipc {
            margin-top: 60px;
            margin-bottom: 60px;
        }

    }

</style>
@php
$products = App\Models\Product::where('sub_category','Lania')->where('status','1')->get('slug');

@endphp
<section class="sigma-middle-menu">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg">
                <div class="col-sm-2">
                    <div class="sigma-logo">
                        <a href="#">Lania</a>

                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="sigma-menu-right d-flex justify-content-end">
                        <ul>
                            <li><a class="{{($route=='minipc')? 'active-nav': '' }}"
                                    href="{{ route('minipc') }}">Overview</a></li>
                            <li><a class="{{($route=='minipc_tech_spec')? 'active-nav': '' }}"
                                    href="{{ route('minipc_tech_spec') }}">Tech Specs</a></li>
                            <li><a class="{{($route=='driver')? 'active-nav': '' }}"
                                    href="{{ route('driver') }}">Drivers</a></li>
                            <li><a href="{{ route('product_details_minipc',$products[0]->slug)}}"
                                    class="buy-button">Buy</a>
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
@include('frontend.discount')
<div class="sigma-mobile-middle-menu">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="sigma-menu-content">
                        <div class="sigma-logo">
                            <a href="#">Lania</a>
                            <a href="#" class="down-arrow"><i class="fa-solid fa-angle-down"></i></a>
                        </div>
                        <div class="sigma-menu-right">
                            <ul>
                                <li><a class="{{($route=='minipc_tech_spec')? 'active-nav': '' }} tech_specs_nav"
                                        href="{{ route('minipc_tech_spec') }}">Tech Specs</a></li>
                                <!-- <li><a href="#"><i class="fas fa-angle-down"></i></a></li> -->
                                <li><a href="{{ route('product_details_minipc',$products[0]->slug)}}"
                                        class="buy-button">Buy</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="sigma-middle-menu-list">
                        <ul>
                            <li><a class="{{($route=='minipc')? 'active-nav': '' }}"
                                    href="{{ route('minipc')}}">Overview</a>
                            </li>
                            <li><a class="{{($route=='minipc_tech_spec')? 'active-nav': '' }}"
                                    href="{{ route('minipc_tech_spec') }}">Tech Specs</a></li>
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
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300">Lania</th>
                                </tr>
                                <!-- <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:500">Brand</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300">Qbits</th>
                                </tr> -->
                            </thead>
                            <tbody>


                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:500">Model</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight: 300">L-48DG</th>
                                    <!-- <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300;width:31%;">S15-613G
                                    </th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300;width:24%;">S15-5F5G
                                    </th> -->
                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:500">Price</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300">৳52,000
                                        <br><br><span style=""><a
                                                href="{{ route('product_details_minipc',$products[0]->slug)}}"
                                                class="buy-button-tech">Buy</a></span><br>
                                    </th>
                                    <!-- <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300">৳90,000<br><br><span
                                            style=""><a href="{{ route('buy') }}"
                                                class="buy-button-tech">Buy</a></span><br>
                                    </th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300">৳72,000<br><br><span
                                            style=""><a href="{{ route('buy') }}"
                                                class="buy-button-tech">Buy</a></span><br>
                                    </th> -->
                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:500">CPU</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300">Intel® Core™ i7-1165G7
                                        2.80 GHz to 4.70 GHz, 12MB Intel® Smart Cache, 4 Cores, 8 Threads<br>
                                        {{-- 8 MB Intel® Smart Cache,4<br> Cores, 8 Threads<br>
                                        Processor Graphics:<br>
                                        Intel® Iris® Plus Graphics --}}
                                    </th>
                                    <!-- <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300">Intel® Core™
                                        i5-1035G4<br> Processor with 1.10 GHz to 3.70<br> GHz<br>
                                        6 MB Intel® Smart Cache,4<br> Cores, 8 Threads<br>
                                        Processor Graphics: <br>
                                        Intel® Iris® Plus Graphics
                                    </th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300">Intel® Core™
                                        i3-1005G1<br> Processor with 1.20 GHz to 3.40<br> GHz<br>
                                        4MB Intel® Smart Cache, 2<br> Cores, 4 Threads<br>
                                        Processor Graphics: <br>
                                        Intel® UHD Graphics</th> -->
                                </tr>
                                <tr>
                                    <td style="color:#e1e1e1;padding: 20px 0px;font-weight:500">Processor Graphics</td>
                                    <td style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6"> Intel®
                                        Iris® Xe Graphics
                                    </td>

                                </tr>
                                <tr>
                                    <td style="color:#e1e1e1;padding: 20px 0px;font-weight:500">Memory</td>
                                    <td style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6"> DDR4 3200
                                        MHz RAM</td>

                                </tr>
                                <tr>
                                    <td style="color:#e1e1e1;padding: 20px 0px;font-weight:500">Max Memory Size</td>
                                    <td style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6"> Up to 64GB
                                    </td>

                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:500">Storage</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6">M.2 NVMe
                                        SSD</th>

                                </tr>

                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:500">Extended Slots and Ports
                                    </th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6">
                                        1 X M.2<br>
                                        2 X SODIMM<br>
                                        1 X HDMI, 1 X LAN <br>
                                        1 X DisplayPort <br>
                                        4 X USB 3.0 & 2 X USB 2.0 <br>
                                        1 X Type-C Port [Thunderbolt 4.0] <br>
                                        1 X 3.5mm Headphone/Mic Jack

                                    </th>

                                </tr>

                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:500">Wireless</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6">Intel(R)
                                        Dual Band Wireless-AC 3165, Wi-Fi 5</th>

                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:500">Bluetooth</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6">Bluetooth
                                        4.2
                                    </th>

                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:500">Size and Weight</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6">
                                        Height: 1.77 Inch (4.5 cm)<br>
                                        Length: 5.04 Inch (12.8 cm)<br>
                                        Width: 4.84 Inch (12.3 cm)<br>
                                        Weight: 1.2 pounds (556 g)<br>
                                    </th>

                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:500">Operating System</th>
                                    <td style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6"><span
                                            style="font-weight:bold;">Windows 10 Pro (Trial)</span> <br>

                                        <span>Windows 10 is the most popular desktop operating system in the world.
                                            Windows 10 pro introduces powerful new features, sophisticated connectivity
                                            and privacy tools, making your workstation smarter than ever.
                                        </span> </td>

                                </tr>
                                <tr>
                                    <th style="color:#e1e1e1;padding: 20px 0px;font-weight:500">In the Box</th>
                                    <th style="color: #E1E1E1;padding: 20px 0px;font-weight:300" colspan="6">Qbits
                                        Lania, Charger, Power Adapter & Manuals</th>

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
                    <div class="display-image-minipc" style="">
                        <img src="/frontend/minipc/mini_pc_tech_speces.png" class="img-fluid-minipc" alt="">
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
