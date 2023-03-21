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
                                  <div class="checkout-page-left">
                                      <div>
                                          <h3>I don't have an Account.</h3>
                                          <input type="radio" class="login" id="login" name="drone" value="Log in">
                                          <label for="login" style="font-weight: 600;">Sign Up</label>
                                      </div>

                                      <form action="{{ route('cart.signup.submit') }}" method="POST">
                                        @csrf
                                      
                                        <div class="login-form">
                                            <div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="user" name="f_name" placeholder="First Name">
                                                </div>
                                            </div>
    
                                            <div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="user" name="l_name" placeholder="Last Name">
                                                </div>
                                            </div>
    
                                            <div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" id="user" name="email" placeholder="Email">
                                                </div>
                                            </div>
    
                                            <div>
                                                <div class="form-group">
                                                    <input type="phone" class="form-control" id="user" name="phone" placeholder="Phone">
                                                </div>
                                            </div>

                                            <div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                                                </div>
                                        </div>
    
                                            <div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control" id="user" name="password" placeholder="Password">
                                                </div>
                                            </div>
    
                                            <div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control" id="user" name="password_confirmation" placeholder="Confirm Password">
                                                </div>
                                            </div>

                                            <div class="col">
                                                <button type="submit" class="btn btn-primary signin-button">Sign Up</button>
                                            </div>

                                            {{-- <a href="" class="btn login_btn">Sign Up</a> --}}
                                        </div>
                                      </form>
  
                                      <div class="signin-social-button">
                                          <div class="row">
                                              <div class="col-sm-12">
                                                  <div class="signin-google-button">
                                                      <img src="{{ asset('frontend/sigma/icons/google.png') }}" alt=""><span>Continue with google</span>
                                                  </div>
  
                                                  <div class="signin-facebook-button">
                                                      <img src="{{ asset('frontend/sigma/icons/facebook.png') }}" alt=""><span>Continue with facebook</span>
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
                                                   {{-- <img src="{{ asset('frontend/sigma/High quality/desdis.png') }}" class="img-fluid" alt=""> --}}
                                                   <img src="{{ asset($cart->product->galary_photo) }}" class="img-fluid" alt="">
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
                                                               <li>Quantity:  <span class="list-value"> Unit Price</span></li>
                                                               {{-- <li><a href="#" class="qty-button">- 2 +</a><span class="list-value"> ৳72,000</span></li> --}}
                                                               <li><a href="#" class="qty-button">{{ $cart->quantity}}</a><span class="list-value">৳{{ $cart->unit_price}}</span></li>
                                                               <li>Subtotal:  <span class="list-value">৳{{ $cart->quantity * $cart->unit_price}}</span></li>
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
                                                   <div class="order-summery-list" style="margin-top: 80px !important;">
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
                                                           <li style="font-weight: 600;">Gross Total: <span class="list-value">৳{{ $total}}</span></li>
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
 </section>

 <script></script>
 
@endsection



