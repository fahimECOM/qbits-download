@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp


<style>
    .shape-title {
        font-size: 1.2rem;
        font-weight: 500;
        margin-bottom: 30px;

    }

    .active-nav {
        color: white !important;
    }

    .view-cart {
        background-color: #1486f9;
        border-radius: 25px;
        font-size: 20px;
        padding: 11px 32px;
        color: #fff;
        border: 1px solid;
        text-decoration: none;
    }

    .view-cart:hover {
        color: #fff;
        background-color: #0071E3F7;
    }

    #cart-menu {
        margin-top: -5px !important;
        margin-left: 5px;
        display: flex;
        justify-content: center;
        background-color: #1486f9;
    }

    #mob-cart-menu {
        margin-top: -5px !important;
        margin-left: 5px;
        display: flex;
        justify-content: center;
        background-color: #1486f9;
    }

    .fa-shopping-cart {
        color: #a1a1a6;
    }

    .fa-shopping-cart:hover {
        color: #ffffff !important;
    }

    .modal {
        background: none;
        backdrop-filter: none;
    }

    .modal-header-10percent {
        color: #CCCCCC;
        font-size: 57px;
        font-family: "Roboto", sans-serif;
        font-weight: bold;
        text-align: center;
        margin-bottom: 35px;
        padding-top: 90px;
        line-height: 20px;
    }

    .free-coupon-btn {
        background: #2699FB;
        color: #fff;
        width: 210px;
        height: 55px;
        font-weight: 300;
        margin-top: 40px;
        border-radius: 30px;
    }

    .free-coupon-btn:hover {
        background: #168af0;
        color: #fff;
    }

    #free_coupon_err_msg_area {
        display: none;
    }

    #free_coupon_success_msg_area {
        display: none;
    }

    .mob-cart-box {
        display: none;
    }

    .coupon-modal-area {
        max-width: 1280px !important;
        margin: 0 auto;
        margin-top: 185px;
    }

    .coupon-modal-content {
        max-height: 720px;
        background-color: #000;
        border-radius: 20px;
        padding-bottom: 95px;
    }

    .close-coupon-modal {
        outline: none;
        border: none;
        background: #000;
        margin-left: 1170px;
        margin-top: 20px !important;
    }

    .coupon-offer-text {
        color: #cccccc;
        font-size: 22px;
        margin-bottom: 30px
    }

    .coupon-modal-inputField {
        max-width: 510px;
        height: 55px;
        border-radius: 10px;
        margin: 0 auto;
    }

    .free_coupon_err_msg_area {
        margin-top: 10px;
        color: #f25b5b !important;
    }

    .free_coupon_success_msg_area {
        margin-top: 10px;
        color: green;
    }

    /* Mobile responsive css */
    @media (max-width: 480px) {
        .coupon-modal-area {
            max-width: 310px !important;
            margin-top: 150px;
        }

        .coupon-modal-content {
            max-height: auto;
            border-radius: 20px;
            margin-top: 50px;
            padding-bottom: 10px;
        }

        .coupon-modal-inputField {
            max-width: 270px;
            height: 55px;
            border-radius: 10px;
            margin: 0 auto;
        }

        .close-coupon-modal {
            outline: none;
            border: none;
            background: #000;
            margin-left: 250px;
            margin-top: -5px !important;
            font-size: 28px !important;
        }

        .modal-header-10percent {
            font-size: 35px;
            text-align: center;
            margin-bottom: 35px;
            padding-top: 20px;
            line-height: 18px;
        }

        .coupon-offer-text {
            color: #cccccc;
            font-size: 16px;
            margin-bottom: 30px;
        }

        .free_coupon_err_msg_area {
            font-size: 15px;
        }

        .free_coupon_success_msg_area {
            font-size: 15px;
        }
    }

    /* Tab responsive css */
    @media (min-width: 481px) and (max-width: 820px) {
        .coupon-modal-area {
            max-width: 680px !important;
            margin-top: 150px;
        }

        .coupon-modal-content {
            padding-bottom: 60px;
        }

        .close-coupon-modal {
            margin-left: 580px;
            font-size: 35px;
            margin-top: 10px !important;
        }

        .modal-header-10percent {
            padding-top: 50px;
        }
    }

    @media (min-width: 821px) and (max-width: 1280px) {
        .coupon-modal-area {
            max-width: 960px !important;
        }

        .close-coupon-modal {
            margin-left: 850px;
            font-size: 35px;
        }

        .modal-header-10percent {
            padding-top: 40px;
        }

        .coupon-modal-content {
            padding-bottom: 45px;
        }
    }

    /* @media (min-width: 576px) {
        .modal-dialog {
            max-width: 50vw;
            margin: 1.75rem auto;
        }
    } */

