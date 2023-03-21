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

{{-- <section class="shoppingcart-category-section">
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
</section> --}}

<section class="checkout-content-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="shoppingcart-content">
                    <div class="row">
                        <div class="shopping-cart-details">
                            <div class="col-sm-4">
                                <h3>Personal Details</h3>
                                <div class="checkout-page-left">
                                    <div class="checkout-info">
                                        <!-- <p>$useremail[0]</p> -->
                                        <p>Name: {{ auth()->user()->name}}</p>
                                          <p>E-mail: {{ auth()->user()->email}}</p>
                                          <p>Address: {{ auth()->user()->address}}</p>
                                          <p>Mobile: {{ auth()->user()->phone}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <h3>Shipping Cart :</h3>
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
                                                <!-- <a href="#" class="qty-button">- 2 +</a>
                                                 <i class="fa-solid fa-trash"></i>
                                                 <p class="model">Model : S15-613G</p> -->
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
                                                            {{-- <li><a href="#" class="qty-button">- 2 +</a><span class="list-value"> ৳72,000</span></li> --}}
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
                                                            <!-- <li>
                                                                <form class="subscribe_form">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" name="email" placeholder="Enter coupon code">
                                                                        <span class="input-group-btn">
                                                                        <button class="btn btn-default" type="button">Apply</button>
                                                                        </span>
                                                                    </div>
                                                                </form>
                                                            </li>
                                                            <li>My Saving with <br>Coupon Code :  <span class="list-value">৳0</span></li> -->
                                                            <li style="font-weight: 600;">Gross Total: <span
                                                                    class="list-value">৳ {{$total}} </span></li>
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

        <div class="row">
            <div class="col-sm-4">

            </div>

            <div class="col-sm-8">

                <form class="form" action="{{route('checkout_done')}}" method="POST" enctype="multipart/form-data"
                    id="choice_form">
                    @csrf
                    @foreach (App\Models\Cart::totalCarts() as $cart)
                    <input type="hidden" class="product_id" name="product_id[]" value="{{ $cart->product->id }}">
                    <input type="hidden" class="quantity" name="quantity[]" value="{{ $cart->quantity }}">
                    <input type="hidden" class="unit_price" name="unit_price[]" value="{{ $cart->unit_price }}">
                    @endforeach
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-sm-6">
                            <p>Shipping Method :</p>
                            <input type="radio" id="shipping_method" name="shipping_method" value="E_Desh">
                            <label for="shipping_method" style="margin-right:30px;">E-Desh</label>
                            <input type="radio" id="shipping_method" name="shipping_method" value="Pathao"
                                checked="checked">
                            <label for="Signup" style="margin-right:30px;">Pathao</label>
                            <input type="radio" id="shipping_method" name="shipping_method" value="Shop_Up">
                            <label for="shipping_method" style="margin-right:30px;">Shop up</label>
                        </div>
                        <div class="col-sm-6"></div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-sm-6">
                            <p>Shipping Address :</p>
                            <div class="login-form">
                                <textarea class="form-control" id="" rows="3" style=" resize: none;"
                                    name="shipping_address"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <p>Region / State : </p>
                            <div class="dropdown">
                                <div class="form-group row" id="category">
                                    <div class="col-md-8">
                                        <select class="form-control aiz-selectpicker" name="division" id="division"
                                            data-live-search="true" required>
                                            <option value="dhaka">Dhaka</option>
                                            <option value="rajshahi">Rajshahi</option>
                                            <option value="khulna">Khulna</option>
                                            <option value="barishal">Barishal</option>
                                            <option value="chattogram">Chattogram</option>
                                            <option value="rangpur">Rangpur</option>
                                            <option value="mymensingh ">Mymensing</option>
                                            <option value="sylhet">Sylhet</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#">Dhaka</a></li>
                              <li><a class="dropdown-item" href="#">Rajshahi</a></li>
                              <li><a class="dropdown-item" href="#">Khulna</a></li>
                            </ul> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-sm-8">
                            <p>Payment Method :</p>
                            <input type="radio" id="payment_method" name="payment_method" value="COD" checked="checked">
                            <label for="payment_method" style="margin-right:30px;">Cash On Delivery</label>
                            <input type="radio" id="payment_method" name="payment_method" value="card_banking">
                            <label for="payment_method" style="margin-right:30px;">Card Or Internet Banking</label>
                            <input type="radio" id="payment_method" name="payment_method" value="mobile_banking">
                            <label for="payment_method" style="margin-right:30px;">Mobile Banking</label>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-sm-12" style="border-bottom: 1px solid #d4d9de">
                            <p style="float: left;">Payment Channels :</p>
                            <p style="float: right;">Verified By : <img
                                    src="{{ asset('frontend/assets/images/product_page/footer_logo.png') }}"></p>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-sm-12">
                            <p style="float: left;">Mobile Banking :</p>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-sm-12">
                            <input type="radio" id="login" name="drone" value="sign up">
                            <img src="{{ asset('frontend/assets/images/product_page/Bkash-logo.png') }}">
                            <input type="radio" id="login" name="drone" value="sign up">
                            <img src="{{ asset('frontend/assets/images/product_page/Nagad-Logo.wine.png') }}">
                            <input type="radio" id="login" name="drone" value="sign up">
                            <img src="{{ asset('frontend/assets/images/product_page/mlogo.png') }}">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-sm-12">
                            <textarea class="form-control" id="" rows="3" style="resize: none;"
                                name="comments"></textarea>
                            <div class="form-check" style="margin-top: 20px;">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    I wish to subscribe to the TechLand newsletter.
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                <label class="form-check-label" for="flexCheckChecked">
                                    I have read and agree to the Privacy Policy, Terms & Conditions and Payment Terms
                                </label>
                            </div>
                            <br>

                            <button style="display:flex;justify-content: center" type="submit"
                                class="btn btn-success">{{ ('Confirm Your Order') }}</button>
                            {{-- <button type="button" class="btn-lg btn-primary btn-block" style="border-radius: 20px">Confirm your Order</button> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script></script>

@endsection
