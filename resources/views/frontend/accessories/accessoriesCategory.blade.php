@extends('frontend.layouts.master')
@section('title','Accessories')
@section('content')



<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/brands.min.css"
    integrity="sha512-nS1/hdh2b0U8SeA8tlo7QblY6rY6C+MgkZIeRzJQQvMsFfMQFUKp+cgMN2Uuy+OtbQ4RoLMIlO2iF7bIEY3Oyg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .menu-width {
        width: 172px;
    }

    .starting {
        text-decoration: none;
        font-size: 22px;
        line-height: 17px;
        font-weight: 500;
    }

    span.filters-item {
        font-size: 16px;
        line-height: 25px;
        font-weight: 600;
    }

    span.filters {
        font-size: 22px;
        line-height: 29px;
        color: #030303;
        font-weight: 500;
    }

    .accordion-flush .accordion-item .accordion-button {
        border-radius: 0;
        margin-left: -1vw;
        font-weight: 600;
        line-height: 25px;
        font-size: 16px;
        box-shadow: 0 0 0 0.25rem rgb(143 143 143 / 0%);
    }

    .accordion-button {
        z-index: 0 !important;
        box-shadow: transparent !important;
    }

    .accordion-button:not(.collapsed) {
        box-shadow: transparent !important;
    }

    .filter-options-title {
        padding-bottom: 15px;
    }

    .filter-options-item.filter-options-categori {
        padding: 20px 0px 0px 0px;
    }

    .block-title {
        padding-bottom: 15px;
    }

    ol,
    ul {
        padding-left: 1.5rem;
    }

    .accordion-button:not(.collapsed) {
        color: #000000;
        background-color: #ffffff;
        box-shadow: inset 0 -1px 0 rgb(0 0 0 / 13%);
    }

    .accordion-button:focus {
        box-shadow: 0 0 0 0.25rem rgba(143, 143, 143, 0);
    }

    /* .sigma-category-contant-section .sigma-category-image-section {
        background-color: #f1f1f1;
    } */



    .sigma-category-contant-section .checked {
        color: #2699fb;
    }

    .sigma-category-contant-section .buy-button {
        background-color: #1486f9;
        border-radius: 2.6vw;
        font-size: 14px;
        font-family: "Roboto", sans-serif;
        padding: 1.04vw 4.16vw;
        color: #fff;
    }

    .sigma-category-contant-section .sigma-buy-button {
        background-color: #1486f9;
        border-radius: 50px;
        font-size: 20px;
        /* font-family: "Roboto", sans-serif; */
        padding: 13.44px 44.16px;
        color: #fff;
        border: 1px solid;
    }

    .sigma-category-contant-section .sigma-buy-button:hover {
        background-color: #0071E3F7;
    }

    .sigma-category-contant-section .list {
        font-size: 16px;
        margin-top: 40px;
    }

    .card-customize {
        min-height: 750px;
        /* padding: 0px 20px; */
        padding-bottom: 44px;
        box-shadow: 0px 2px 4px 2px #00000014;
        border-radius: 20px;
        border: 0.5px solid #f7f7f7;
    }

    .sigma-title {
        /* text-align: center; */
        padding-right: 19px;
        font-size: 22px;
        text-decoration: none;
        line-height: 27px;
        color: #000000;
    }

    .sigma-title:hover {

        color: #000000;
    }

    img.img-fluid {
        width: 100%;
        /* max-height: 201px; */
        object-fit: cover;
    }

    .ui-widget.ui-widget-content {
        border: 1px solid #D6D6D6;
    }

    .ui-slider-horizontal {
        top: 10px;
        height: 0.5em;
        z-index: 0;
        background-color: #D6D6D6;
    }

    .ui-widget-header {
        border: 1px solid #dddddd;
        background: #1486F9;
        color: #333333;
        font-weight: bold;
    }

    .ui-state-default,
    .ui-widget-content .ui-state-default,
    .ui-widget-header .ui-state-default,
    .ui-button,
    html .ui-button.ui-state-disabled:hover,
    html .ui-button.ui-state-disabled:active {
        /* border: 1px solid #929292;
        background: #929292; */
        /* font-weight: normal; */
        color: #929292;
        border-radius: 50px;
        width: 16px;
        height: 16px;
        background: #fff;
        border: 2px solid #1486F9;
        box-shadow: 0 0 0 2px #fff inset, 0 0 0 6px #1486f9 inset, 0 0 0 1px #fff;

    }

    .ui-state-focus,
    .ui-state-active {

        border: 2px solid #1486f9 !important;
    }

    .range {
        height: 39px;
        /* background: #fff;
        border-radius: 10px; */
        padding: 0 34px 0 31px;
        /* box-shadow: 2px 4px 8px rgba(0, 0, 0, 0.1); */
    }

    .amount {
        display: inline-flex;
        padding: 0px 18px 15px;

    }

    input#amount_start,
    input#amount_end,
    input#amount_start1,
    input#amount_end1 {
        border: 0;
        outline: 0;
    }

    .sliderValue {
        position: relative;
        width: 100%;
    }

    .sliderValue span {
        position: absolute;
        height: 45px;
        width: 45px;
        transform: translateX(-70%) scale(0);
        font-weight: 500;
        top: -40px;
        line-height: 55px;
        z-index: -5;
        color: #fff;
        transform-origin: bottom;
        transition: transform 0.3s ease-in-out;
    }

    .sliderValue span.show {
        transform: translateX(-70%) scale(1);
    }

    .sliderValue span:after {
        position: absolute;
        content: "";
        height: 100%;
        width: 100%;
        background: #2699fb;
        border: 3px solid #fff;
        z-index: -5;
        left: 50%;
        transform: translateX(-50%) rotate(45deg);
        border-bottom-left-radius: 50%;
        box-shadow: 0px 0px 8px rgba(255, 255, 255, 0.1);
        border-top-left-radius: 50%;
        border-top-right-radius: 50%;
    }

    .field {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        position: relative;
    }

    .field .value {
        position: absolute;
        font-size: 18px;
        color: #2699fb;
        font-weight: 600;
    }

    .field .value.left {
        left: -22px;
    }

    .field .value.right {
        right: -43px;
    }

    .range input {
        -webkit-appearance: none;
        width: 100%;
        height: 3px;
        background: #ddd;
        border-radius: 5px;
        outline: none;
        border: none;
    }

    .range input::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 20px;
        height: 20px;
        background: red;
        border-radius: 50%;
        background: #2699fb;
        border: 1px solid #2699fb;
        cursor: pointer;
    }

    .range input::-moz-range-thumb {
        -webkit-appearance: none;
        width: 20px;
        height: 20px;
        background: red;
        border-radius: 50%;
        background: #2699fb;
        border: 1px solid #2699fb;
        cursor: pointer;
    }

    .range input::-moz-range-progress {
        background: #2699fb;
    }

    .filter-options-price {
        border-bottom: 1px dashed #dfdfdf;
        margin-bottom: 22px;
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
                        <a href="{{ route('warranty')}}">Warranty</a>
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
<!-- test -->
<div class="filter-menu">
    <input id="left-menu" value="1" type="checkbox" />
    <input id="left-menu-reset" type="reset" />
    <label class="menu-toggle" for="left-menu">
        <!-- <span><i style="    color: white;
                    font-size: 30px;
                    width: 100%;
                    height: auto;
                    position: relative;
                    top: -12px;" class="fa-solid fa-filter"></i></span> -->
        <span><img alt="Logo" style=" color: white;
            font-size: 30px;
            width: 65%;
            height: auto;
            position: relative;
            top: -12px;
            padding-left: 2px;" src="{{ asset('filter.png') }}"><br><br></span>
    </label>
    <div class="left-navigation nav">
        <!-- <div class="menuTitel">
            <h1 class="heading">Ecomclips</h1>
        </div> -->
        <main>

            <div class="col-sm-3 col-sidebar menu-width">
                <div id="layered-filter-block" class="block-sidebar block-filter no-hide">
                    <div class="block-title" style="border-bottom: 1px solid rgba(223, 221, 221, 0.7);">
                        <span class="filters">Filters</span></div>
                    <div class="block-content">
                        <div class="filter-options-item filter-options-categori">
                            <div class="filter-options-title"><span class="filters-item">Products</span>
                            </div>
                            <div class=" filter-options-content"
                                style="border-bottom: 1px solid rgba(223, 221, 221, 0.7);">
                                <ol style="list-style: none;">


                                    @foreach($sub_category as $key=>$sub_categorys)
                                    @php
                                    $sub_category1 = App\Models\Product::where('sub_category',
                                    $sub_categorys->sub_category)->where('status','1')->where('unit_price',
                                    '!=',0)->count();
                                    @endphp

                                    <li>@if($sub_category1 !='0')
                                        <label>
                                            <input type="checkbox" class="sub_categorys"
                                                value="{{$sub_categorys->sub_category}}">
                                            <span>{{$sub_categorys->sub_category}}
                                                ({{$sub_category1}})</span>
                                        </label>
                                        @elseif($sub_category1 =='0')
                                        <label style="color: #A0A0A5">
                                            <input type="checkbox" class="sub_categorys" value="{{$sub_categorys}}"
                                                disabled>
                                            <span>{{$sub_categorys->sub_category}} ({{$sub_category1}})</span>
                                        </label>
                                        @endif

                                    </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- test -->

<div class="driver-area-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-sidebar filter-section">
                <div id="layered-filter-block" class="block-sidebar block-filter no-hide">
                    <div class="block-title" style="border-bottom: 1px solid rgba(223, 221, 221, 0.7);">
                        <span class="filters">Filters</span></div>
                    <div class="block-content">
                        <div class="filter-options-item filter-options-categori">
                            <div class="filter-options-title"><span class="filters-item">Products</span>
                            </div>
                            <div class=" filter-options-content"
                                style="border-bottom: 1px solid rgba(223, 221, 221, 0.7);">
                                <ol style="list-style: none;">


                                    @foreach($sub_category as $key=>$sub_categorys)
                                    @php
                                    $sub_category = App\Models\Product::where('sub_category',
                                    $sub_categorys->sub_category)->where('status','1')->where('unit_price',
                                    '!=',0)->count();
                                    @endphp

                                    <li>@if($sub_category !='0')
                                        <label>
                                            <input type="checkbox" class="sub_categorys"
                                                value="{{$sub_categorys->sub_category}}">
                                            <span>{{$sub_categorys->sub_category}} ({{$sub_category}})</span>
                                        </label>
                                        @elseif($sub_category =='0')
                                        <label style="color: #A0A0A5">
                                            <input type="checkbox" class="sub_categorys"
                                                value="{{$sub_categorys->sub_category}}" disabled>
                                            <span>{{$sub_categorys->sub_category}} ({{$sub_category}})</span>
                                        </label>
                                        @endif

                                    </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 col-sidebar" id="updateDiv">

                <div class="row">
                    @foreach($products as $key=>$product)


                    <div class="col-sm-6" style="margin-bottom:40px">
                        <div class="sigma-category-contant-section">
                            <div class="card card-customize">
                                <div class="sigma-category-image-section">
                                    <a href="{{ route('product_details1',$product->slug)}}">
                                        <div class="item" style=""><img src="{{ asset($product->galary_photo) }}"
                                                alt="The Last of us" class="img-fluid"></div>
                                    </a>
                                </div>
                                <div class="container">
                                    <a class="sigma-title" href="{{ route('product_details1',$product->slug)}}">
                                        <?php if(strlen($product->name) > 120) {?>
                                        {{ substr($product->name,0,120)}}
                                        <?php } else {?>
                                        {{$product->name}}
                                        <?php } ?></p>
                                    </a>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                        </div>
                                        <div class="col-sm-6">
                                            <span style="float: right">{{  $product->sku}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="container list">
                                    <ul>
                                        @foreach (json_decode($product->attributes) as $key => $text)
                                        @if($key < '4' ) <li>{{$text->attribute_value}}</li>
                                            @endif
                                            @endforeach
                                            </ui>
                                </div>
                                <div class="container" style="text-align:start;margin-bottom:20px;">
                                    <a href="{{ route('product_details1',$product->slug)}}"
                                        style="text-decoration: none;">More details</a>
                                </div>
                                <div class="container" style="text-align:center;margin-bottom:20px;">
                                    <a href="#" class="starting">Starting at
                                        ৳{{number_format($product->unit_price) }}</a>
                                </div>
                                <div class="container" style="text-align:center;">

                                    <a href="{{ route('product_details1',$product->slug)}}"
                                        style="text-decoration: none">
                                        <button type="button" class="sigma-buy-button">Buy Now</button>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function () {

        $("#owl-demo").owlCarousel({

            navigation: true, // Show next and prev buttons
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true,
            items: 1,
            nav: true,
            //   "singleItem:true" is a shortcut for:
            //   items : 1, 
            //   itemsDesktop : false,
            //   itemsDesktopSmall : false,
            //   itemsTablet: false,
            //   itemsMobile : false

        });

        $("#owl-demo1").owlCarousel({

            navigation: true, // Show next and prev buttons
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true,
            items: 1,
            nav: true,
            //   "singleItem:true" is a shortcut for:
            //   items : 1, 
            //   itemsDesktop : false,
            //   itemsDesktopSmall : false,
            //   itemsTablet: false,
            //   itemsMobile : false

        });

    });

    const slideValue = document.querySelector("span");
    const inputSlider = document.querySelector("input");
    inputSlider.oninput = (() => {
        let value = inputSlider.value;
        slideValue.textContent = value;
        slideValue.style.left = (value / 2) + "%";
        slideValue.classList.add("show");
    });
    inputSlider.onblur = (() => {
        slideValue.classList.remove("show");
    });

</script>
<script>
    $(function () {


        $("#slider-range").slider({
            range: true,
            min: 0,
            max: '{{$max}}',
            values: [0, '{{$max}}'],
            slide: function (event, ui) {
                $('.ui-slider-handle').attr('tabindex', '');
                $("#amount_start").val(ui.values[0]);
                $("#amount_end").val(ui.values[1]);
                var start = $('#amount_start').val();
                var end = $('#amount_end').val();
                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '',
                    data: "start=" + start + "& end=" + end,
                    success: function (response) {
                        $('#updateDiv').html(response);

                    }
                });
            }
        });
        $("#slider-range1").slider({
            range: true,
            min: 0,
            max: '{{$max}}',
            values: [0, '{{$max}}'],
            slide: function (event, ui) {
                $('.ui-slider-handle').attr('tabindex', '');
                $("#amount_start1").val(ui.values[0]);
                $("#amount_end1").val(ui.values[1]);
                var start = $('#amount_start1').val();
                var end = $('#amount_end1').val();
                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '',
                    data: "start=" + start + "& end=" + end,
                    success: function (response) {
                        $('#updateDiv').html(response);

                    }
                });
            }
        });
        $('.screen').click(function () {
            var screen_size = [];
            var all = []
            $('.screen').each(function () {
                if ($(this).is(":checked")) {
                    screen_size.push($(this).val());
                } else {
                    all.push($(this).val());
                }
            });
            finalscreen_size = screen_size.toString();
            all_size = all.toString();
            console.log(all_size);
            if (finalscreen_size != 0) {
                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '',
                    data: "screen_size=" + finalscreen_size,
                    success: function (response) {
                        $('#updateDiv').html(response);

                    }
                });
            } else {
                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '',
                    data: "screen_size=" + all_size,
                    success: function (response) {
                        $('#updateDiv').html(response);

                    }
                });
            }

        });
        $('.sub_categorys').click(function () {
            var sub_categorys = [];
            var all = []
            $('.sub_categorys').each(function () {
                if ($(this).is(":checked")) {
                    sub_categorys.push($(this).val());

                } else {
                    all.push($(this).val());
                }
            });
            finalsub_categorys = sub_categorys.toString();

            all_sub_categorys = all.toString();

            if (finalsub_categorys != 0) {
                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '',
                    data: "sub_categorys=" + finalsub_categorys,
                    success: function (response) {
                        $('#updateDiv').html(response);

                    }
                });
            } else {
                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '',
                    data: "sub_categorys=" + all_sub_categorys,
                    success: function (response) {
                        $('#updateDiv').html(response);

                    }
                });
            }

        });
        $('.ram').click(function () {
            var ram = [];
            var all = []
            $('.ram').each(function () {
                if ($(this).is(":checked")) {
                    ram.push($(this).val());
                } else {
                    all.push($(this).val());
                }
            });
            finalram = ram.toString();

            all_ram = all.toString();

            if (finalram != 0) {
                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '',
                    data: "ram=" + finalram,
                    success: function (response) {
                        $('#updateDiv').html(response);

                    }
                });
            } else {
                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '',
                    data: "ram=" + all_ram,
                    success: function (response) {
                        $('#updateDiv').html(response);

                    }
                });
            }

        });
        $('.storage').click(function () {
            var storage = [];
            var all = []
            $('.storage').each(function () {
                if ($(this).is(":checked")) {
                    storage.push($(this).val());
                } else {
                    all.push($(this).val());
                }
            });
            finalstorage = storage.toString();

            all_storage = all.toString();

            if (finalstorage != 0) {
                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '',
                    data: "storage=" + finalstorage,
                    success: function (response) {
                        $('#updateDiv').html(response);

                    }
                });
            } else {
                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '',
                    data: "storage=" + all_storage,
                    success: function (response) {
                        $('#updateDiv').html(response);

                    }
                });
            }

        });
    });

</script>
@endsection
