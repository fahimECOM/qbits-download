@extends('frontend.layouts.master')
@section('title','Home')
@section('content')
<style>
    img.img-fluid-banner {
        object-fit: cover;
        width: 80%;
        animation: banner 2s linear forwards;
    }

    @keyframes banner {
        0% {
            opacity: 0.7;
        }

        100% {
            opacity: 1;
        }
    }

    #tabcontent2,
    #tabcontent3,
    #tabcontent4,
    #tabcontent5 {
        display: none;
    }


    .modal-dialog {
        /* max-width: 50vw; */
        max-width: 964px;
        margin: 1.75rem auto;
    }


    #tour_result_btn {
        display: none;
        background: #2699FB;
        color: #fff;
    }

    #next_btn {
        background: #2699FB;
        color: #fff;
    }

    .tour-card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #000;
        background-clip: border-box;
        /* border: 1pxsolidrgba(0, 0, 0, .125); */
        border-radius: 0.25rem;
    }

    #laptop_processor {
        display: none;
    }

    #desktop_processor {
        display: none;
    }

    #laptop_memory {
        display: none;
    }

    #desktop_memory {
        display: none;
    }

    #desktop_storage {
        display: none;
    }

    #laptop_storage {
        display: none;
    }

    .modal {
        background: #ffffff1f;
        backdrop-filter: blur(20px);
    }

    .modal-content {
        background-color: #000;
        border-radius: 1.5rem;
        /* min-height: 16.6vw !important; */
        /* max-height: 200.6vw !important; */
        height: auto;
    }

    /* .modal-content {
    min-height: 16.6vw;
    max-height: 40.6vw;
} */

    .tour-modal-title {
        margin-top: 10px;
        text-align: left;
        font-size: 16px;
    }

    .close-button {
        position: absolute;
        display: flex;
        flex-direction: row-reverse;
        margin-left: 875px;
        margin-top: -10px;
        /* background-color: gray; */
    }

    .btn-close {
        font-size: 23px;
        color: #a1a1a1;
        background-color: #584f4f00;
    }

    .btn-close:hover {
        color: #a1a1a1;
        background-color: #584f4f00;
    }

    .form-check-input[type=radio] {
        border-radius: 0;
    }

    .form-check-input:checked[type=radio] {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M6 10l3 3l6-6'/%3e%3c/svg%3e");
    }

    .btn.focus,
    .btn:focus {
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        outline: 0;
    }

    #tabcontent1,
    #tabcontent2,
    #tabcontent3,
    #tabcontent4,
    #tabcontent5 {

        padding: 45px;
    }

    .modal-title {
        text-align: left;
        padding-bottom: 20px;
    }

    .form-check {
        margin-bottom: 0.6rem;
    }

    .tablinks {
        padding-inline: 27px !important;
    }

    .modal-lg,
    .modal-xl {
        max-width: 875px;
    }

    .disable-tab-btn {
        cursor: not-allowed !important;
        background: #fff !important;
        color: #9A9A9F !important;
    }

    @media (max-width: 359px) {
        .modal-dialog {
            /* max-width: 95% !important; */
            max-width: 310px !important;
            padding: 0 5px;
        }

        .modal-body {
            padding-right: 0px !important;
            padding-left: 0px !important;
        }

        .middle-tab-area .card .tab button {
            margin: 10px 3px;

        }

        .tour-modal-title {
            margin-top: 0px;
        }

        .close-button {
            position: relative;
            margin-left: 260px !important;
            margin-top: -15px;

        }

        .btn-close {
            font-size: 26px;
        }
    }

    @media (min-width: 360px) and (max-width: 480px) {
        .modal-dialog {
            /* max-width: 95% !important; */
            max-width: 390px !important;
            padding: 0 10px;
        }

        .modal-body {
            padding-right: 0px !important;
            padding-left: 0px !important;
        }

        .middle-tab-area .card .tab button {
            margin: 10px 3px;

        }

        .tour-modal-title {
            margin-top: 0px;
        }

        .close-button {
            position: relative;
            margin-left: 300px !important;
            margin-top: -15px;

        }

    }

    @media (min-width: 481px) and (max-width: 820px) {
        .modal-dialog {
            /* max-width: 95% !important; */
            max-width: 670px !important;
            padding: 0 10px;
        }

        .close-button {
            position: absolute;
            margin-left: 550px !important;
            margin-top: -15px;

        }

        .tour-modal-title {
            margin-top: 15px;
        }

        .btn-close {
            font-size: 28px;
        }

        .middle-tab-area .card .tab button {
            margin: 10px 3px;

        }

        img.img-fluid-banner {
            object-fit: cover;
            width: 100%;
        }
    }

    @media (min-width: 822px) and (max-width: 1080px) {
        .modal-dialog {
            /* max-width: 95% !important; */
            max-width: 770px !important;
            padding: 0 10px;
        }

        .close-button {
            position: absolute;
            margin-left: 655px !important;
            margin-top: -15px;

        }

        .tour-modal-title {
            margin-top: 15px;
        }

        .btn-close {
            font-size: 28px;
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
@include('frontend.discount')
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
            <img class="img-fluid-banner"
                src="{{ asset('frontend/assets/images/Qbits-Sigma-10th-Gen-Intel®-Core™-Processor-DDR4-Memory-M.2-512GB-NVMe-SSD-Notebook-15.6 Inches-Full-HD-IPS-Display-with-LED-Backlit.png') }}"
                alt="Qbits-Sigma-10th-Gen-Intel®-Core™-Processor-DDR4-Memory-M.2-512GB-NVMe-SSD-Notebook-15.6 Inches-Full-HD-IPS-Display-with-LED-Backlit">
        </div>
    </div>
</div>

<section class="immense-area" style="margin-top: 0px !important;margin-bottom:80px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="immense">
                    <h1>Immense Power Yet Incredibly Simple</h1>
                    <p>Qbits introduces premium quality computers with top level performance at affordable prices. Built
                        to power your computing challenges for years to come.</p>
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

<div class="mobile-slider-details">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="mobile-slider-text">
                    <p class="mobile-slider-heading">Immense Power Yet Incredibly Simple</p>
                    <p class="mobile-slider-details">Qbits introduces premium quality laptops with top level performance
                        at affordable prices. Built to power your computing challenges for years to come.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="qbits-sigma-section">
    <div class="container">
        <div class="row">
            <div class="sigma-section">
                <div class="col-sm-5">
                    <div class="sigma-text">
                        <h1>SIGMA 15</h1>
                        <h3>Built for Creation and Innovation</h3>
                        <div class="sigma-mobile-image">
                            <img src="frontend/assets/images/Qbits-Sigma-10th-Gen-Intel®-Core™-Processor-DDR4-RAM-M.2-512GB-NVMe-SSD-15.6 Inches-Full-HD-IPS-Display-with-LED-Backlit-best-for-photo-video-editing-Notebook.png"
                                class="img-responsive"
                                alt="Qbits-Sigma-10th-Gen-Intel®-Core™-Processor-DDR4-RAM-M.2-512GB-NVMe-SSD-15.6 Inches-Full-HD-IPS-Display-with-LED-Backlit-best-for-photo-video-editing-Notebook">
                        </div>
                        <p>Designed for creative learners to make an exception. Configured with innovative technology to
                            provide you with a premium experience. Powered by a superfast Intel 10th generation
                            processor and advanced graphics, Full HD IPS display, intuitive touchpad with fingerprint
                            support, DDR4 RAM and long-lasting battery life making it a perfect workspace for intense
                            photo and video editing, executing heavy workloads and multitasking.
                        </p>
                        <a href="{{ route('sigma') }}">Explore Sigma 15</a>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="sigma-image">
                        <img src="frontend/assets/images/Qbits-Sigma-10th-Gen-Intel®-Core™-Processor-DDR4-RAM-M.2-512GB-NVMe-SSD-15.6 Inches-Full-HD-IPS-Display-with-LED-Backlit-best-for-photo-video-editing-Notebook.png"
                            class="img-responsive"
                            alt="Qbits-Sigma-10th-Gen-Intel®-Core™-Processor-DDR4-RAM-M.2-512GB-NVMe-SSD-15.6 Inches-Full-HD-IPS-Display-with-LED-Backlit-best-for-photo-video-editing-Notebook">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- minipc -->
<section class="qbits-alpha-section">
    <div class="container">
        <div class="row">
            <div class="alpha-section">
                <div class="col-7 alpha-image">
                    <img src="/frontend/assets/images/Qbits-Lania-Core™-i7-11-gen-Processor-8GB-DDR4-RAM-up-to-64GB-M.2-512GB-NVMe-SSD-12MB-Intel®-Smart-Cache-superfast-mini-pc.png"
                        class="img-lania"
                        alt="Qbits-Lania-Core™-i7-11-gen-Processor-8GB-DDR4-RAM-up-to-64GB-M.2-512GB-NVMe-SSD-12MB-Intel®-Smart-Cache-superfast-mini-pc">
                </div>

                <div class="col-5 alpha-text">
                    <h1>LANIA</h1>
                    <h3>Combines Power <br> and Flexibility</h3>
                    <div class="alpha-mobile-image">
                        <img src="/frontend/assets/images/Qbits-Lania-Core™-i7-11-gen-Processor-8GB-DDR4-RAM-up-to-64GB-M.2-512GB-NVMe-SSD-12MB-Intel®-Smart-Cache-superfast-mini-pc.png"
                            class="img-lania"
                            alt="Qbits-Lania-Core™-i7-11-gen-Processor-8GB-DDR4-RAM-up-to-64GB-M.2-512GB-NVMe-SSD-12MB-Intel®-Smart-Cache-superfast-mini-pc">
                    </div>
                    <p>The Qbits Lania has been built to deliver astonishing speed and power. The powerful Intel® Core™
                        i7-1165G7 Processor takes this portable power station into another new dimension. Astonishingly
                        fast integrated graphics, DDR4 RAM 3200 MHz, and superfast M.2 NVMe SSD allow you to work, play,
                        and create with max speed. Turns any desk into a workstation. With its compact size and
                        incredible performance, the Qbits Lania keeps you stay productive everywhere.
                    </p>
                    <a href="{{ route('minipc') }}">Explore Lania</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end minipc -->
<!-- <section class="qbits-alpha-section">
    <div class="container">
        <div class="row">
            <div class="alpha-section">
                <div class="col-7 alpha-image">
                    <img src="frontend/assets/images/caliph.png" class="img-responsive" alt="qbits sigma Banner">
                </div>

                <div class="col-5 alpha-text">
                    <h1>CALIPH</h1>
                    <h3>Designed for Mainstream Gamers</h3>
                    <div class="alpha-mobile-image">
                        <img src="frontend/assets/images/caliph.png" class="img-responsive" alt="qbits sigma Banner">
                    </div>
                    <p>Caliph Series laptops have been built with mainstream gamers in mind. Powered by a super-fast
                        Intel 10th generation Coffee Lake Series to take you to the stunning and conclusive victory.
                        The enhanced graphics, advanced thermal architecture, DDR4 RAM with large storage capacity,
                        and improved CPU performance all combine to ensure a great gaming experience. Faster than
                        ever, Qbits Caliph can execute anything from professional quality video and photo
                        editing to intensive workloads and heavy multitasking seamlessly.
                    </p>
      
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- <section class="qbits-caliph-section">
    <div class="container">
        <div class="row">
            <div class="caliph-section">
                <div class="col-sm-5">
                    <div class="caliph-text">
                        <h1>CALIPH</h1>
                        <h3>Designed for Mainstream Gamers</h3>
                        <div class="caliph-mobile-image">
                            <img src="frontend/assets/images/caliph.png" class="img-responsive"
                                alt="qbits sigma Banner">
                        </div>
                        <p>Caliph Series laptops have been built with mainstream gamers in mind. Powered by a super-fast
                            Intel 10th generation Coffee Lake Series to take you to the stunning and conclusive victory.
                            The enhanced graphics, advanced thermal architecture, DDR4 RAM with large storage capacity,
                            and improved CPU performance all combine to ensure a great gaming experience. Faster than
                            ever, Qbits Caliph can execute anything from professional quality video and photo
                            editing to intensive workloads and heavy multitasking seamlessly.
                        </p>
            
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="caliph-image">
                        <img src="frontend/assets/images/caliph.png" class="img-responsive"
                            alt="qbits sigma Banner ">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<section class="explore-laptop-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="explore-laptop">
                    <h1>
                        Explore Qbits to Find <br>
                        the Best Suited Laptops
                    </h1>
                    <a data-bs-toggle="modal" data-bs-target="#myModal" style="cursor: pointer;">Take a Tour &nbsp;<i
                            class="fa fa-angle-right" aria-hidden="true"></i></a>

                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content" style="min-height: 16.6vw;">

                                <!-- Modal body -->
                                <div class="modal-body px-5">

                                    <section class="middle-tab-area">

                                        <div class="px-5 py-0">

                                        </div>

                                        <div class="row">

                                            <div class="col-sm-12">

                                                <div class="close-button">
                                                    <!-- <button type="button" class="btn-close btn "
                                                        data-bs-dismiss="modal" aria-label="Close"><span
                                                            style="font-size: 30px !important;
                                                            margin-left: -29px;
                                                        color: #727272eb !important;">&times;</span></button> -->
                                                    <button type="button" class="btn-close btn " data-bs-dismiss="modal"
                                                        aria-label="Close"><span>&times;</span></button>

                                                </div>

                                                <div class="tour-card card">

                                                    <div class="container">

                                                        <div class="row">

                                                            <p class="tour-modal-title"
                                                                style="color: #9A9A9F !important;">
                                                                Which laptop is right for you? Take a tour here,
                                                                Qbits laptop finder can help you to find the best
                                                                laptop.</p>

                                                            <div class="tab">
                                                                <button id="tab_btn_1" class="tablinks active"
                                                                    onclick="computerType()">Type</button>
                                                                <button id="tab_btn_2" class="tablinks disable-tab-btn"
                                                                    onclick="processor()" disabled>Processor</button>
                                                                <button id="tab_btn_3" class="tablinks disable-tab-btn"
                                                                    onclick="purpose()" disabled>Memory </button>
                                                                <button id="tab_btn_4" class="tablinks disable-tab-btn"
                                                                    onclick="feature()" disabled>Storage </button>
                                                                <button id="tab_btn_5" class="tablinks disable-tab-btn"
                                                                    onclick="budget()" disabled>Budget</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" value="1" id="tour_number">
                                                    <div class="container">
                                                        <form id="tourFrm" action="{{route('tour_data')}}"
                                                            method="post">
                                                            @csrf
                                                            <div class="tab-area-white-space"
                                                                style="margin-top:20px;margin-top:20px;border-radius: 15px;margin-bottom:30px">
                                                                <div id="tabcontent1" style="padding: 25px;">
                                                                    <h6
                                                                        style="text-align: left;font-size: 30px;margin-bottom: 25px;">
                                                                        Which type of
                                                                        laptop are you looking for?</h6>
                                                                    @php

                                                                    $products=
                                                                    App\Models\Product::select('category')->groupBy('category')->orderBy('category','asc')->where('sub_category','Sigma')->orWhere('sub_category','Lania')->get('category')
                                                                    @endphp
                                                                    @foreach ($products as $key => $prod_type)
                                                                    <div class="form-check mb-3">
                                                                        <input type="radio"
                                                                            class="form-check-input processor"
                                                                            id="category_{{$key}}" name="category"
                                                                            value="{{$prod_type->category}}"
                                                                            onclick="tourCategory('{{$key}}')">
                                                                        <label class="form-check-label" for="category"
                                                                            style="float: left;">{{$prod_type->category}}</label>
                                                                    </div>
                                                                    @endforeach

                                                                    <!-- <div class="form-check mb-3">
                                                                        <input type="radio"
                                                                            class="form-check-input processor"
                                                                            id="processor1" name="processor"
                                                                            value="Intel core i5">
                                                                        <label class="form-check-label" for="processor"
                                                                            style="float: left;">Intel core
                                                                            i5</label>
                                                                    </div>
                                                                    <div class="form-check mb-3">
                                                                        <input type="radio"
                                                                            class="form-check-input processor"
                                                                            id="processor2" name="processor"
                                                                            value="Intel core i7">
                                                                        <label class="form-check-label" for="processor"
                                                                            style="float: left;">Intel core
                                                                            i7</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio"
                                                                            class="form-check-input processor"
                                                                            id="processor3" name="processor"
                                                                            value="Intel core i9">
                                                                        <label class="form-check-label"
                                                                            style="float: left;">Intel core
                                                                            i9</label>
                                                                    </div> -->

                                                                </div>

                                                                <div id="tabcontent2" style="padding: 25px;">
                                                                    <h6
                                                                        style="text-align: left;font-size: 30px;margin-bottom: 25px;">
                                                                        What type of processor you preferred?</h6>
                                                                    <div id="all_processor">
                                                                        @php
                                                                        $all_products=
                                                                        App\Models\Product::select('processor')->groupBy('processor')->orderBy('processor','asc')->where('category','Laptop')->orWhere('category','Desktop')->get('processor');
                                                                        @endphp
                                                                        @foreach ($all_products as $key => $processor)
                                                                        <div class="form-check mb-3">
                                                                            <input type="radio" class="form-check-input"
                                                                                id="screen_size1" name="processor"
                                                                                value="{{$processor->processor}}"
                                                                                onclick="tourProcessor()">
                                                                            <label class="form-check-label"
                                                                                for="processor"
                                                                                style="float: left;">{{$processor->processor}}</label>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>

                                                                    <div id="laptop_processor">
                                                                        @php
                                                                        $laptop_products=
                                                                        App\Models\Product::select('processor')->groupBy('processor')->orderBy('id','asc')->where('category','Laptop')->get('processor')
                                                                        @endphp
                                                                        @foreach ($laptop_products as $key =>
                                                                        $processor)
                                                                        <div class="form-check mb-3">
                                                                            <input type="radio" class="form-check-input"
                                                                                id="screen_size1" name="processor"
                                                                                value="{{$processor->processor}}"
                                                                                onclick="tourProcessor()">
                                                                            <label class="form-check-label"
                                                                                for="processor"
                                                                                style="float: left;">{{$processor->processor}}</label>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>

                                                                    <div id="desktop_processor">
                                                                        @php
                                                                        $desktop_products=
                                                                        App\Models\Product::select('processor')->groupBy('processor')->orderBy('id','asc')->where('category','Desktop')->get('processor')
                                                                        @endphp
                                                                        @foreach ($desktop_products as $key =>
                                                                        $processor)
                                                                        <div class="form-check mb-3">
                                                                            <input type="radio" class="form-check-input"
                                                                                id="screen_size1" name="processor"
                                                                                value="{{$processor->processor}}"
                                                                                onclick="tourProcessor()">
                                                                            <label class="form-check-label"
                                                                                for="processor"
                                                                                style="float: left;">{{$processor->processor}}</label>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                    <!-- 
                                                                    <div class="form-check mb-3">
                                                                        <input type="radio" class="form-check-input"
                                                                            id="screen_size2" name="screen_size"
                                                                            value="16.0">
                                                                        <label class="form-check-label"
                                                                            for="screen_size2" style="float: left;">16.0
                                                                            Inch</label>
                                                                    </div> -->

                                                                </div>

                                                                <div id="tabcontent3" style="padding: 25px;">
                                                                    <h6
                                                                        style="text-align: left;font-size: 30px;margin-bottom: 25px;">
                                                                        How much Memory do
                                                                        you need?</h6>
                                                                    <div id="all_memory">
                                                                        @php
                                                                        $all_ram =
                                                                        App\Models\Product::where('sub_category','ram')->where('status','1')->where('current_stock',
                                                                        '>', 0)->get();
                                                                        $ram_numb = '';
                                                                        @endphp
                                                                        @foreach ($all_ram as $key => $single_ram)
                                                                        <?php
                                                                            $ram_numb = explode(' ', $single_ram->name);
                                                                        ?>
                                                                        <div class="form-check mb-3">
                                                                            <input type="radio" class="form-check-input"
                                                                                id="memory1" name="memory"
                                                                                value="{{$ram_numb[0]}} {{$ram_numb[1]}}"
                                                                                onclick="tourMemory('{{$single_ram->unit_price}}')">
                                                                            <label class="form-check-label"
                                                                                for="memory1"
                                                                                style="float: left;">{{$ram_numb[0]}}
                                                                                {{$ram_numb[1]}} DDR4 3200 MHz</label>
                                                                        </div>
                                                                        @endforeach
                                                                        <input type="hidden" name="memory_price"
                                                                            id="memory-price" value="">
                                                                    </div>

                                                                    <!-- <div id="laptop_memory">
                                                                        @php
                                                                        $laptop_products_ram=
                                                                        App\Models\Product::select('ram')->groupBy('ram')->orderBy('id','asc')->where('category','Laptop')->get('ram');
                                                                        @endphp
                                                                        @foreach ($laptop_products_ram as $key => $ram)
                                                                        <div class="form-check mb-3">
                                                                            <input type="radio" class="form-check-input"
                                                                                id="memory1" name="memory"
                                                                                value="{{$ram->ram}}" onclick="tourMemory()">
                                                                            <label class="form-check-label"
                                                                                for="memory1"
                                                                                style="float: left;">{{$ram->ram}}</label>
                                                                        </div>
                                                                        @endforeach
                                                                    </div> -->

                                                                    <!-- <div id="desktop_memory">
                                                                        @php
                                                                        $desktop_products_ram=
                                                                        App\Models\Product::select('ram')->groupBy('ram')->orderBy('ram','asc')->where('category','Desktop')->get('ram');
                                                                        @endphp
                                                                        @foreach ($desktop_products_ram as $key => $ram)
                                                                        <div class="form-check mb-3">
                                                                            <input type="radio" class="form-check-input"
                                                                                id="memory1" name="memory"
                                                                                value="{{$ram->ram}}" onclick="tourMemory()">
                                                                            <label class="form-check-label"
                                                                                for="memory1"
                                                                                style="float: left;">{{$ram->ram}}</label>
                                                                        </div>
                                                                        @endforeach
                                                                    </div> -->
                                                                    <!-- <div class="form-check mb-3">
                                                                        <input type="radio" class="form-check-input"
                                                                            id="memory1" name="memory" value="8 GB">
                                                                        <label class="form-check-label" for="memory1"
                                                                            style="float: left;">8
                                                                            GB</label>
                                                                    </div>
                                                                    <div class="form-check mb-3">
                                                                        <input type="radio" class="form-check-input"
                                                                            id="memory2" name="memory" value="16 GB">
                                                                        <label class="form-check-label" for="memory2"
                                                                            style="float: left;">16
                                                                            GB</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" class="form-check-input"
                                                                            id="memory3" name="memory" value="32 GB">
                                                                        <label class="form-check-label"
                                                                            style="float: left;">32 GB</label>
                                                                    </div> -->
                                                                </div>

                                                                <div id="tabcontent4" style="padding: 25px;">
                                                                    <h6
                                                                        style="text-align: left;font-size: 30px;margin-bottom: 25px;">
                                                                        How much storage
                                                                        you preferred?</h6>
                                                                    <div id="all_storage">
                                                                        @php
                                                                        $all_storage =
                                                                        App\Models\Product::where('sub_category','ssd')->where('status','1')->where('current_stock',
                                                                        '>', 0)->get();
                                                                        $ssd_numb = '';
                                                                        @endphp
                                                                        @foreach ($all_storage as $key =>
                                                                        $single_storage)
                                                                        <?php
                                                                            $ssd_numb = explode(' ', $single_storage->name);
                                                                        ?>
                                                                        <div class="form-check mb-3">
                                                                            <input type="radio" class="form-check-input"
                                                                                id="storage1" name="storage"
                                                                                value="{{$ssd_numb[0]}} {{$ssd_numb[1]}}"
                                                                                onclick="tourStorage('{{$single_storage->unit_price}}')">
                                                                            <label class="form-check-label"
                                                                                for="storage1"
                                                                                style="float: left;">{{$ssd_numb[0]}}
                                                                                {{$ssd_numb[1]}} M.2 NVMe</label>
                                                                        </div>
                                                                        @endforeach
                                                                        <input type="hidden" name="storage_price"
                                                                            id="storage-price" value="">
                                                                    </div>

                                                                    <!-- <div id="laptop_storage">
                                                                        @php
                                                                        $laptop_products_storage=
                                                                        App\Models\Product::select('storage')->groupBy('storage')->orderBy('storage','asc')->where('category','Laptop')->get('storage');
                                                                        @endphp
                                                                        @foreach ($laptop_products_storage as $key =>
                                                                        $storage)
                                                                        <div class="form-check mb-3">
                                                                            <input type="radio" class="form-check-input"
                                                                                id="storage1" name="storage"
                                                                                value="{{$storage->storage}}" onclick="tourStorage()">
                                                                            <label class="form-check-label"
                                                                                for="storage1"
                                                                                style="float: left;">{{$storage->storage}}</label>
                                                                        </div>
                                                                        @endforeach
                                                                    </div> -->

                                                                    <!-- <div id="desktop_storage">
                                                                        @php
                                                                        $desktop_products_storage=
                                                                        App\Models\Product::select('storage')->groupBy('storage')->orderBy('storage','asc')->where('category','Desktop')->get('storage');
                                                                        @endphp
                                                                        @foreach ($desktop_products_storage as $key =>
                                                                        $storage)
                                                                        <div class="form-check mb-3">
                                                                            <input type="radio" class="form-check-input"
                                                                                id="storage1" name="storage"
                                                                                value="{{$storage->storage}}" onclick="tourStorage()">
                                                                            <label class="form-check-label"
                                                                                for="storage1"
                                                                                style="float: left;">{{$storage->storage}}</label>
                                                                        </div>
                                                                        @endforeach
                                                                    </div> -->

                                                                    <!-- <div class="form-check mb-3">
                                                                        <input type="radio" class="form-check-input"
                                                                            id="storage2" name="storage" value="512 GB">
                                                                        <label class="form-check-label" for="storage2"
                                                                            style="float: left;">512
                                                                            GB</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" class="form-check-input"
                                                                            id="storage3" name="storage" value="256 GB">
                                                                        <label class="form-check-label" for="storage3"
                                                                            style="float: left;">256
                                                                            GB</label>
                                                                    </div> -->

                                                                </div>
                                                                <div id="tabcontent5" style="padding: 25px;">
                                                                    <h6
                                                                        style="text-align: left;font-size: 30px;margin-bottom: 25px;">
                                                                        What is your best
                                                                        budget?</h6>

                                                                    <div class="form-check mb-3">
                                                                        <input type="radio" class="form-check-input"
                                                                            id="budget1" name="budget" value="20"
                                                                            onclick="tourBudget()">
                                                                        <label class="form-check-label" for="budget1"
                                                                            style="float: left;">20,000৳ to
                                                                            40,000৳</label>
                                                                    </div>
                                                                    <div class="form-check mb-3">
                                                                        <input type="radio" class="form-check-input"
                                                                            id="budget2" name="budget" value="40"
                                                                            onclick="tourBudget()">
                                                                        <label class="form-check-label" for="budget2"
                                                                            style="float: left;">40,000৳ to 60,000৳
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" class="form-check-input"
                                                                            id="budget2" name="budget" value="60"
                                                                            onclick="tourBudget()">
                                                                        <label class="form-check-label"
                                                                            style="float: left;">60,000৳ to
                                                                            1,00,000৳</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab">
                                                                <button type="button"
                                                                    onclick="prevDiv()">Previous</button>
                                                                <button type="button" id="next_btn" onclick="nextDiv()"
                                                                    disabled>Next</button>
                                                                <button type="submit" id="tour_result_btn" disabled>Tour
                                                                    Result</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
</section>
</div>
</div>
</div>
</div>



<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="min-height: 100% !important">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>



</div>
</div>
</div>
</div>
</section>



<!-- footer section -->
@include('frontend.partials.home')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // function openCity(evt, cityName) {
    //     var i, tabcontent, tablinks;
    //     tabcontent = document.getElementsByClassName("tabcontent");
    //     for (i = 0; i < tabcontent.length; i++) {
    //         tabcontent[i].style.display = "none";
    //     }
    //     tablinks = document.getElementsByClassName("tablinks");
    //     for (i = 0; i < tablinks.length; i++) {
    //         tablinks[i].className = tablinks[i].className.replace(" active", "");
    //     }
    //     document.getElementById(cityName).style.display = "block";
    //     evt.currentTarget.className += " active";
    //     var b = document.getElementById(cityName).id;
    //     var c = document.getElementById("next").innerHTML = b;
    //     console.log(b);
    // }

    // Get the element with id="defaultOpen" and click on it
    // document.getElementById("tab_btn_1").click();

    function tourCategory(id) {
        //remove next button disabled attribute
        var nxtBtn = document.getElementById('next_btn');
        nxtBtn.removeAttribute('disabled');

        //update type field value
        document.getElementById('typeField').value = 1;

        if (id == 0) { //desktop
            //processor
            document.getElementById('desktop_processor').style.display = 'block';
            document.getElementById('laptop_processor').style.display = 'none';
            document.getElementById('all_processor').style.display = 'none';

            //memory
            // document.getElementById('all_memory').style.display = 'none';
            // document.getElementById('laptop_memory').style.display = 'none';
            // document.getElementById('desktop_memory').style.display = 'block';

            //storage
            // document.getElementById('all_storage').style.display = 'none';
            // document.getElementById('laptop_storage').style.display = 'none';
            // document.getElementById('desktop_storage').style.display = 'block';
        } else if (id == 1) { //laptop
            //processor
            document.getElementById('desktop_processor').style.display = 'none';
            document.getElementById('laptop_processor').style.display = 'block';
            document.getElementById('all_processor').style.display = 'none';

            //memory
            // document.getElementById('all_memory').style.display = 'none';
            // document.getElementById('laptop_memory').style.display = 'block';
            // document.getElementById('desktop_memory').style.display = 'none';

            //storage
            // document.getElementById('all_storage').style.display = 'none';
            // document.getElementById('laptop_storage').style.display = 'block';
            // document.getElementById('desktop_storage').style.display = 'none';
        }
    }

    function tourProcessor() {
        //remove next button disabled attribute
        var nxtBtn = document.getElementById('next_btn');
        nxtBtn.removeAttribute('disabled');

        //update proccessor field
        document.getElementById('processorField').value = 1;
    }

    function tourMemory(price) {
        //remove next button disabled attribute
        var nxtBtn = document.getElementById('next_btn');
        nxtBtn.removeAttribute('disabled');

        //update memory field
        document.getElementById('memoryField').value = 1;

        //update memory price
        document.getElementById('memory-price').value = price;
    }

    function tourStorage(price) {
        //remove next button disabled attribute
        var nxtBtn = document.getElementById('next_btn');
        nxtBtn.removeAttribute('disabled');

        //update storage field
        document.getElementById('storageField').value = 1;

        //update storage price
        document.getElementById('storage-price').value = price;
    }

    function tourBudget() {
        //remove tour result button disabled attribute
        var tresultBtn = document.getElementById('tour_result_btn');
        tresultBtn.removeAttribute('disabled');

        //update budget field
        document.getElementById('budgetField').value = 1;
    }

    function computerType() {
        document.getElementById('tabcontent1').style.display = 'block';
        document.getElementById('tabcontent2').style.display = 'none';
        document.getElementById('tabcontent3').style.display = 'none';
        document.getElementById('tabcontent4').style.display = 'none';
        document.getElementById('tabcontent5').style.display = 'none';

        $('#tab_btn_2').removeClass('active');
        $('#tab_btn_3').removeClass('active');
        $('#tab_btn_4').removeClass('active');
        $('#tab_btn_5').removeClass('active');
        $('#tab_btn_1').addClass('active');

        $('#tour_number').val('1');
        document.getElementById('next_btn').style.display = 'block';
        document.getElementById('tour_result_btn').style.display = 'none';
    }

    function processor() {
        document.getElementById('tabcontent1').style.display = 'none';
        document.getElementById('tabcontent2').style.display = 'block';
        document.getElementById('tabcontent3').style.display = 'none';
        document.getElementById('tabcontent4').style.display = 'none';
        document.getElementById('tabcontent5').style.display = 'none';

        $('#tab_btn_1').removeClass('active');
        $('#tab_btn_3').removeClass('active');
        $('#tab_btn_4').removeClass('active');
        $('#tab_btn_5').removeClass('active');
        $('#tab_btn_2').addClass('active');

        $('#tour_number').val('2');
        document.getElementById('next_btn').style.display = 'block';
        document.getElementById('tour_result_btn').style.display = 'none';
    }

    function purpose() {
        document.getElementById('tabcontent1').style.display = 'none';
        document.getElementById('tabcontent2').style.display = 'none';
        document.getElementById('tabcontent3').style.display = 'block';
        document.getElementById('tabcontent4').style.display = 'none';
        document.getElementById('tabcontent5').style.display = 'none';

        $('#tab_btn_1').removeClass('active');
        $('#tab_btn_2').removeClass('active');
        $('#tab_btn_4').removeClass('active');
        $('#tab_btn_5').removeClass('active');
        $('#tab_btn_3').addClass('active');

        $('#tour_number').val('3');
        document.getElementById('next_btn').style.display = 'block';
        document.getElementById('tour_result_btn').style.display = 'none';
    }

    function feature() {
        document.getElementById('tabcontent1').style.display = 'none';
        document.getElementById('tabcontent2').style.display = 'none';
        document.getElementById('tabcontent3').style.display = 'none';
        document.getElementById('tabcontent4').style.display = 'block';
        document.getElementById('tabcontent5').style.display = 'none';

        $('#tab_btn_1').removeClass('active');
        $('#tab_btn_2').removeClass('active');
        $('#tab_btn_3').removeClass('active');
        $('#tab_btn_5').removeClass('active');
        $('#tab_btn_4').addClass('active');

        $('#tour_number').val('4');
        document.getElementById('next_btn').style.display = 'block';
        document.getElementById('tour_result_btn').style.display = 'none';
    }

    function budget() {
        var nxtBtn = document.getElementById('next_btn');
        nxtBtn.removeAttribute('disabled');

        document.getElementById('tabcontent1').style.display = 'none';
        document.getElementById('tabcontent2').style.display = 'none';
        document.getElementById('tabcontent3').style.display = 'none';
        document.getElementById('tabcontent4').style.display = 'none';
        document.getElementById('tabcontent5').style.display = 'block';

        $('#tab_btn_1').removeClass('active');
        $('#tab_btn_2').removeClass('active');
        $('#tab_btn_3').removeClass('active');
        $('#tab_btn_4').removeClass('active');
        $('#tab_btn_5').addClass('active');

        $('#tour_number').val('5');
        document.getElementById('next_btn').style.display = 'none';
        document.getElementById('tour_result_btn').style.display = 'block';
    }

    function nextDiv() {
        var num = $('#tour_number').val();
        if (num == '1') {
            if ($('#typeField').val() == '0') {
                $("#next_btn").attr("disabled", true);
                return;
            } else {
                $("#next_btn").attr("disabled", false);
            }

            document.getElementById('tabcontent1').style.display = 'none';
            document.getElementById('tabcontent2').style.display = 'block';
            document.getElementById('tabcontent3').style.display = 'none';
            document.getElementById('tabcontent4').style.display = 'none';
            document.getElementById('tabcontent5').style.display = 'none';

            //
            var btn2 = document.getElementById('tab_btn_2');
            btn2.removeAttribute('disabled');
            btn2.classList.remove("disable-tab-btn");
            //

            $('#tab_btn_1').removeClass('active');
            $('#tab_btn_3').removeClass('active');
            $('#tab_btn_4').removeClass('active');
            $('#tab_btn_5').removeClass('active');
            $('#tab_btn_2').addClass('active');

            $('#tour_number').val('2');
            document.getElementById('next_btn').style.display = 'block';
            document.getElementById('tour_result_btn').style.display = 'none';
        } else if (num == '2') {

            if ($('#processorField').val() == '0') {
                $("#next_btn").attr("disabled", true);
                return;
            } else {
                $("#next_btn").attr("disabled", false);
            }

            document.getElementById('tabcontent1').style.display = 'none';
            document.getElementById('tabcontent2').style.display = 'none';
            document.getElementById('tabcontent3').style.display = 'block';
            document.getElementById('tabcontent4').style.display = 'none';
            document.getElementById('tabcontent5').style.display = 'none';

            //
            var btn3 = document.getElementById('tab_btn_3');
            btn3.removeAttribute('disabled');
            btn3.classList.remove("disable-tab-btn");
            //

            $('#tab_btn_1').removeClass('active');
            $('#tab_btn_2').removeClass('active');
            $('#tab_btn_4').removeClass('active');
            $('#tab_btn_5').removeClass('active');
            $('#tab_btn_3').addClass('active');

            $('#tour_number').val('3');
            document.getElementById('next_btn').style.display = 'block';
            document.getElementById('tour_result_btn').style.display = 'none';
        } else if (num == '3') {

            if ($('#memoryField').val() == '0') {
                $("#next_btn").attr("disabled", true);
                return;
            } else {
                $("#next_btn").attr("disabled", false);
            }

            document.getElementById('tabcontent1').style.display = 'none';
            document.getElementById('tabcontent2').style.display = 'none';
            document.getElementById('tabcontent3').style.display = 'none';
            document.getElementById('tabcontent4').style.display = 'block';
            document.getElementById('tabcontent5').style.display = 'none';

            //
            var btn4 = document.getElementById('tab_btn_4');
            btn4.removeAttribute('disabled');
            btn4.classList.remove("disable-tab-btn");
            //

            $('#tab_btn_1').removeClass('active');
            $('#tab_btn_2').removeClass('active');
            $('#tab_btn_3').removeClass('active');
            $('#tab_btn_5').removeClass('active');
            $('#tab_btn_4').addClass('active');

            $('#tour_number').val('4');

            document.getElementById('next_btn').style.display = 'block';
            document.getElementById('tour_result_btn').style.display = 'none';
        } else if (num == '4') {

            if ($('#storageField').val() == '0') {
                $("#next_btn").attr("disabled", true);
                return;
            } else {
                $("#next_btn").attr("disabled", false);
            }

            document.getElementById('tabcontent1').style.display = 'none';
            document.getElementById('tabcontent2').style.display = 'none';
            document.getElementById('tabcontent3').style.display = 'none';
            document.getElementById('tabcontent4').style.display = 'none';
            document.getElementById('tabcontent5').style.display = 'block';

            //
            var btn5 = document.getElementById('tab_btn_5');
            btn5.removeAttribute('disabled');
            btn5.classList.remove("disable-tab-btn");
            //

            $('#tab_btn_1').removeClass('active');
            $('#tab_btn_2').removeClass('active');
            $('#tab_btn_3').removeClass('active');
            $('#tab_btn_4').removeClass('active');
            $('#tab_btn_5').addClass('active');

            $('#tour_number').val('5');

            document.getElementById('next_btn').style.display = 'none';
            document.getElementById('tour_result_btn').style.display = 'block';
        }
    }

    function prevDiv() {
        $("#next_btn").attr("disabled", false);
        var num = $('#tour_number').val();
        if (num == '1') {
            document.getElementById('tabcontent1').style.display = 'block';
            document.getElementById('tabcontent2').style.display = 'none';
            document.getElementById('tabcontent3').style.display = 'none';
            document.getElementById('tabcontent4').style.display = 'none';
            document.getElementById('tabcontent5').style.display = 'none';

            $('#tab_btn_2').removeClass('active');
            $('#tab_btn_3').removeClass('active');
            $('#tab_btn_4').removeClass('active');
            $('#tab_btn_5').removeClass('active');
            $('#tab_btn_1').addClass('active');

            $('#tour_number').val('1');
            document.getElementById('next_btn').style.display = 'block';
            document.getElementById('tour_result_btn').style.display = 'none';
        } else if (num == '2') {
            document.getElementById('tabcontent1').style.display = 'block';
            document.getElementById('tabcontent2').style.display = 'none';
            document.getElementById('tabcontent3').style.display = 'none';
            document.getElementById('tabcontent4').style.display = 'none';
            document.getElementById('tabcontent5').style.display = 'none';

            $('#tab_btn_2').removeClass('active');
            $('#tab_btn_3').removeClass('active');
            $('#tab_btn_4').removeClass('active');
            $('#tab_btn_5').removeClass('active');
            $('#tab_btn_1').addClass('active');

            $('#tour_number').val('1');
            document.getElementById('next_btn').style.display = 'block';
            document.getElementById('tour_result_btn').style.display = 'none';
        } else if (num == '3') {
            document.getElementById('tabcontent1').style.display = 'none';
            document.getElementById('tabcontent2').style.display = 'block';
            document.getElementById('tabcontent3').style.display = 'none';
            document.getElementById('tabcontent4').style.display = 'none';
            document.getElementById('tabcontent5').style.display = 'none';

            $('#tab_btn_1').removeClass('active');
            $('#tab_btn_3').removeClass('active');
            $('#tab_btn_4').removeClass('active');
            $('#tab_btn_5').removeClass('active');
            $('#tab_btn_2').addClass('active');

            $('#tour_number').val('2');

            document.getElementById('next_btn').style.display = 'block';
            document.getElementById('tour_result_btn').style.display = 'none';
        } else if (num == '4') {
            document.getElementById('tabcontent1').style.display = 'none';
            document.getElementById('tabcontent2').style.display = 'none';
            document.getElementById('tabcontent3').style.display = 'block';
            document.getElementById('tabcontent4').style.display = 'none';
            document.getElementById('tabcontent5').style.display = 'none';

            $('#tab_btn_1').removeClass('active');
            $('#tab_btn_2').removeClass('active');
            $('#tab_btn_4').removeClass('active');
            $('#tab_btn_5').removeClass('active');
            $('#tab_btn_3').addClass('active');

            $('#tour_number').val('3');

            document.getElementById('next_btn').style.display = 'block';
            document.getElementById('tour_result_btn').style.display = 'none';
        } else if (num == '5') {
            document.getElementById('tabcontent1').style.display = 'none';
            document.getElementById('tabcontent2').style.display = 'none';
            document.getElementById('tabcontent3').style.display = 'none';
            document.getElementById('tabcontent4').style.display = 'block';
            document.getElementById('tabcontent5').style.display = 'none';

            $('#tab_btn_1').removeClass('active');
            $('#tab_btn_2').removeClass('active');
            $('#tab_btn_3').removeClass('active');
            $('#tab_btn_5').removeClass('active');
            $('#tab_btn_4').addClass('active');

            $('#tour_number').val('4');

            document.getElementById('next_btn').style.display = 'block';
            document.getElementById('tour_result_btn').style.display = 'none';
        }
    }


    function submitTourResult() {
        var data = $("#tourFrm").serialize();
        jQuery.ajax({
            url: 'tour/results',
            data: data,
            type: 'post',
            success: function (result) {
                // if (result.status == 'success') {


                // } else if (result.status == 'error') {

                // }
            }
        });
    }

    function closeBox() {

        document.getElementsByClassName("modal").style.display = "";
    }

</script>

<input type="hidden" id="typeField" value="0">
<input type="hidden" id="processorField" value="0">
<input type="hidden" id="memoryField" value="0">
<input type="hidden" id="storageField" value="0">
<input type="hidden" id="budgetField" value="0">

@endsection
