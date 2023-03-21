@extends('frontend.layouts.master')
@section('title','Sigma')
@section('content')
<style>
    .checkout-title-h1 {
        padding-left: 12px;
    }

    .order-details1 {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        width: 458px;
    }

    .order-details1 p {
        padding-bottom: 0px;
        margin-bottom: 0px;
    }

    .order-details1 h1 {

        font-size: 16px;
        /* padding-bottom: 8px; */
        line-height: 21px;
        font-weight: 300;
    }

    .checkout-title-h1 {
        width: 100%;
    }

    .hr {
        width: 224px;
        position: relative;
        right: 232px;


    }

    /* Drawer Start */
    menu menu span {
        display: block;
    }

    .text-logo-checkout {
        display: flex;
        /* width: fit-content; */
        flex-direction: column;
        align-content: flex-start;
        /* justify-content: space-between;*/
    }

    .text-logo-checkout img {
        margin-top: 0.6vw;
        width: 5vh;
        height: 5vh;
        padding: 0.5vh 0.5vh;
    }

    .text-logo-checkout h1 {
        font-size: 22px;
        transform: rotate(270deg);
        width: 159px;
        font-weight: 300;
        height: 10px;
        margin-top: 106px;
        margin-left: -56px;
        line-height: 20px;
        font-family: Roboto;
    }

    .menuTitel-checkout {
        display: flex;
        height: 8vh;
        top: -31px;
        border: #252525 1px solid;
        position: relative;
        width: 14.6vw;
        justify-content: center;
        align-items: center;
        background-color: #2d2d2d;
        border-radius: 12px 12px 0px 0px;
    }

    .menuitem-checkout {
        display: flex;
        width: 100%;
        padding: 0px 20px;
        margin-bottom: 20px;
        height: 100%;
        background-color: #f6f6f6;
        flex-direction: row;
        align-items: center;
        border-radius: 10px;
        color: black;
    }

    .menuitem-checkout i {
        font-size: 1.7vh;
    }

    .menu-checkout {
        max-height: 55vh;
        overflow: hidden;
    }

    .left-menu-checkout-item {
        padding-left: 20px;
        font-weight: bold;
        color: rgb(255, 255, 255);
        font-family: Geometria;
        font-size: 1.7vh;
    }

    .menuTitel-checkout img {
        padding: 5px;
        width: 40px;
        height: 40px;
    }

    h1.heading-checkout {
        text-align: center;
    }

    input[type="checkbox"],
    input[type="reset"] {
        display: none !important;
    }

    .nav span {
        cursor: default;
    }

    .nav,
    .nav .nav {
        /* height: 658.6px; */
        padding-top: 30px;
        position: absolute;
        top: 168px;
        transition: transform 0.8s ease-in-out;
        width: 333px;
        z-index: 9;
        border-radius: 12px;
    }

    .nav.left-navigation-checkout,
    .nav.left-navigation-checkout nav {
        /* background: #252525; */
        background-color: #f6f6f6;
        color: white;
        left: 0;
        transform: translateX(-333px);
        box-shadow: 2px -1px 6px 0px #e2e2e2;

    }

    .nav label {
        cursor: pointer;
        font-weight: normal;
        margin: 0;
    }

    .nav label:focus {
        outline: none;
    }

    .nav label.menu-toggle-checkout {
        display: block;
        height: 5.9vh;
        line-height: 0;
        padding: 0;
        /* top: 33vh; */
        position: absolute;
        /* text-indent: -99vh; */
        width: 67px;
        border-radius: 0 0 0 15px;
    }

    .nav label.menu-text-checkout {
        display: block;
        height: 200px;
        line-height: 0;
        padding: 0;
        top: 1px;
        position: absolute;
        width: 67px;
        border-radius: 0px 15px 15px 0px;
    }

    .nav.left-navigation-checkout label.menu-toggle-checkout {
        background: #25252500;
        left: -65px;
    }

    .nav.left-navigation-checkout label.menu-text-checkout {
        height: 246px;
        background: #f6f6f6;
        left: -60px;
        color: black;
        /* box-shadow: 3px 0px 6px 0px #e2e2e2; */
        box-shadow: 3px 0px 6px 0px #e4e2e291;
    }

    nav.left-navigation-checkout label.menu-text-checkout>h1 {
        height: 20px;
        color: #f7f7f7;
    }

    .nav label.menu-toggle-checkout>span:after,
    .nav label.menu-toggle-checkout>span:before {
        /* background: #e2e2e2;
        display: block;
        height: 64px;
        pointer-events: none;
        transition: transform 0.4s ease-in-out, background-color 0.4s ease-in-out 0s;
        width: 2.722px;
        border-radius: 11.148px; */
        background: #000000;
        display: block;
        height: 9px;
        top: 99px;
        left: 351px;
        pointer-events: none;
        transition: transform 0.4s ease-in-out, background-color 0.4s ease-in-out 0s;
        width: 0.9px;
        border-radius: 11.148px;
    }

    .nav label.menu-toggle-checkout>span {
        display: block;
        margin-left: 1vh;
        margin-top: 50%;
        position: relative;
    }

    .nav label.menu-toggle-checkout>span:after,
    .nav label.menu-toggle-checkout>span:before {
        content: "";
        position: absolute;
        transform: rotate(0) translateY(0);
    }

    .nav label.menu-toggle-checkout>span:after {
        /* transform: rotate(135deg) translateY(-5.574px) translateX(1.858px); */
        transform: rotate(135deg) translateY(-9.573999999999998px) translateX(2px);
    }

    .nav label.menu-toggle-checkout>span:before {
        /* transform: rotate(-135deg) translateY(5.574px) translateX(1.858px); */
        transform: rotate(234deg) translateY(-3.6000000000000014px) translateX(-14.14px);
    }

    .nav label.menu-toggle-checkout {
        margin-top: -4px;
    }

    .nav menu {
        margin: 0;
        padding-bottom: 2vh;
    }

    .nav nav label.menu-toggle-checkout,
    .nav nav label.menu-toggle-checkout>span,
    .nav nav label.menu-toggle-checkout>span:after,
    .nav nav label.menu-toggle-checkout>span:before {
        background: none !important;
    }

    input[type="checkbox"]:checked~.nav {
        transform: translateX(0);
    }

    input[type="checkbox"]:checked~.nav label.menu-toggle-checkout>span:after,
    input[type="checkbox"]:checked~.nav label.menu-toggle-checkout>span:before {
        width: 2px;
        margin-left: 5px;
    }

    input[type="checkbox"]:checked~.nav.left-navigation-checkout label.menu-toggle-checkout>span:after {
        /* transform: rotate(-45deg) translateY(-4px) translateX(4px); */
        transform: rotate(-45deg) translateY(10px) translateX(-12px);
    }

    input[type="checkbox"]:checked~.nav.left-navigation-checkout label.menu-toggle-checkout>span:before {
        /* transform: rotate(45deg) translateY(4px) translateX(4px); */
        transform: rotate(45deg) translateY(7px) translateX(6px);
    }

    main {
        margin: 0 1.4vw;
    }

    .introduction {
        background: #f7f7f7;
        border-radius: 0.5em;
        box-shadow: 0 0.5em 0.5em 0 rgba(153, 153, 153, 1);
        padding: 2em;
    }

    /* Drawer End */

    .checkout-title {
        width: 100%;
        display: flex;
    }



    .order-details-p {
        display: flex;
    }

    .gross-total h1 {
        font-size: 1.2rem;
    }

    .order-group {
        /* width: 100%;
        position: relative;
        display: flex;
        flex-wrap: wrap;
        align-items: stretch;
        padding: 0px 0px 10px; */
        position: relative;
        display: grid;
        width: 273px;
        grid-template-columns: repeat(2, 1fr);
        padding: 0px 0px 10px;
        margin: 5px 0px;
    }

    .order-group:not(.has-validation)>:not(:last-child):not(.dropdown-toggle):not(.dropdown-menu) {
        width: 100%;
        height: 51px;
        border-radius: 30px;
        padding-left: 17px;
        /* width: 40%;
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px; */
        /* background-color: #0071E3; */
    }

    .order-group .form-control:focus {
        border-color: rgba(100, 100, 100, 1) !important;
        -webkit-box-shadow: none !important;
        -moz-box-shadow: none !important;
        box-shadow: none !important;
    }

    .order-group .btn:focus {
        border-color: rgba(100, 100, 100, 0) !important;
        -webkit-box-shadow: none !important;
        -moz-box-shadow: none !important;
        box-shadow: none !important;
    }

    .order-group-btn {
        /* padding: 0px 10px;
        border-radius: 30px; */
        /* border-top-right-radius: 30px; */
        /* border-bottom-right-radius: 30px; */
        /* background-color: rgb(227, 227, 227);
        margin-left: 0px; */
        /* padding: 0px 20px;
        border-top-right-radius: 30px;
        border-bottom-right-radius: 30px;
        background-color: rgb(227, 227, 227);
        margin-left: -30px !important; */
        padding: 7px 24px;
        border-radius: 113px;
        background-color: rgb(227, 227, 227);
        margin-left: 20px;
        width: 121px;
        height: 51px;
    }

    .continue-button {
        width: 175px;
        height: 55px;
        margin-top: 40px;
        margin-bottom: 33px;
        margin-left: 20px;
        padding: 14px 11px;
        border-radius: 35px;
        color: #fff;
        background-color: #1486f8;
        outline: none;
        border: none;
    }

    .continue-button:hover {
        color: #fff;
        background-color: #0071E3;

    }

    #err_email_field {
        display: none;
    }

    #err_pass_field {
        display: none;
    }

    #err_rpass_field {
        display: none;
    }

    .product-area {
        width: 531px;
    }

    @media (max-width: 480px) {


        .checkout-title-h1 {
            padding-left: 12px;
        }

        .order-group-btn {

            padding: 7px 18px;
            border-radius: 113px;
            background-color: rgb(227, 227, 227);
            margin-left: -35px;
            width: 105px;
            height: 51px;
        }

        .order-details1 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            width: 300px;
        }

        /* .nav,
        .nav .nav {
            height: 807.6px;
            padding-top: 30px;
            position: absolute;
            top: 182px;
            transition: transform 0.8s ease-in-out;
            width: 279px;
            z-index: 1;
            border-radius: 12px;
        } */
        .nav,
        .nav .nav {
            /* height: 617px;
            padding-top: 30px;
            position: absolute;
            top: 128px;
            transition: transform 0.8s ease-in-out;
            width: 279px;
            z-index: 1;
            border-radius: 12px; */
            height: 807px;
            padding-top: 30px;
            position: absolute;
            top: 183px;
            transition: transform 0.8s ease-in-out;
            width: 279px;
            z-index: 1;
            border-radius: 12px;
        }

        /* .nav.left-navigation-checkout,
        .nav.left-navigation-checkout nav {
            transform: translateX(-279px);

        } */
        .nav.left-navigation-checkout,
        .nav.left-navigation-checkout nav {
            transform: translateX(-279px);

        }

        .nav label.menu-text-checkout {
            /* width: 66px; */
            width: 50px;
        }

        .nav.left-navigation-checkout label.menu-text-checkout {
            /* height: 202px;
            left: -58px;
            box-shadow: -5px 1px 6px 0px #e2e2e2; */
            height: 196px;
            left: 273px;
            box-shadow: 3px 1px 6px 0px #e2e2e2;
        }

        .text-logo-checkout h1 {
            /* height: 157px;
            width: 197px; */
            height: 0px;
            font-size: 20px;
            width: 161px;
            position: relative;
            /* top: 79px;
            right: 65px; */
            top: -35px;
            right: 7px;
        }

        .product-area {
            width: 229px;
        }

        .order-group:not(.has-validation)>:not(:last-child):not(.dropdown-toggle):not(.dropdown-menu) {
            width: 121px;
            margin-right: 44px;
        }

        .test {
            width: auto !important;
            padding-right: calc(var(--bs-gutter-x) * .5) !important;
            padding-left: 0px !important;
        }

        .hr {
            width: 227px;
            position: relative;
            right: 0px;
        }

    }

    @media (min-width: 481px) and (max-width: 820px) {
        .checkout-title-h1 {
            padding-left: 12px;
        }

        .nav,
        .nav .nav {
            /* height: 658.6px;
            padding-top: 30px;
            position: absolute;
            top: 168px;
            transition: transform 0.8s ease-in-out;
            width: 333px;
            z-index: 9;
            border-radius: 12px; */
            height: 655px;
            padding-top: 30px;
            position: absolute;
            top: 170px;
            transition: transform 0.8s ease-in-out;
            width: 333px;
            z-index: 2;
            border-radius: 12px;
        }

        .test {
            width: auto !important;
            /* padding-right: calc(var(--bs-gutter-x) * .5) !important;
            padding-left: 0px !important; */
        }

        .product-area {
            width: 268px
        }

        .nav label.menu-toggle-checkout>span:after,
        .nav label.menu-toggle-checkout>span:before {
            top: 145px;
            left: 411px;
        }

        .nav.left-navigation-checkout label.menu-text-checkout {
            left: 332px;
        }

        .hr {
            width: 468px;
            position: relative;
            /* right: 232px; */
        }
    }



    @media (min-width: 822px) and (max-width: 991px) {
        .checkout-title-h1 {
            padding-left: 12px;
        }

        .nav,
        .nav .nav {
            /* height: 658.6px;
            padding-top: 30px;
            position: absolute;
            top: 168px;
            transition: transform 0.8s ease-in-out;
            width: 333px;
            z-index: 9;
            border-radius: 12px; */
            height: 655px;
            padding-top: 30px;
            position: absolute;
            top: 170px;
            transition: transform 0.8s ease-in-out;
            width: 333px;
            z-index: 2;
            border-radius: 12px;
        }

        .test {
            width: auto !important;
            /* padding-right: calc(var(--bs-gutter-x) * .5) !important;
            padding-left: 0px !important; */
        }

        .product-area {
            width: 268px
        }

        .nav label.menu-toggle-checkout>span:after,
        .nav label.menu-toggle-checkout>span:before {
            top: 145px;
            left: 411px;
        }

        .nav.left-navigation-checkout label.menu-text-checkout {
            left: 332px;
        }

        .hr {
            width: 468px;
            position: relative;
            /* right: 232px; */
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

<!-- <Section class="qbits-top-last">
    <div class="container">
        <div class="middle-qbits-menu">
            <div class="row">
                <div class="col-sm-4">
                    <div class="container d-flex justify-content-start align-items-center"
                        style="width: 980px; margin: 0 auto;">
                        <span style="margin-left: -25px;font-weight: bold;">Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</Section> -->
<Section class="qbits-top-last-signin">
    <div class="checkout-title">
        <div class="checkout-title-h1">
            <span>Checkout</span>
        </div>
    </div>
</Section>
<!-- Drawer Start -->
<div class="checkout-drawer">
    <input id="left-menu-checkout" value="1" type="checkbox" />
    <input id="left-menu-checkout-reset" type="reset" />
    <div class="left-navigation-checkout nav">
        <!-- <div class="menuTitel-checkout">

        <h1 class="heading-checkout">Ecomclips</h1>
    </div> -->
        <main>
            <label class="menu-text-checkout" for="left-menu-checkout">
                <div class="text-logo-checkout">

                    <h1 id="left-menu-checkout-text menu-toggle-checkout" class="h1">Order Summary</h1>
                    <!-- <span>&nbsp;</span> -->
                </div>
            </label>

            <label class="menu-toggle-checkout" for="left-menu-checkout">
                <span></span>
            </label>
            <menu class="menu-checkout">
                <div class="menuitem-checkout">
                    <!-- <h1 class="left-menu-checkout-item"></h1> -->
                    @php
                    $total = 0;
                    $total_quantity = 0;
                    @endphp
                    @foreach (App\Models\Cart::totalCarts() as $cart)

                    @php
                    $total += $cart['total_price'];
                    $total_quantity += $cart['quantity']
                    @endphp
                    @endforeach
                    <div class="product-info-checkout1">
                        <div class="product-area">
                            <div class="product-info-checkout-title">
                                <h1>Order Summary</h1>
                            </div>
                            <div class="product-info-checkout-details">
                                <div class="order-details1">
                                    <h1 class=" product-info-checkout-details1">
                                        Subtotal item ( {{$total_quantity}} items )</h1>
                                    <h1 class="product-info-checkout-details">
                                        ৳{{number_format($total)}}</h1>
                                    <!-- <h1 class=" product-info-checkout-details1">
                                        Wireless keybord & mouse</h1>
                                    <h1 class="product-info-checkout-details">
                                        ৳{{number_format($total)}}</h1> -->

                                    <!-- Wireless keybord & mouse <span class="product-info-checkout-details">
                                        ৳{{number_format($total)}}</span> -->

                                </div>
                                <div class="order-group">
                                    <input type="text" class="form-control me-5" placeholder="Coupon Code"
                                        style="outline: none;border: none;" readonly>
                                    <span class="order-group-btn">
                                        <button class="btn" type="button" disabled="true">Apply</button>
                                    </span>
                                </div>
                                <div class="order-details1 ">
                                    <div class="">
                                        <p>Coupon Saving: </p>
                                    </div>
                                    <div class=" ">
                                        <p>৳0 </p>
                                    </div>
                                    <div class="">
                                        <p>Estimated Shipping: </p>
                                    </div>
                                    <div class=" ">
                                        <p>Free </p>

                                    </div>
                                </div>
                                <hr style="width: 55%;">

                                <!-- <div class="col-md-5">
                                    <p>Estimated Taxes: </p>
                                 </div>
                                 <div class="col-md-4 ">
                                    <p>200 </p>
                                 </div> -->
                                <div class="order-details1 ">
                                    <div class="">
                                        <h1 style="font-weight: 500;">Gross Total</h1>
                                    </div>
                                    <div class="">
                                        <p style="font-weight: 500;">৳{{number_format($total)}}</p>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>

                </div>
            </menu>
        </main>
    </div>
</div>
<section class="signin-area-checkout">
    <div class="checkout-page">
        <div class=" sign-up-checkout">
            <div class="row float-end">
                <div class="col-sm-12">
                    <div class="signin-form-checkout" style="background-color: #fff;">
                        <p class="container mt-3 ms-2"
                            style="padding-top: 25px !important; font-weight: 600; font-size: 20px;">Sign In / Sign Up

                        </p>
                        <hr style="color: #C8C8C8">
                        <div class="row container ms-0">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="form-check">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1" onclick="guest()" checked="checked" />

                                        Guest User
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="form-check">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault2" onclick="login()">

                                        Sign in
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="form-check">
                                    <label class="form-check-label" for="flexRadioDefault3">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault3" onclick="signup()">

                                        Sign up
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div id="toggle-guest-form">
                            <p class="container pt-5 ms-3" style="font-size: 14px;">No Account?
                                No problem. <br> Create an
                                account later to keep track of your Order </p>
                            <form id="guestFrm" method="POST">
                                @csrf
                                <div class="row  d-flex ">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Name <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-7  ">
                                        <input class="form-control ms-5 border-0" type="text" name="g_name" id="g_name"
                                            placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="row d-flex ">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Phone Number<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-7  ">
                                        <input class="form-control  ms-5 border-0" type="text" name="g_phone"
                                            id="g_phone" placeholder="Phone" required>
                                    </div>
                                </div>
                                <div class="row  d-flex ">
                                    <label for="email" class="col-sm-4 col-form-label">Email Address <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-7 ">
                                        <input class="form-control ms-5 border-0" name="g_email" id="g_email"
                                            type="email" placeholder="Email Address" required>
                                    </div>
                                </div>
                                <div class="col text-end">
                                    <button type="submit" class="btn continue-button" id="guestBtn">Continue</button>
                                </div>
                            </form>
                        </div>

                        <div id="toggle-login-form">
                            <form id="login-submit" method="POST">
                                @csrf
                                <div class="row  d-flex ">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Email <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-7 ">
                                        <input class="form-control  ms-5 border-0" name="email" id="log_email"
                                            type="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-sm-8 text-danger" id="err_email_field"
                                    style="margin-left: 245px;margin-top: -1.2vw;margin-bottom: 0.3vw;">
                                    <i class="fa fa-exclamation-triangle me-2"></i><span id="err_email_msg"></span>
                                </div>
                                <div class="row  d-flex ">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Password <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-7 ">
                                        <input class="form-control  ms-5 border-0" name="password" id="log_pass"
                                            type="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="col-sm-8 text-danger" id="err_pass_field"
                                    style="margin-left: 245px;margin-top: -1.2vw;margin-bottom: 0.3vw;">
                                    <i class="fa fa-exclamation-triangle me-2"></i><span id="err_pass_msg"></span>
                                </div>
                                <div class="col text-end">
                                    <button type="submit" class="btn continue-button"
                                        id="checkoutSigninBtn">Continue</button>
                                </div>
                            </form>
                        </div>

                        <div id="toggle-signup-form">
                            <form id="signup-submit" method="post">
                                @csrf
                                <div class="row  d-flex ">
                                    <label for="name" class="col-sm-4 col-form-label">Name <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-7 ">
                                        <input class="form-control ms-5 border-0" name="name" id="c_name" type="text"
                                            placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="row  d-flex ">
                                    <label for="phone" class="col-sm-4 col-form-label">Phone Number <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-7 ">
                                        <input class="form-control ms-5 border-0" name="phone" id="c_phone" type="text"
                                            placeholder="Phone Number" required>
                                    </div>
                                </div>
                                <div class="row  d-flex ">
                                    <label for="email" class="col-sm-4 col-form-label">Email Address <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-7 ">
                                        <input class="form-control ms-5 border-0" name="email" id="c_email" type="email"
                                            placeholder="Email Address" required>
                                    </div>
                                </div>
                                <!-- <div class="row " id="err_reg_email" style="margin: -30px 0 10px 225px;"></div> -->
                                <div class="row  d-flex ">
                                    <label for="password" class="col-sm-4 col-form-label">Password <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-7 ">
                                        <input class="form-control ms-5 border-0" name="password" id="c_password"
                                            type="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="col-sm-8 text-danger" id="err_pass_field"
                                    style="margin-left: 216px;margin-top: -1.2vw;margin-bottom: 0.3vw;">
                                    <i class="fa fa-exclamation-triangle me-2"></i><span id="err_pass_msg"></span>
                                </div>
                                <div class="row  d-flex   mb-5">
                                    <label for="rePassword" class="col-sm-4 col-form-label">Confirm Password <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-7 ">
                                        <input class="form-control ms-5 border-0" name="repassword" id="c_repassword"
                                            type="password" placeholder="Confirm Password" required>

                                    </div>
                                </div>
                                <div class="col-sm-8 text-danger" id="err_rpass_field"
                                    style="margin-left: 216px;margin-top: -4.8vw;margin-bottom: 2.3vw;">
                                    <i class="fa fa-exclamation-triangle me-2"></i><span id="err_rpass_msg"></span>
                                </div>

                                <!-- <input type="checkbox"><span style="padding-left: 20px; font-size:18px;">Remember me</span> -->
                                <div class="col text-end mb-2">
                                    <button type="submit" class="btn btn-primary continue-button"
                                        style="margin-top: -20px;" id="checkoutSignupBtn">Continue</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- <div class="signin-social-button">
                <div class="row">
                    <div class="col-6">
                        <div class="signin-google-button">
                            <img src="{{ asset('frontend/sigma/icons/google.png') }}" alt=""><span>Continue with
                                google</span>
                        </div>
                    </div>
    
                    <div class="col-6">
                        <div class="signin-facebook-button">
                            <img src="{{ asset('frontend/sigma/icons/facebook.png') }}" alt=""><span>Continue with
                                facebook</span>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <!-- $total += ($cart['unit_price'] * $cart['quantity']); -->
        @php
        $total = 0;
        $total_quantity = 0;
        @endphp
        @foreach (App\Models\Cart::totalCarts() as $cart)

        @php
        $total += $cart['total_price'];
        $total_quantity += $cart['quantity']
        @endphp
        @endforeach
        <div class="product-info-checkout">
            <div class="product-area">
                <div class="product-info-checkout-title">
                    <h1>Order Summary</h1>
                </div>
                <div class="product-info-checkout-details">
                    <div class="order-details1">
                        <h1 class=" product-info-checkout-details1">
                            Subtotal item ( {{$total_quantity}} items )</h1>
                        <h1 class="product-info-checkout-details">
                            ৳{{number_format($total)}}</h1>
                        <!-- <h1 class=" product-info-checkout-details1">
                            Wireless keybord & mouse</h1>
                        <h1 class="product-info-checkout-details">
                            ৳{{number_format($total)}}</h1> -->

                        <!-- Wireless keybord & mouse <span class="product-info-checkout-details">
                            ৳{{number_format($total)}}</span> -->

                    </div>
                    <div class="order-group">
                        <input type="text" class="form-control me-5" placeholder="Coupon Code"
                            style="outline: none;border: none;" readonly>
                        <span class="order-group-btn">
                            <button class="btn" type="button" disabled="true">Apply</button>
                        </span>
                    </div>
                    <div class="order-details1 ">
                        <div class="">
                            <p>Coupon Saving: </p>
                        </div>
                        <div class=" ">
                            <p>৳0 </p>
                        </div>
                        <div class="">
                            <p>Estimated Shipping: </p>
                        </div>
                        <div class=" ">
                            <p>Free </p>

                        </div>
                    </div>
                    <hr style="width: 55%;">

                    <!-- <div class="col-md-5">
                        <p>Estimated Taxes: </p>
                     </div>
                     <div class="col-md-4 ">
                        <p>200 </p>
                     </div> -->
                    <div class="order-details1 ">
                        <div class="">
                            <h1 style="font-weight: 500;">Gross Total</h1>
                        </div>
                        <div class="">
                            <p style="font-weight: 500;">৳{{number_format($total)}}</p>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>

</section>


<!-- <section class="shoppingcart-category-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="shoppingcart-category">
                    <ul>
                        <li>Sigma > </li>
                        <li>Buy > </li>
                        <li>Product > </li>
                        <li>ShoppingCart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="checkout-content-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="shoppingcart-content">
                    <div class="row">
                        <div class="shopping-cart-details">
                            <div class="col-sm-4">
                                <div class="checkout-page-left">
                                    <div>
                                        <h3>Already a Member ?</h3>
                                        <a href="{{ route('checkout-login')}}">Log in</a><br>
                                        {{-- <a href="{{ route('checkout-process')}}">Checkout Process</a> --}}
                                        {{-- <input type="radio" id="login" name="drone" value="Log in">
                                          <label for="login" style="font-weight: 600;">Log in</label> --}}
                                    </div>

                                    <div>
                                        <h3>I don't have an Account.</h3>
                                        <a href="{{ route('checkout_registration')}}">Sign up</a>
                                        {{-- <input type="radio" id="login" name="drone" value="sign up">
                                          <label for="Signup" style="font-weight: 600;">Sign up</label> --}}
                                    </div>

                                    <div class="signin-social-button">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="signin-google-button">
                                                    <img src="{{ asset('frontend/sigma/icons/google.png') }}"
                                                        alt=""><span>Continue with google</span>
                                                </div>

                                                <div class="signin-facebook-button">
                                                    <img src="{{ asset('frontend/sigma/icons/facebook.png') }}"
                                                        alt=""><span>Continue with facebook</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-8">
                                <h3>Shopping Cart :</h3>
                                @php
                                $total = 0;
                                @endphp
                                @foreach (App\Models\Cart::totalCarts() as $cart)

                                @php

                                $total += ($cart['unit_price'] * $cart['quantity']);
                                @endphp
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="shoppingcart-des-content">
                                            <div class="shopping-cart-image">
                                                <p>Image</p>
                                                {{-- <img src="{{ asset('frontend/sigma/High quality/desdis.png') }}"
                                                class="img-fluid" alt=""> --}}
                                                <img src="{{ asset($cart->product->galary_photo) }}" class="img-fluid"
                                                    alt="">
                                            </div>
                                            <div class="shopping-cart-des">
                                                <p>Description</p>
                                                <p>{{ $cart->product->variations}}</p>
                                                {{-- <p>Qbits Sigma 15 - 10th Generation Intel® Core™ Processor, 15.6 Inches FHD Non Touch IPS Display 1920 x 1080, 512GB NVMe SSD, 8GB DDR4 RAM, Intel® Iris® Plus Graphics/Intel® UHD Graphics</p> --}}
                                                <a href="#" class="qty-button">- 2 +</a>
                                                <i class="fa-solid fa-trash"></i>
                                                <p class="model">Model : S15-613G</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="order-summery">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="order-summery-list">
                                                        <ul>
                                                            <li>Quantity: <span class="list-value"> Unit Price</span>
                                                            </li>

                                                            <li><a href="#"
                                                                    class="qty-button">{{ $cart->quantity}}</a><span
                                                                    class="list-value">৳{{ $cart->unit_price}}</span>
                                                            </li>
                                                            <li>Subtotal: <span
                                                                    class="list-value">৳{{ $cart->quantity * $cart->unit_price}}</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach

                                <div class="row">
                                    <div class="col-sm-8">

                                    </div>
                                    <div class="col-sm-4">
                                        <div class="order-summery">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="order-summery-list"
                                                        style="margin-top: 80px !important;">
                                                        <ul>
                                                            <li>
                                                                <form class="subscribe_form">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control"
                                                                            name="email"
                                                                            placeholder="Enter coupon code">
                                                                        <span class="input-group-btn">
                                                                            <button class="btn btn-default"
                                                                                type="button">Apply</button>
                                                                        </span>
                                                                    </div>
                                                                </form>
                                                            </li>
                                                            <li>My Saving with <br>Coupon Code : <span
                                                                    class="list-value">৳ </span></li>
                                                            <li style="font-weight: 600;">Gross Total: <span
                                                                    class="list-value">৳{{$total}}</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section> -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color: #272727; border-radius: 20px;">
            <div class="modal-body pt-md-0 pb-5 px-4 px-md-5 text-center" id="verification_code_field">
                <p style="color: #DBDBDD; margin-top: 25px;" id="modal-header">You are almost Done !</p>
                <p style="color: #DBDBDD; font-size: 12px;" class="mt-2 mb-0">We have send you a verification code
                    to</p>
                <p style="color: #DBDBDD; font-size: 12px;text-decoration: underline;cursor: pointer;" id="modal_email">
                </p>
                <h6 style="color: #DBDBDD;" class="mb-3">Enter the code here</h6>
                <form id="codeSubmit">
                    @csrf
                    <div class="form-group text-centers">
                        <input type="text" class="form-control ms-5" style="width: 75%; border-radius: 8px;"
                            name="verification_code" id="verification_code" />
                        <div id="code_err_msg"></div>
                        <button type="button" class="btn btn-primary continue-button"
                            style="margin-top: 40px; margin-bottom: 5px; width: 40%;"
                            onclick="codeSubmit()">Continue</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function guest() {
        document.getElementById("toggle-guest-form").style.display = "block";
        document.getElementById("toggle-login-form").style.display = "none";
        document.getElementById("toggle-signup-form").style.display = "none";
    }

    function login() {
        document.getElementById("toggle-login-form").style.display = "block";
        document.getElementById("toggle-guest-form").style.display = "none";
        document.getElementById("toggle-signup-form").style.display = "none";
    }

    function signup() {
        document.getElementById("toggle-signup-form").style.display = "block";
        document.getElementById("toggle-guest-form").style.display = "none";
        document.getElementById("toggle-login-form").style.display = "none";
    }

    $("#guestFrm").on('submit', function (e) {
        e.preventDefault();
        var data = jQuery('#guestFrm').serialize();
        var spinner =
            '<div class="spinner-border me-2" role="status"><span class="visually-hidden">Loading...</span></div> Wait...';
        $('#guestBtn').html(spinner);
        jQuery.ajax({
            url: '/guest_submit',
            data: data,
            type: 'post',
            success: function (result) {
                $('#guestBtn').html('Continue');
                if (result.status == 'success') {
                    window.location.href = "{{route('checkout_processing')}}";
                } else if (result.status == 'error') {
                    $('#reg_exist_email_error_modal').modal('show');
                }
            }
        });
    });

    $("#signup-submit").on('submit', function (e) {
        e.preventDefault();
        var isSendCode = jQuery("#send_code").val();
        var email = jQuery("#c_email").val();
        if (isSendCode) {
            $('#exampleModalCenter').modal('show');
            $('#modal_email').html(email);
        } else {
            // document.getElementById("not_match_field_area").style.display = "none";
            document.getElementById("err_pass_field").style.display = "none";
            document.getElementById("err_rpass_field").style.display = "none";
            // document.getElementById("err_reg_email").style.display = "none";
            var pass = jQuery("#c_password").val();
            var rpass = jQuery('#c_repassword').val();
            if (pass.length < 6) {
                // document.getElementById("not_match_field_area").style.display = "none";
                document.getElementById("err_pass_field").style.display = "block";
                jQuery("#err_pass_msg").html("Password must greater or equal 6");
                if (rpass.length < 6) {
                    document.getElementById("err_rpass_field").style.display = "block";
                    jQuery("#err_rpass_msg").html("Password must greater or equal 6");
                    return;
                }
                return;
            }
            if (rpass.length < 6) {
                // document.getElementById("not_match_field_area").style.display = "none";
                document.getElementById("err_pass_field").style.display = "none";
                document.getElementById("err_rpass_field").style.display = "block";
                jQuery("#err_rpass_msg").html("Password must greater or equal 6");
                return;
            }

            if (pass != rpass) {

                // document.getElementById("not_match_field_area").style.display = "block";
                document.getElementById("err_pass_field").style.display = "none";
                document.getElementById("err_rpass_field").style.display = "block";
                jQuery("#err_rpass_msg").html("Password not matched.");
                return;
            } else {
                // document.getElementById("not_match_field_area").style.display = "none";
                document.getElementById("err_pass_field").style.display = "none";
                document.getElementById("err_rpass_field").style.display = "none";
                jQuery("#err_pass_msg").html("");
                jQuery("#err_rpass_msg").html("");
                var data = jQuery('#signup-submit').serialize();
                var spinner =
                    '<div class="spinner-border me-2" role="status"><span class="visually-hidden">Loading...</span></div> Wait...';
                $('#checkoutSignupBtn').html(spinner);
                jQuery.ajax({
                    url: '/signup_submit',
                    data: data,
                    type: 'post',
                    success: function (result) {
                        $('#checkoutSignupBtn').html('Continue');
                        if (result.status == 'success') {
                            jQuery("#send_code").val(1);
                            $('#exampleModalCenter').modal('show');
                            $('#modal_email').html(result.u_email);
                        } else if (result.status == 'error') {
                            $('#reg_exist_email_error_modal').modal('show');
                            // document.getElementById("err_reg_email").style.display = "block";
                            // jQuery("#err_reg_email").html(result.msg);
                        }
                    }
                });
            }
        }

    })


    function codeSubmit() {
        var data = jQuery('#codeSubmit').serialize();
        var verify_code = jQuery('#verification_code').val();
        jQuery('#code_err_msg').html("");
        jQuery.ajax({
            url: '/code_submit',
            data: 'verify_code=' + verify_code + '&_token=' + jQuery("[name='_token']").val(),
            type: 'post',
            success: function (result) {

                if (result.status == 'success') {
                    if (result.user_type == 'admin') {
                        jQuery("#send_code").val("");
                        window.location.href = "{{route('admin.dashboard')}}";
                    } else if (result.user_type == 'customer') {
                        jQuery("#send_code").val("");
                        window.location.href = "{{route('checkout_processing')}}";
                        // window.location.href = window.location.href;
                    }
                } else if (result.status == 'error') {
                    jQuery('#code_err_msg').html(result.msg);
                    jQuery("#verification_code").val("");
                }
            }
        });
    }


    $("#login-submit").on('submit', function (e) {
        e.preventDefault();
        var isSendCode = jQuery("#send_code").val();
        var u_email = jQuery("#log_email").val();
        if (isSendCode) {
            $('#exampleModalCenter').modal('show');
            $('#modal_email').html(u_email);
        } else {
            document.getElementById("err_pass_field").style.display = "none";
            document.getElementById("err_email_field").style.display = "none";
            var pass = jQuery("#log_pass").val();
            if (pass.length < 6) {
                document.getElementById("err_pass_field").style.display = "block";
                jQuery("#err_pass_msg").html("Password must greater or equal 6");
                return;
            }
            var data = jQuery('#login-submit').serialize();
            var spinner =
                '<div class="spinner-border me-2" role="status"><span class="visually-hidden">Loading...</span></div> Wait...';
            $('#checkoutSigninBtn').html(spinner);
            jQuery.ajax({
                url: '/login_submit',
                data: data,
                type: 'post',
                success: function (result) {
                    $('#checkoutSigninBtn').html('Continue');
                    if (result.status == 'success') {
                        if (result.user_type == 'admin') {
                            window.location.href = "{{route('admin.dashboard')}}";
                        } else if (result.user_type == "customer") {
                            window.location.href = "{{route('checkout_processing')}}";
                        }
                    } else if (result.status == 'error') {
                        if (result.type == 'verify_err') {
                            jQuery("#send_code").val(1);
                            document.getElementById("err_pass_field").style.display = "none";
                            document.getElementById("err_email_field").style.display = "none";
                            $('#exampleModalCenter').modal('show');
                            $('#modal-header').html(
                                'Your Email is not verified. Please verify first');
                            $('#modal_email').html(result.u_email);
                        } else if (result.type == "email_err") {
                            document.getElementById("err_pass_field").style.display = "none";
                            document.getElementById("err_email_field").style.display = "block";
                            jQuery("#err_email_msg").html(result.msg);
                        } else if (result.type == "pass_err") {
                            document.getElementById("err_email_field").style.display = "none";
                            document.getElementById("err_pass_field").style.display = "block";
                            jQuery("#err_pass_msg").html(result.msg);
                        } else if (result.type == "account_diactivate") {
                            document.getElementById("err_email_field").style.display = "none";
                            document.getElementById("err_pass_field").style.display = "block";
                            jQuery("#err_pass_msg").html(result.msg);
                        } else if (result.type == "account_remove") {
                            document.getElementById("err_email_field").style.display = "none";
                            document.getElementById("err_pass_field").style.display = "block";
                            jQuery("#err_pass_msg").html(result.msg);
                        }
                    }
                }
            });
        }

    })


    // $(document).ready(function() {
    //   $('#signup-submit').on('submit', function(e){
    //       $('#exampleModalCenter').modal('show');
    //       e.preventDefault();
    //   });
    // });

    // jQuery('#signup-submit').submit(function(e){
    // //   jQuery('#order_place_msg').html("Please wait...");
    //   var c_email = jQuery('#c_email').val();
    //   e.preventDefault();
    // //   $('#exampleModalCenter').modal('show');
    // //   $('#modal_email').html(c_email); 

    // //   jQuery.ajax({
    // //     url:'/signup_submit',
    // //     data:jQuery('#signup-submit').serialize(),
    // //     type:'post',
    // //     success:function(result){
    // //       if(result.status=='success'){
    // //         $('#exampleModalCenter').modal('show');
    // //         $('#modal_email').html(c_email);    
    // //         e.preventDefault();
    // //         //   if(result.payment_url!=''){
    // //         //     window.location.href=result.payment_url;
    // //         //   }else{
    // //         //     window.location.href="/order_placed";
    // //         //   }

    // //       } else{
    // //           alert(result.msg);
    // //       }
    // //     //   jQuery('#order_place_msg').html(result.msg);
    // //     }
    // //   });
    // });

    $('[data-toggle="popover"]').popover({
        html: true,
        sanitize: false,
    })

</script>

<input type="hidden" id="send_code" value="">
<form id="signupForm">
    <input type="hidden" id="name" name="name" />
    <input type="hidden" id="phone" name="phone" />
    <input type="hidden" id="email" name="email" />
    @csrf
</form>



@endsection