</style>
<section class="qbits-top-menu">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg">
                <div class="col-sm-2">
                    <div class="qbits-logo">
                        <a href="{{ route('index') }}"><img src="{{
                                    asset('frontend/assets/logo/qbits_logo.svg')
                                }}" alt="qbits Logo" class="img-responsive qbits_logo" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item top-menu-list d-flex justify-content-center">
                                <a class="nav-link {{($route=='sigma')? 'active-nav': '' }}"
                                    href="{{ route('sigma') }}">Laptop</a>
                            </li>
                            <li class="nav-item top-menu-list d-flex justify-content-center">

                                <a class="nav-link {{($route=='minipc')? 'active-nav': '' }}"
                                    href="{{ route('minipc') }}">Mini PC</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="top-menu-right">
                        <i class="fa fa-search search-btn" style="margin-right: 20px" aria-hidden="true"></i>

                        <!-- <i class="fa fa-shopping-cart position-relative" style="color: #a1a1a6;">
                                    <span style="margin-right: 10px;display:none;" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ App\Models\Cart::totalItems()}}
                                    </span>
                                </i> -->


                        <a style="text-decoration: none" href="{{ route('carts') }}">

                            <i class="fa fa-shopping-cart position-relative shopping-cart-icon">
                                <!-- @if( App\Models\Cart::totalItems() > 0) -->

                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill"
                                    id="cart-menu">
                                    <span style="margin-bottom: 1px" id="cart-val">
                                        {{ App\Models\Cart::totalItems()}}</span>
                                </span>
                                <!-- @endif -->
                            </i>


                        </a>
                        <!-- @auth
                        <?php if(Auth::check()){ if(Auth::user()->user_type == 'customer'){?>
                        <a href="{{ route('dashboard') }}"><i class="fa fa-user" aria-hidden="true"></i></a>
                        <?php } else {?>
                        <a href="{{ route('admin.dashboard') }}"><i class="fa fa-user" aria-hidden="true"></i></a>
                        <?php } } else {?>
                        <a href="{{ route('signin') }}"><i class="fa fa-user" aria-hidden="true"></i></a>
                        <?php } ?>
                        @endauth -->

                        <?php if(session()->has('USER_LOGIN')){?>
                        <a href="{{ route('dashboard') }}"><i class="fa fa-user" aria-hidden="true"></i></a>
                        <?php } else if(session()->has('ADMIN_LOGIN')){?>
                        <a href="{{ route('admin.dashboard') }}"><i class="fa fa-user" aria-hidden="true"></i></a>
                        <?php }else {?>
                        <form action="{{route('signin')}}" method="post">
                            @csrf
                            <input type="hidden" value="dashboard" name="redirect_dashboard">
                            <button type="submit" style="background: none;outline: none;border:none"><i
                                    class="fa fa-user" aria-hidden="true"></i></button>
                        </form>
                        {{-- <a href="{{ route('signin') }}"><i class="fa fa-user" aria-hidden="true"></i></a> --}}
                        <?php } ?>

                        <!-- @auth @if(Auth::user()->user_type == 'customer')
                        <a href="{{ route('dashboard') }}"><i class="fa fa-user" aria-hidden="true"></i></a>

                        @else

                        <a href="{{ route('admin.dashboard') }}"><i class="fa fa-user" aria-hidden="true"></i></a>

                        @endif @else
                        <a href="{{ route('signin') }}"><i class="fa fa-user" aria-hidden="true"></i></a>
                        @endauth -->

                    </div>
                    <div class="cart-box" id="cart-box">
                        <div class="aa-cartbox-main">
                            <div class="aa-cartbox-summary">
                                <span><button type="button" class="close-popover"
                                        style="outline: none;border: none; background: #fff;" onclick="closeBox()">
                                        <span>&times;</span>
                                    </button></span>
                                <div class="shape"></div>
                                <p class="text-center shape-title">This item has <br> been added to your
                                    cart</p>
                                <span class="text-center {{($route=='carts')? 'active-nav': '' }}"><a
                                        href="{{ route('carts')}}" class="view-cart">View
                                        Cart</a></span>
                                <p class="text-center mt-4"><a href="{{ route('buy')}}" class="view-other-items">View
                                        Other items</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div id="searchbar" class="clearfix">
        <form id="searchform" action="{{ route('search') }}" method="get">
            @csrf
            <input type="text" class="form-control" name="search" id="search"
                placeholder="Search here for what you need?" autocomplete="off" />
        </form>
    </div>
