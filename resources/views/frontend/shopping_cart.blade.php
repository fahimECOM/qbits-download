@extends('frontend.layouts.master')
@section('title','Sigma')
@section('content')
<style>
    .remmove span,
    .fa,
    .remove-font {

        color: #A1A1A6;
    }

    .remove span:hover,
    .fa:hover {
        color: #707070;
    }

    .remove-font {
        font-family: "Roboto";
        font-size: 16px;
        font-weight: 100;
    }

    .cart-continue-btn {
        background-color: #1486f9;
        border-radius: 30px;
        font-size: 18px;
        text-decoration: none;
        padding: 14px 30px;
        color: #fff;
        left: 38px;
        border: 1px solid;
        position: relative;
        cursor: pointer;
    }

    .cart-continue-btn:hover {
        color: #fff;
        background-color: #0071E3F7;
    }

    .qty_err {
        display: none;
    }

    .qty-input {
        border: none;
        outline: none;
        background-color: #fff !important;
        text-align: center;
    }

    .increase-btn,
    .decrease-btn {
        border-radius: 50%;
        width: 25px;
        height: 25px;

    }

    .increase-btn:hover,
    .decrease-btn:hover {
        background-color: #0071e3;
        color: #fff;
    }

    .increase-button {
        display: flex !important;
        align-items: flex-start;

    }


    .btn-center {
        text-align: center;
    }

    .empty-cart-img-area {
        margin: 0 auto !important;
        text-align: center;
    }

    .empty-cart-img-area img {
        margin-top: 45px !important;
        margin-bottom: 30px !important;
    }

    .empty-cart-title {
        color: #272727;
        font-size: 22px;
        font-weight: 500;
        line-height: 24px;
        font-family: 'Roboto', sans-serif;
        margin-bottom: 5px;
    }

    .empty-cart-text {
        color: #272727;
        font-size: 16px;
        font-weight: 400;
        line-height: 24px;
        font-family: 'Roboto', sans-serif;
        margin-bottom: 30px;
    }

    .empty-cart-btn-area {
        margin-bottom: 30px;
    }

    .empty-cart-btn {
        width: 175px !important;
        height: 55px !important;
        margin-bottom: 20px;
        padding: 14px 25px;
        border-radius: 25px !important;
        color: #fff;
        background-color: #2699fb;
        outline: none;
        border: none;
    }

    .empty-cart-btn:hover {
        background-color: #0071e3 !important;
        color: #ffffff !important;
    }

    .bag-title {
        color: #A1A1A6;
        font-size: 16px;
        font-weight: 400;
        line-height: 24px;
        font-family: 'Roboto', sans-serif;
        margin-top: -12px;
    }

    .bag-price {
        padding-top: 30px;
    }

    .tab-remove-div {
        margin-top: -20px;
    }


    @media (max-width: 480px) {
        .text-end {
            text-align: left !important;
        }

        .btn-center {
            text-align: left !important;
            ;
        }

        .cart-continue-btn {
            left: 10px;
        }

        .mobile-product-title {
            margin-bottom: 33px;
        }

        .bag-price {
            padding-top: 15px;
        }

        .accessories-title {
            padding-top: 0px !important;
        }

        .tab-remove-div {
            margin-top: -60px;
        }
    }

    @media (min-width: 481px) and (max-width: 820px) {
        .text-end {
            text-align: left !important;
        }

        .btn-center {
            text-align: left !important;
            ;
        }

        .cart-continue-btn {
            left: 10px;
        }

        .bag-title {
            line-height: 28px;
        }

        .bag-price {
            padding-top: 52px;
        }

        .ipad-padding {
            padding-top: 0px !important;
        }

        .accessories-title {
            padding-top: 40px !important;
        }

        .tab-remove-div {
            margin-top: -45px;
        }

        .ipad-bag-price-padding {
            padding-top: 25px;
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

<!-- <Section class="qbits-top-bottom">
    <div class="container">
        <div class="middle-qbits-menu">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-flex justify-content-center align-items-center">
                        <span class="me-2">We will offer 10% off. *</span><a href="javascript:void(0)"
                            style="text-decoration: none" onclick="offerCode()">Click for code ></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</Section> -->
@include('frontend.discount')
<Section class="qbits-top-last">
    <div class="container">
        <div class="middle-qbits-menu">
            <div class="row">
                <div class="col-sm-12">
                    <div class="container d-flex justify-content-start align-items-center your-cart">
                        <span style="margin-left: -25px;font-weight: bold; font-size: 22px; line-height: 29px;">Your
                            Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</Section>

<section class="shoppingcart-content-section">
    <div class="container">
        <div class="cart-details">
            <div class="row">
                <div class="col-sm-12">
                    <?php if(App\Models\Cart::totalItems() > 0){?>
                    <form class="form" action="{{route('carts.update_product')}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="shoppingcart-content py-3 pt-3">
                            <h5 class="container" style="margin-left: 14px">Your Product</h5>
                            @php
                            $total = 0;
                            @endphp
                            <hr style="color: #C8C8C8">


                            @foreach (App\Models\Cart::totalCarts() as $cart)
                            @php
                            $total += (($cart['unit_price'] * $cart['quantity']) + ($cart['keyboard_unit_price'] *
                            $cart['quantity']) + ($cart['ram_unit_price'] * $cart['ram_qty']) + ($cart['ssd_unit_price']
                            * $cart['ssd_qty']));
                            $bag_name = '';
                            $bag_color = '';
                            $bags =
                            App\Models\Product::where('sub_category','backpack')->where('id',$cart->bag_id)->where('status','1')->first();
                            if($bags) {
                            $bag_name = $bags->name;
                            $bag_color = json_decode($bags->attributes)[0]->attribute_value;
                            }

                            $keyboard_name = '';
                            $keyboards =
                            App\Models\Product::where('sub_category','keyboard-mouse')->where('id',$cart->keyboard_id)->where('status','1')->first();
                            if($keyboards) {
                            $keyboard_name = $keyboards->name;
                            }

                            //For accessories
                            $title_padding_top = '';
                            $remove_padding_top = '';
                            $price_padding_top = '';
                            $prod_details =
                            App\Models\Product::where('id',$cart->product_id)->where('status','1')->first();
                            if($prod_details) {
                            if($prod_details->category == 'Accessory'){
                            $title_padding_top = "style=padding-top:65px";
                            $remove_padding_top = "style=padding-top:58px";
                            $price_padding_top = "style=padding-top:0px";
                            }
                            }

                            $keboard_type = '';
                            if($cart->keboard_type){
                            $keboard_type = $cart->keboard_type;
                            }
                            @endphp
                            <div class="row container" id="cart_box{{$cart->id}}">
                                <div class="col-lg-8 col-md-8 ">
                                    <div class="">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="shopping-cart-image py-3 px-3 pt-2">
                                                    <img src="{{ asset($cart->product->galary_photo) }}"
                                                        class="img-fluid" style="width: 100%" alt="">
                                                </div>
                                            </div>
                                            <?php if($cart->product->category == 'Accessory'){?>
                                            <div class="col-lg-8 col-md-8 px-4 accessories-title"
                                                {{$title_padding_top}}>
                                                <?php } else {?>
                                                <div class="col-lg-8 col-md-8 px-4" {{$title_padding_top}}>
                                                    <?php } ?>
                                                    <div class="">
                                                        <p class="mobile-product-title">{{ $cart->product->name }}
                                                            <?php if($cart->ram_name){?>
                                                            <span>{{$cart->ram_name}} DDR4 RAM</span>
                                                            <?php } ?>

                                                            <?php if($cart->ssd_name){?>
                                                            <span>{{$cart->ssd_name}} M.2 NVMe SSD</span>
                                                            <?php } ?>
                                                        </p>
                                                        <?php if($cart->keyboard_id){?>
                                                        <p class="bag-title">{{ $keyboard_name }}</p>
                                                        <?php } ?>
                                                        <?php if($cart->bag_id){
                                                       if($keboard_type == 'wireless'){
                                                    ?>
                                                        <p class="bag-title ipad-padding">{{ $bag_name }} color :
                                                            {{ucfirst($bag_color)}}</p>
                                                        <?php } else {?>
                                                        <p class="bag-title">{{ $bag_name }} color :
                                                            {{ucfirst($bag_color)}}</p>
                                                        <?php } } ?>
                                                        <!-- <div class="input-group quantity" style="width: 30%;">
                                                        <div class="input-group-prepend decrement-btn"
                                                            style="cursor: pointer">
                                                            <span class="input-group-text"><input type="button"
                                                                    onclick="decreaseQty('{{$cart->id}}','{{$cart->product->unit_price}}','{{$cart->product_id}}','sub')"
                                                                    value="-"
                                                                    style="border: 0; outline: 0; background:none" /></span>
                                                        </div>
                                                        <input id="qty{{$cart->id}}" type="text"
                                                            class="qty-input form-control"
                                                            value="{{ $cart->quantity }}">
                                                        <input type="hidden" class="unit_price form-control" value="">

                                                        <div class="input-group-append increment-btn"
                                                            style="cursor: pointer">
                                                            <span class="input-group-text"><input type="button"
                                                                    onclick="increaseQty('{{$cart->id}}','{{$cart->product->unit_price}}','{{$cart->product_id}}', 'plus')"
                                                                    value="+"
                                                                    style="border: 0; outline: 0; background: none" /></span>
                                                        </div>
                                                    </div> -->

                                                        <div class="increase-button">
                                                            <button type="button" class="border-0 decrease-btn"
                                                                onclick="decreaseQty('{{$cart->id}}','{{$cart->unit_price}}','{{$cart->product_id}}','{{$cart->bag_id}}','{{$cart->keyboard_id}}','{{$cart->bag_unit_price}}','{{$cart->keyboard_unit_price}}','{{$cart->ram_id}}', '{{$cart->ram_unit_price}}', '{{$cart->ssd_id}}', '{{$cart->ssd_unit_price}}')">-</button>
                                                            <input id="qty{{$cart->id}}" type="text"
                                                                class="qty-input form-control"
                                                                value="{{ $cart->quantity }}" style="width: 50px"
                                                                readonly>
                                                            <button type="button" class="border-0 increase-btn"
                                                                onclick="increaseQty('{{$cart->id}}','{{$cart->unit_price}}','{{$cart->product_id}}','{{$cart->bag_id}}','{{$cart->keyboard_id}}','{{$cart->bag_unit_price}}','{{$cart->keyboard_unit_price}}','{{$cart->ram_id}}', '{{$cart->ram_unit_price}}', '{{$cart->ssd_id}}', '{{$cart->ssd_unit_price}}')">+</button>
                                                            <p class="mt-1 text-danger mx-2 pt-1 qty_err"
                                                                id="qty_err_{{$cart->id}}"><span><i
                                                                        class="fa fa-exclamation-triangle mx-2 text-danger"></i><span
                                                                        id="qty_err_msg_{{$cart->id}}"></span></span>
                                                            </p>
                                                        </div>

                                                        <!-- <input id="qty{{$cart->id}}" class="aa-cart-quantity" type="number"
                                                        value="{{$cart->quantity}}"
                                                        onchange="updateQty('{{$cart->id}}','{{$cart->product->unit_price}}','{{$cart->product_id}}')"
                                                        min="1" />

                                                    <div class="input-group quantity" style="width: 140px">
                                                        <div class="input-group-prepend decrement-btn"
                                                            style="cursor: pointer">
                                                            <span class="input-group-text">-</span>
                                                        </div>
                                                        <input type="text" class="qty-input form-control" maxlength="2"
                                                            max="10" value="1">
                                                        <div class="input-group-append increment-btn"
                                                            style="cursor: pointer">
                                                            <span class="input-group-text">+</span>
                                                        </div>
                                                    </div> -->

                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    @php
                                    if($cart->ram_id && $cart->ssd_id){
                                    $subt = ($cart->unit_price * $cart->quantity) + ($cart->ram_unit_price *
                                    $cart->ram_qty) + ($cart->ssd_unit_price * $cart->ssd_qty);
                                    } else {
                                    $subt = $cart->unit_price * $cart->quantity;
                                    }

                                    if($cart->bag_id){
                                    $bagt = $cart->bag_unit_price * $cart->quantity;
                                    }
                                    if($cart->keyboard_id){
                                    $keyboardt = $cart->keyboard_unit_price * $cart->quantity;
                                    }
                                    @endphp
                                    <div class="col-lg-4 col-md-4" {{$remove_padding_top}}>
                                        <input type="hidden" class="product_id" value="{{ $cart->product->id}}">
                                        <br>
                                        <?php if($cart->product->category == 'Accessory'){?>
                                        <div class="row tab-remove-div">
                                            <?php } else {?>
                                            <div class="row" style="margin-top: -20px;">
                                                <?php } ?>
                                                <div class="col-lg-6 col-md-6 ps-3 ">
                                                    <p class="text-end "><a href="javascript:void(0)"
                                                            class="btn btn-icon btn-sm btn-soft-primary btn-circle"
                                                            onclick="deleteCartData('{{$cart->id}}','{{$cart->unit_price}}','{{$cart->product_id}}','{{$cart->bag_id}}','{{$cart->keyboard_id}}','{{$cart->bag_unit_price}}','{{$cart->keyboard_unit_price}}', '{{$cart->ram_id}}', '{{$cart->ram_unit_price}}', '{{$cart->ssd_id}}', '{{$cart->ssd_unit_price}}')">
                                                            <i class="fa remove fa-trash fa-1x"><span
                                                                    class="ms-3 remove-font">Remove</span></i>
                                                        </a></p>

                                                </div>
                                                <div class="col-lg-6 col-md-6 mt-1 ps-4" {{$price_padding_top}}>
                                                    <p class="text-end fw-bold">৳<span
                                                            id="total_price_{{$cart->id}}">{{number_format($subt)}}</span>
                                                    </p>
                                                    <?php if($cart->keyboard_id && $cart->ram_id && $cart->ssd_id){?>
                                                    <p class="text-end fw-bold bag-price">৳<span
                                                            id="total_keyboard_price_{{$cart->id}}">{{number_format($keyboardt)}}</span>
                                                    </p>
                                                    <?php } ?>
                                                    <?php if($cart->keyboard_id && !$cart->ram_id && !$cart->ssd_id){?>
                                                    <p class="text-end fw-bold">৳<span
                                                            id="total_keyboard_price_{{$cart->id}}">{{number_format($keyboardt)}}</span>
                                                    </p>
                                                    <?php } ?>
                                                    <?php if($cart->bag_id && !$cart->keyboard_id){?>
                                                    <p class="text-end fw-bold bag-price">৳<span
                                                            id="total_bag_price_{{$cart->id}}">{{number_format($bagt)}}</span>
                                                    </p>
                                                    <?php } ?>
                                                    <?php if($cart->bag_id && $cart->keyboard_id){
                                                if($cart->keboard_type == 'wireless') {
                                            ?>
                                                    <p class="text-end fw-bold ipad-bag-price-padding">৳<span
                                                            id="total_bag_price_{{$cart->id}}">{{number_format($bagt)}}</span>
                                                    </p>
                                                    <?php } else {?>
                                                    <p class="text-end fw-bold">৳<span
                                                            id="total_bag_price_{{$cart->id}}">{{number_format($bagt)}}</span>
                                                    </p>
                                                    <?php } } ?>


                                                </div>
                                            </div>

                                        </div>
                                        <div class="row pe-1 m-0">
                                            <!-- <div class="col-md-1"></div> -->
                                            <div class="col-md-12">
                                                <hr style="color: #C8C8C8">
                                            </div>
                                            <!-- <div class="col-md-1"></div> -->
                                        </div>

                                    </div>

                                    @endforeach
                                    <div class="row container ms-1">
                                        <div class="col-lg-8 col-md-8"></div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="row mt-2">
                                                <div class="col-lg-6 col-md-6">
                                                    <p class="text-end"><strong>Gross Total:</strong></p>
                                                </div>
                                                <div class="col-lg-6 col-md-6 mt-1">
                                                    <p class="text-end fw-bold">৳<span
                                                            id="gross_total">{{number_format($total)}}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row ms-1">
                                        <div class="col-lg-8 col-md-8"></div>
                                        <div class="col-lg-4 col-md-4 btn-center ps-4 mt-3 mb-5">
                                            <!-- <span><a href="{{ route('checkout_processing')}}"
                                            class="cart-continue-btn">Continue</a></span> -->
                                            <span><a class="cart-continue-btn"
                                                    onclick="checkoutContinue()">Continue</a></span>
                                        </div>
                                    </div>

                                    <!-- <div class="row">
                                <div class="shopping-cart-details">
                                    <div class="col-sm-8">
                                        <div class="shoppingcart-des-content">
                                            <div class="shopping-cart-image">
                                                <img src="{{ asset($cart->product->galary_photo) }}" class="img-fluid"
                                                    alt="">
                                            </div>
                                            <div class="shopping-cart-des"
                                                style="width: 57% !important;text-align:justify;">
                                                <p>{{ $cart->product->name }}</p>
                                                <td class="cart-product-quantity" width="130px">
                                                    <div class="row">


                                                        <div class="col-sm-6">

                                                            <div class="input-group quantity" style="width: 66%;">
                                                                <div class="input-group-prepend decrement-btn changeQuantity"
                                                                    style="cursor: pointer">
                                                                    <span class="input-group-text">-</span>
                                                                </div>
                                                                <input type="text" class="qty-input form-control"
                                                                    maxlength="2" max="15" value="{{$cart->quantity}}">
                                                                <input type="hidden" class="unit_price form-control"
                                                                    value="{{ $cart->product->id}}">

                                                                <div class="input-group-append increment-btn changeQuantity "
                                                                    style="cursor: pointer">
                                                                    <span class="input-group-text">+</span>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-6" style="margin-left: -62px;opacity:50%;">
                                                            <a href="javascript:void(0)"
                                                                class="btn btn-icon btn-sm btn-soft-primary btn-circle delete_cart_data">
                                                                <i class="fa fa-trash fa-2x"
                                                                    style="font-size: 15px"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <i class="fa-solid fa-trash"></i>
                                                <p class="model">Model : {{ $cart->product->sku }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="order-summery">
                                            <p>Order Summery</p>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="order-summery-list">
                                                        <input type="hidden" class="product_id"
                                                            value="{{ $cart->product->id}}">
                                                        @php
                                                        $subt = $cart->product->unit_price * $cart->quantity;
                                                        @endphp
                                                        <ul>
                                                            <li>Unit Price: <span class="list-value unit_price">
                                                                    ৳{{ $cart->product->unit_price}}</span></li>
                                                            <li>Quantity: <span class="list-value qty-input"> X
                                                                    {{$cart->quantity}}
                                                                    PC/S</span></li>
                                                            <input type="hidden" class="hidden-qty-input"
                                                                name="hidden-qty-input" value="135">
                                                            <li>Subtotal: <span
                                                                    class="list-value subtotal">৳{{$subt}}</span>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div style="font-weight: 600;">
                                    <p style="margin-left: 800px">Gross Total:</p> <span
                                        style="float:right;margin-top:-40px" id="gross_total"
                                        class="list-value gross_total">৳{{$total}}</span>
                                </div>






                                <button style="display:flex;justify-content: center" type="submit"
                                    class="btn btn-success">{{ ('Process to Checkout ') }}</button>


                                <a href="{{ route('checkout')}}" class="btn process-check-btn"
                                    style="text-align:center;">Process to
                                    Checkout</a><br />
                                <a href="{{ route('buy') }}" class="btn continue-shopping-btn">Continue Shopping <i
                                        class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div> -->

                                </div>
                    </form>
                    <?php } else {?>
                    <div class="shoppingcart-content py-3 pt-3">
                        <h5 class="container" style="margin-left: 14px">Your Product</h5>
                        <hr style="color: #C8C8C8">
                        <div class="empty-cart-img-area">
                            <img src="{{ asset('frontend/assets/images/empty-cart.png') }}"
                                style="width: 100px; height: 80px;" alt="Empty Cart">
                        </div>
                        <p class="text-center empty-cart-title">Looks like it's empty!</p>
                        <p class="text-center empty-cart-text">Why not add something?</p>
                        <div style="text-align: center;" class="empty-cart-btn-area">
                            <a type="button" href="{{route('buy')}}" class="empty-cart-btn"
                                style="text-decoration: none;">Shop Now</a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {

        $('.increment-btn').click(function (e) {
            e.preventDefault();
            var incre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(incre_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value < 100000) {
                value++;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }

        });

        $('.decrement-btn').click(function (e) {
            e.preventDefault();
            var decre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(decre_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }
        });

    });




    // Update Cart Data
    $(document).ready(function () {

        $('.changeQuantity').click(function (e) {

            e.preventDefault();

            var thisClick = $(this);

            console.log(thisClick);

            var quantity = $(this).parents('.quantity').find('.qty-input').val();
            console.log(quantity);
            var product_id = $(this).parents('.quantity').find('.unit_price').val();
            var b = document.getElementById('gross_total').innerText
            console.log(b);

            var data = {
                '_token': $('input[name=_token]').val(),
                'quantity': quantity,
                'product_id': product_id,
            };

            $.ajax({
                url: '/carts/update',
                type: 'POST',
                data: data,
                success: function (response) {
                    console.log($(this));
                    // var abc = thisClick.parents('.shoppingcart-content-section').find('.subtotal').text(response.gtprice);
                    // var abc1 = thisClick.parents('.shoppingcart-content-section').find('.gross_total').text(response.stprice);
                    var abc2 = thisClick.parents('.shopping-cart-details').find('.subtotal')
                        .text(response.gtprice);
                    var abc2 = thisClick.parents('.shoppingcart-content').find(
                        '.gross_total').text(response.stprice);
                    var abc2 = thisClick.parents('.shopping-cart-details').find(
                        '.qty-input').text(response.quantity);

                    // console.log($(this).parents('.quantity').find('.qty-input'));

                    // console.log(abc2);
                    // window.location.reload();
                    // alertify.set('notifier','position','top-right');
                    // alertify.success(response.status);
                    // Toastr.success(response.status);
                }
            });
        });

    });


    $(document).ready(function () {

        $('.delete_cart_data').click(function (e) {
            // alert("Hello");
            e.preventDefault();

            var product_id = $(this).closest(".cart-details").find('.product_id').val();
            // console.log(product_id);

            var data = {
                '_token': $('input[name=_token]').val(),
                "product_id": product_id,
            };

            // $(this).closest(".cartpage").remove();

            $.ajax({
                url: '/carts/delete',
                type: 'DELETE',
                data: data,
                success: function (response) {
                    window.location.reload();
                }
            });
        });

    });

    // Najmul Ovi
    function decreaseQty(cart_id, u_price, pid, bagid = null, keyid = null, bag_u_price, key_u_price, ram_id = null,
        ram_unit_price, ssd_id = null, ssd_unit_price) {
        var qty = jQuery('#qty' + cart_id).val();
        if (qty > 1) {
            qty--;
            jQuery('#qty' + cart_id).val(qty);
            add_to_mycart(pid, -1, bagid, keyid, ram_id, ssd_id);
            var u_price = parseInt(u_price);
            var bag_u_price = parseInt(bag_u_price);
            var key_u_price = parseInt(key_u_price);
            var ram_u_price = parseInt(ram_unit_price);
            var ssd_u_price = parseInt(ssd_unit_price);

            var prod_keyboard_bag_combine_price = u_price + bag_u_price + key_u_price + ram_u_price + ssd_u_price;

            var total = u_price * qty + ram_u_price * qty + ssd_u_price * qty;
            var bag_total = bag_u_price * qty;
            var key_total = key_u_price * qty;

            total = total.toLocaleString('en-US');
            bag_total = bag_total.toLocaleString('en-US');
            key_total = key_total.toLocaleString('en-US');

            var g_total = jQuery('#gross_total').html();
            g_total = g_total.toString();
            g_total = g_total.replaceAll(',', '');
            var gross_total = parseInt(g_total) - prod_keyboard_bag_combine_price;
            gross_total = gross_total.toLocaleString('en-US');
            jQuery('#total_price_' + cart_id).html(total);
            jQuery('#total_bag_price_' + cart_id).html(bag_total);
            jQuery('#total_keyboard_price_' + cart_id).html(key_total);
            jQuery('#gross_total').html(gross_total);
        }
    }

    function increaseQty(cart_id, u_price, pid, bagid = null, keyid = null, bag_u_price, key_u_price, ram_id = null,
        ram_unit_price, ssd_id = null, ssd_unit_price) {
        var qty = jQuery('#qty' + cart_id).val();
        qty++;
        jQuery('#qty' + cart_id).val(qty);
        add_to_mycart(pid, 1, bagid, keyid, ram_id, ssd_id);
        var u_price = parseInt(u_price);
        var bag_u_price = parseInt(bag_u_price);
        var key_u_price = parseInt(key_u_price);
        var ram_u_price = parseInt(ram_unit_price);
        var ssd_u_price = parseInt(ssd_unit_price);

        var prod_keyboard_bag_combine_price = u_price + bag_u_price + key_u_price + ram_u_price + ssd_u_price;

        var total = u_price * qty + ram_u_price * qty + ssd_unit_price * qty;
        var bag_total = bag_u_price * qty;
        var key_total = key_u_price * qty;

        total = total.toLocaleString('en-US');
        bag_total = bag_total.toLocaleString('en-US');
        key_total = key_total.toLocaleString('en-US');

        var g_total = jQuery('#gross_total').html();
        g_total = g_total.toString();
        g_total = g_total.replaceAll(',', '');
        var gross_total = parseInt(g_total) + prod_keyboard_bag_combine_price
        gross_total = gross_total.toLocaleString('en-US');
        jQuery('#total_price_' + cart_id).html(total);
        jQuery('#total_bag_price_' + cart_id).html(bag_total);
        jQuery('#total_keyboard_price_' + cart_id).html(key_total);
        jQuery('#gross_total').html(gross_total);
    }

    function deleteCartData(cart_id, u_price, pid, bagid = null, keyid = null, bag_u_price, key_u_price, ram_id = null,
        ram_unit_price, ssd_id = null, ssd_unit_price) {
        var qty = jQuery('#qty' + cart_id).val();

        var u_price = parseInt(u_price);
        var bag_u_price = parseInt(bag_u_price);
        var key_u_price = parseInt(key_u_price);
        var ram_u_price = parseInt(ram_unit_price);
        var ssd_u_price = parseInt(ssd_unit_price);

        var total = u_price * qty + ram_u_price * qty + ssd_u_price * qty;
        var bag_total = bag_u_price * qty;
        var key_total = key_u_price * qty;
        // var ram_total = ram_u_price * qty;
        // var ssd_total = ssd_u_price * qty;

        var prod_keyboard_bag_combine_total_price = total + bag_total + key_total;

        var g_total = jQuery('#gross_total').html();
        g_total = g_total.toString();
        g_total = g_total.replaceAll(',', '');
        var gross_total = parseInt(g_total) - prod_keyboard_bag_combine_total_price;
        gross_total = gross_total.toLocaleString('en-US');
        jQuery('#qty').val(0)
        add_to_mycart(pid, 0, bagid, keyid, ram_id, ssd_id);
        jQuery('#cart_box' + cart_id).hide();
        jQuery('#gross_total').html(gross_total);
    }


    function add_to_mycart(id, qty, bagid = null, keyid = null, ram_id = null, ssd_id = null) {
        jQuery('#add_to_cart_msg').html('');
        jQuery('#product_id').val(id);
        jQuery('#bag_id').val(bagid);
        jQuery('#keyboard_id').val(keyid);
        jQuery('#ram_id').val(ram_id);
        jQuery('#ssd_id').val(ssd_id);
        jQuery('#pqty').val(qty);
        jQuery.ajax({
            url: '/add_to_cart',
            data: jQuery('#frmAddToCart').serialize(),
            type: 'post',
            success: function (result) {
                if (result.totalItem == 0) {
                    jQuery('#cart-val').html('0');
                    jQuery('#cart-menu').remove();
                    location.reload();
                } else {
                    jQuery('#cart-val').html(result.totalItem);
                }
                // location.reload();
            }
        });
    }

    function checkoutContinue() {
        $('.qty_err').css('display', 'none');
        jQuery.ajax({
            url: 'checkout_check_qty',
            type: 'get',
            success: function (result) {
                if (result.status == 'error') {
                    document.getElementById('qty_err_' + result.cartId).style.display = 'block';
                    $("#qty_err_msg_" + result.cartId).html(result.msg + result.availableQty + " Pcs.");
                } else {
                    // window.location.href = "{{route('checkout_processing','u0cEh1iPyFmUAGIuBclL')}}";
                    window.location.href = "{{route('checkout_processing')}}";
                }
            }
        });
    }

</script>

<input type="hidden" id="qty" value="1" />
<form id="frmAddToCart">
    <input type="hidden" id="pqty" name="pqty" />
    <input type="hidden" id="product_id" name="product_id" />
    <input type="hidden" id="bag_id" name="bag_id" />
    <input type="hidden" id="keyboard_id" name="keyboard_id" />
    <input type="hidden" id="keyboard_type" name="keyboard_type" />
    <input type="hidden" id="ram_id" name="ram_id" />
    <input type="hidden" id="ssd_id" name="ssd_id" />

    @csrf
</form>
@endsection
