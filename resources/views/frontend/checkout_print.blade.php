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

<section class="checkout-print-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="checkout-print">
                    <h3>Personal Details</h3>
                    <div class="border-h3"></div>
                    <P><span class="info">Name :</span>Riajul Hasan Showkhin</P>
                    <P><span class="info">E-mail :</span>riajulshowkhin@gmail.com</P>
                    <P><span class="info">Mobile :</span>01738956584</P>
                    <P><span class="info">Selected Shipping Method :</span>Pathao</P>
                    <P><span class="info">Shipping Address :</span>793/1 Middle, S Monipur Rd,  Dhaka – 1216,  Bangladesh.</P>
                    <div class="product-info">
                        <div class="row">
                            <div class="col-sm-2">
                                <P><span class="info">Product :</span></P>
                            </div>
                            <div class="col-sm-6">
                                <p>Qbits Sigma 15 - 10th Generation Intel® Core™ Processor, 15.6 Inches FHD Non Touch IPS Display, 512GB NVMe SSD, 8GB DDR4 RAM, Intel® Iris® Plus Graphics/Intel® UHD Graphics</p>
                            </div>
                            <div class="col-sm-1">
                                <P>2 Pcs</P>
                            </div>
                            <div class="col-sm-3">
                                <P><span class="info">Price :  </span>৳142,200</P>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <P></P>
                            </div>
                            <div class="col-sm-6">
                                <p>Qbits Sigma 15 - 10th Generation Intel® Core™ Processor, 15.6 Inches FHD Non Touch IPS Display, 512GB NVMe SSD, 8GB DDR4 RAM, Intel® Iris® Plus Graphics/Intel® UHD Graphics</p>
                            </div>
                            <div class="col-sm-1">
                                <P>2 Pcs</P>
                            </div>
                            <div class="col-sm-3">
                                <P><span class="info">Price :  </span>৳142,200</P>
                            </div>
                            <div class="border-bottom"></div>
                            <P class="grasstotal">৳142,200 <span class="info">Gross Total :  </span></P>
                        </div>
                    </div>
                    
                    <P><span class="info">Payment Status :</span>Cash On Delivery</P>
                    <a href="" class="print-btn">Print</a>
                    <a href="" class="close-btn">Close</a>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
   

</script> 
 
@endsection