</section>

<section class="qbits-mobile-menu">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="mobile-responsive-menu">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                        <div class="qbits-logo">
                            <a href="{{ route('index') }}"><img src="{{
                                asset('frontend/assets/logo/qbits_logo.svg')
                            }}" alt="qbits Logo" class="img-responsive qbits_logo" /></a>
                        </div>
                        <div class="top-menu-right d-flex justify-content-center align-items-center">

                            <a style="text-decoration: none;" href="{{ route('carts') }}" aria-hidden="true">
                                <i class="fa fa-shopping-cart position-relative mob-shopping-cart-icon">
                                    <!-- @if( App\Models\Cart::totalItems() > 0) -->

                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill"
                                        id="mob-cart-menu">
                                        <span style="margin-bottom: 1px" id="mob-cart-val">
                                            {{ App\Models\Cart::totalItems()}}</span>
                                    </span>
                                    <!-- @endif -->
                                </i>

                            </a>

                            <!-- <i class="fa fa-user" aria-hidden="true"></i> -->
                            <?php if(session()->has('USER_LOGIN')){?>
                            <a href="{{ route('dashboard') }}"><i class="fa fa-user" aria-hidden="true"></i></a>
                            <?php } else if(session()->has('ADMIN_LOGIN')){?>
                            <a href="{{ route('admin.dashboard') }}"><i class="fa fa-user" aria-hidden="true"></i></a>
                            <?php }else {?>
                            <form action="{{route('signin')}}" method="post">
                                @csrf
                                <input type="hidden" value="dashboard" name="redirect_dashboard">
                                <button type="submit" style="background: none;outline: none;border:none"><i
                                        class="fa fa-user" aria-hidden="true"></i></button>
                            </form>
                            {{-- <a href="{{ route('signin') }}"><i class="fa fa-user" aria-hidden="true"></i></a> --}}
                            <?php } ?>
                        </div>

                        <div class="mob-cart-box" id="mob-cart-box">
                            <div class="aa-cartbox-main" style="right: 120px">
                                <div class="aa-cartbox-summary" style="width: 240px; height: 220px;">
                                    <span><button type="button" class="close-popover"
                                            style="outline: none;border: none; background: #fff;margin-left: 310px;font-size: 20px;margin-top: 5px;"
                                            onclick="closeBox()">
                                            <span>&times;</span>
                                        </button></span>
                                    <div class="shape" style="left: 185px;"></div>
                                    <p class="text-center shape-title">This item has <br> been added to your
                                        cart</p>
                                    <span class="text-center"><a href="{{ route('carts')}}" class="view-cart">View
                                            Cart</a></span>
                                    <p class="text-center mt-4"><a href="{{ route('buy')}}"
                                            class="view-other-items">View
                                            Other items</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-middle-menu">
                        <div class="form-group has-search">
                            <span class="fa fa-search form-control-feedback"></span>
                            {{-- <input type="text" class="form-control" placeholder="Search" /> --}}
                            <form id="searchform" action="{{ route('search') }}" method="get">
                                @csrf
                                <input type="text" class="form-control" name="search" id="search"
                                    placeholder="Search here for what you need?" autocomplete="off" />
                            </form>
                        </div>
                        <ul class="top-mobile">
                            <li><a href="{{ route('sigma') }}">Sigma</a></li>
                            <li><a href="{{ route('minipc') }}">Mini PC</a></li>
                        </ul>

                        <ul class="mobile-seconed-mobile">
                            <li><a href="{{ route('driver')}}">Drivers & Manuals</a></li>
                            <li><a href="{{ route('product_registration')}}">Registration</a></li>
                            <li><a href="{{route('warranty')}}">Warrenty</a></li>
                            <li>
                                <?php
                                    if(session()->has('USER_LOGIN')) {
                                ?>
                                <a href="{{route('wishlists')}}">Wishlist</a>
                                <?php } else {?>
                                <a href="javascript:void(0)" onclick="wishlistCartModal()">Wishlist</a>
                                <?php } ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal for get offer code-->
