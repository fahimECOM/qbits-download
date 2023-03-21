@extends('frontend.layouts.master')
@section('title','Sigma')
@section('content')
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


<div class="product-registration-section">
    <div class="container">
        <div class="row">
            <div class="product-registration">
                <p>Thank you for purchasing the Qbits product! Register your product to elevate your experience with us.
                    Stay informed of the latest innovations, and special offers. Get faster updates, warranty service,
                    technical support, service repair history, product usage tips and so much more.</p>
                <p>Register your Qbits product to get online services, It will take only a few moments.</p>

                <div class="signin-form">
                    <p style="padding-top:20px;font-weight:bold;">Register Your Qbits Product</p>
                    <form action="{{route('product.register.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Model Name:</label>
                            <div class="col-sm-10">
                                <input type="text" name="code" class="form-control" id="inputEmail3">
                            </div>
                        </div>

                        <div class="col-md-auto text-center">
                            <button type="submit" class="btn btn-primary signin-button"
                                style="background-color: transparent;color:black;border:1px solid">Cancel</button>
                            <button type="submit" class="btn btn-primary signin-button">Sign
                                up</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>

@endsection