<div class="modal fade" id="offerCodeModalShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog coupon-modal-area" role="document">
        <div class="modal-content coupon-modal-content">
            <div class="modal-body pt-md-0 pb-5 px-4 px-md-5 text-center" id="verification_success_field">
                <span><button type="button" class="close-popover close-coupon-modal" data-dismiss="modal"
                        onclick="closeCouponModal()">
                        <span>&times;</span>
                    </button></span>
                <p class="modal-header-10percent" id="modal-header">5% Off Coupon</p>
                <p class="text-center coupon-offer-text">Get 5% off your next
                    purchase<br>Buy in-store or online and claim your 5% off coupon</p>
                <form id="codeSubmit">
                    @csrf
                    <div class="form-group text-center">
                        <input type="email" class="form-control coupon-modal-inputField" name="user_coupon_email"
                            placeholder="Enter your email here" id="user_coupon_email" />
                        <div class="text-danger free_coupon_err_msg_area" id="free_coupon_err_msg_area"><i
                                class="fa fa-exclamation-triangle me-2"></i><span id="free_coupon_err_msg"></span></div>
                        <div class="free_coupon_success_msg_area" id="free_coupon_success_msg_area"><i
                                class="fa fa-solid fa-circle-check me-2"></i><span id="free_coupon_success_msg">We
                                already send a coupon code to your email.</span></div>
                        <button type="button" class="btn free-coupon-btn" onclick="getFreeCoupon()"
                            id="get-free-coupon-btn">Get my free coupon</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal for error show for already registered user-->
<!-- <div class="modal fade" id="reg_exist_email_error_modal" style="backdrop-filter: none" tabindex="-1" role="dialog"
    aria-labelledby="verification_code_modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="min-width: 482px;" role="document">
        <div class="modal-content" style="background-color: #272727; border-radius: 20px;min-height: 13.6vw;">
            <div class="modal-body pt-md-0 pb-5 px-4 px-md-5 text-center">
                <div class="success_circle">
                    <img style="padding-top: 0.4vw;padding-left: 0.1vw;" src="{{ asset('error_icon.png') }}"
                        alt="error" />
                </div>
                <p class="email-subscribe-success-modal-heading" style="margin-bottom: 0.1vw;" id="subscribe-error">This
                    email already have an account. Try other email or login</p>
                <button type="button" class="modal-continue-btn" style="margin-bottom: -0.6vw;"
                    onclick="closeExistEmailErrorModal()">Back</button>
            </div>
        </div>
    </div>
</div> -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>
    $(document).ready(function () {
        $(".fa-bars").click(function () {
            $(".mobile-middle-menu").toggle();
        });
    });

    function closeCouponModal() {
        $('#offerCodeModalShow').modal('hide');
    }

    function closeBox() {
        document.getElementById("cart-box").style.display = "none";
        document.getElementById("mob-cart-box").style.display = "none";
        document.getElementById("productpage-area-section").style.opacity = "1";
        $("#add_to_cart_proceed_btn").attr('disabled', false);
        $("#add_to_cart_btn").attr('disabled', false);
    }

    function getFreeCoupon() {
        document.getElementById('free_coupon_err_msg_area').style.display = "none";
        document.getElementById('free_coupon_success_msg_area').style.display = "none";
        $('#free_coupon_err_msg').html('');
        $('#free_coupon_success_msg').html('');
        var user_email = $('#user_coupon_email').val();
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (user_email == "") {
            document.getElementById('free_coupon_err_msg_area').style.display = "block";
            $('#free_coupon_err_msg').html('Please enter an email to send coupon.');
            return false;
        } else {
            if (!regex.test(user_email)) {
                document.getElementById('free_coupon_err_msg_area').style.display = "block";
                $('#free_coupon_err_msg').html('Please enter an valid email to send coupon.');
                return false;
            } else {
                var spinner =
                    '<div class="spinner-border me-2" role="status"><span class="visually-hidden">Loading...</span></div> Please wait...';
                $('#get-free-coupon-btn').html(spinner);
                jQuery.ajax({
                    url: '/send_free_coupon',
                    data: 'user_email=' + user_email + '&_token=' + jQuery("[name='_token']").val(),
                    type: 'post',
                    success: function (result) {
                        $('#get-free-coupon-btn').html('Get my free coupon');
                        $("#user_coupon_email").val("");
                        if (result.status == 'available') {
                            document.getElementById('free_coupon_success_msg_area').style.display = "block";
                            $('#free_coupon_success_msg').html(result.msg);
                        } else if (result.status = 'not_available') {
                            document.getElementById('free_coupon_err_msg_area').style.display = "block";
                            $('#free_coupon_err_msg').html(result.msg);
                        }
                    }
                });

            }
        }
    }

</script>
